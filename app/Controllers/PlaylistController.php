<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PlaylistModel;

class PlaylistController extends BaseController
{
    public function index(){
        return view('main');
    }
    public function create()
    {
        $playlistModel = new PlaylistModel();

        

        // Create a new playlist in the database
        $data = [
            'Name' => $this->request->getPost('playlistName'),
            'CreatedAt' => date('Y-m-d H:i:s'), 
            'UpdatedAt' => date('Y-m-d H:i:s'),
        ];

        $playlistModel->insert($data);

        // Redirect to the "your playlist" page or wherever you want
        return redirect()->to('/playlist');
    }

 


}
