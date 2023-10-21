<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MusicTrackModel;
use CodeIgniter\Files\File;

class MusicTrackController extends BaseController
{
    // public function index(){
    //     return view ('main');
    // }
   
    public function index()
    {
        $musicModel = new MusicTrackModel();
        $data['musicList'] = $musicModel->findAll(); // Get all music tracks from the database
        return view('main', $data);
    }

}
