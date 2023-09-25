<?php

namespace App\Controllers;

use App\Controllers\BaseController;
class MainController extends BaseController
{
    private $playlist;
    public $upload;

    //upload music
    public function upload()
    {
        $musicFile = $this->request->getFile('file');

    if ($musicFile->isValid() && $musicFile->getExtension() == 'mp3') {
        $newName = $musicFile->getRandomName();
        $musicFile->move(ROOTPATH . 'public/uploads', $newName);

        // Store the file path or other relevant information in your database if needed

        return 'Music file uploaded successfully.';
    } else {
        return 'Invalid music file.';
    }
}
    public function __construct()
    {
        $this->playlist = new \App\Models\playlist();
    }
    
    public function view()
    {
        $data = [
            'playlist' => $this->playlist->findAll(),
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