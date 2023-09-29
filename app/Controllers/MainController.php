<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MainController extends BaseController
{
    private $music;
    private $listplay;
    private $connection;
    private $db;

    public function index()
    {
        //
    }

    public function __construct()
    {
        $this->music = new \App\Models\Music();
        $this->listplay = new \App\Models\gad();
        $this->sconnection = new \App\Models\connection();
        $this->db = \Config\Database::connect();
        helper('form');
    }

    public function mainview()
    {
        $context = 'home';
        $data = [
            'listplay' => $this->listplay->findAll(),
            'music' => $this->music->findAll(),
            'context' => $context,
        ];
        return view('mainview', $data);
    }


    public function doupload()
{
    $file = $this->request->getFile('song');
    $newFileName = $file->getRandomName();

    $data = [
        'title' => pathinfo($file->getName(), PATHINFO_FILENAME), 
        'file' => $newFileName,
        'duration' => 0, 
    ];

    $tuntunin = [
        'song' => [
            'uploaded[song]',
            'mime_in[song,audio/mpeg]',
            'max_size[song,10240]',
            'ext_in[song,mp3]',
        ],
    ];

    if ($this->validate($tuntunin)) {
        if ($file->isValid() && !$file->hasMoved()) {
            if ($file->move(FCPATH . 'uploads\songs', $newFileName)) {
                
                $this->music->save($data);
                echo 'File uploaded successfully';
            } else {
                echo $file->getErrorString() . ' ' . $file->getError();
            }
        }
    } else {
        $data['validation'] = $this->validator;
    }

    return redirect()->to('/mainview');
}



public function addToPlaylist()
{
    $musicID = $this->request->getPost('musicID');
    $playlistID = $this->request->getPost('playlist');
    $data = [
        'playlist_id' => $playlistID,
        'music_id' => $musicID
    ];
    $this->db->table('connection')->insert($data);
    return redirect()->to('/mainview');
}

    public function removeFromPlaylist($musicID)
    {

        $builder = $this->db->table('connection ');
        $builder->where('id', $musicID);
        $builder->delete();

        return redirect()->to('/mainview');
    }

    public function create_playlist()
    {
        $data = [
            'name' => $this->request->getVar('playlist_name'),
            'music' => $this->music->findAll(),
        ];

        $this->listplay->insert($data);
        return redirect()->to('/mainview');
    }

    public function delete_playlist($playlistID)
    {
        // Find the playlist by its ID
        $playlist = $this->listplay->find($playlistID);
        if ($playlist) {
            $this->listplay->where('playlist_id', $playlistID)->delete('listplay');
            $this->listplay->delete($playlistID);
        }
        return redirect()->to('/mainview');
    }

    public function viewPlaylist($playlistID)
    {
        $context = 'playlist';

        $builder = $this->db->table('connection ');

        $builder->select('connection .id, music.*');

        $builder->join('music', 'music.music_id = connection.music_id');

        $builder->where('connection .playlist_id', $playlistID);

        $musicInPlaylist = $builder->get()->getResultArray();

        $data = [
            'music' => $musicInPlaylist,
            'listplay' => $this->listplay->findAll(),
            'context' => $context,
        ];

        return view('mainview', $data);
    }

    public function search()
    {
        $searchTerm = $this->request->getGet('search');
        $context = $this->request->getGet('context');
        $builder = $this->db->table('music');

        if ($context === 'home') {

            // Search all songs
            $builder->like('title', $searchTerm);
        } elseif ($context === 'playlist') {

            // Search songs in the current playlist
            $playlistID = $this->request->getGet('playlistID');
            $builder
                ->join('connection ', 'connection .music_id = music.music_id')
                ->where('connection .playlist_id', $playlistID)
                ->like('music.title', $searchTerm);
        } else {
            
        }


        $results = $builder->get()->getResultArray();

    
        $data = [
            'music' => $results,
            'listplay' => $this->listplay->findAll(),
            'context' => $context,
        ];

        return view('mainview', $data);
    }
}