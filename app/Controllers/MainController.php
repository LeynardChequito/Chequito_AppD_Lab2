<?php

namespace App\Controllers;

use App\Controllers\BaseController;
class MainController extends BaseController
{
    private $playlist;
    public $upload;
    public $song;

    // public function addsong()
    // {

    //     $validationRules = [
    //         'song' => 'uploaded[song]|max_size[song,10240]|mime_in[song,audio/mpeg,audio/wav/mp3]',
    //     ];
    //     if ($this->validate($validationRules)) {


    //         $song = $this->request->getFile('song');
    //         $songname = $song->getName();
    //         $newName = $song->getRandomName();
    //         $song->move(ROOTPATH . 'uploads', $newName);
    //         $data = [
    //             'title' => $songname,
    //             'file' => $newName,
    //             //make sure tama names ng collumns
    //         ];
    //         $this->song->insert($data);
    //         return redirect()->to('/view');
    //     } else {
    //         $data['validation'] = $this->validator;
    //         echo "error";
    //     }
    // }
    public function addsong()
{
    $validationRules = [
        'song' => 'uploaded[song]|max_size[song,10240]|mime_in[song,audio/mpeg,audio/wav,audio/mp3]',
    ];

    if ($this->validate($validationRules)) {
        $song = $this->request->getFile('song');

        // Check if the file is valid
        if ($song->isValid() && !$song->hasMoved()) {
            $songname = $song->getName();
            $newName = $song->getRandomName();

            // Move the uploaded file to the 'uploads' directory
            $song->move(ROOTPATH . 'uploads', $newName);

            $data = [
                'title' => $songname,
                'file' => $newName,
                // Add other relevant data to be stored in the database
            ];

            // Assuming $this->song represents your model or database table
            $this->song->insert($data);

            // Redirect to a view or a success page
            return redirect()->to('/view');
        } else {
            // Handle errors related to file upload
            echo "Error: Failed to upload the file.";
        }
    } else {
        // Handle validation errors
        $data['validation'] = $this->validator;
        echo "Error: Validation failed.";
    }
}


//     //upload music
//     public function upload()
//     {
//         $musicFile = $this->request->getFile('file');

//     if ($musicFile->isValid() && $musicFile->getExtension() == 'mp3') {
//         $newName = $musicFile->getRandomName();
//         $musicFile->move(ROOTPATH . 'public/uploads', $newName);

//         return 'Music file uploaded successfully.';
//     } else {
//         return 'Invalid music file.';
//     }
// }
    public function __construct()
    {
        $this->playlist = new \App\Models\playlist();
        $this->songs = new \App\Models\songs();
    }
    
    public function view()
    {
        $data = [
            'playlist' => $this->playlist->findAll(),
            'songs' => $this->songs->findAll(),
        ];
        return view('view', $data);
    }
    public function createPlaylist(){
        $data = [
            'name' => $this->request->getVar('pname'),
        ];
        $this->playlist->save($data);
        return redirect()->to('/view');
    }
    
    public function index()
    {
        //
    }
}