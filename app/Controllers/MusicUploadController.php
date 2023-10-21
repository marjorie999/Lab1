<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MusicTrackModel;

class MusicUploadController extends BaseController
{
    public function index()
    {
        return view('upload');
    }

    public function upload()
    {
        $musicModel = new MusicTrackModel();

        // Handle file upload
        $file = $this->request->getFile('music_file');
        if ($file->isValid() && $file->getExtension() === 'mp3') {
            // Define your upload directory path
            $uploadPath = WRITEPATH . 'uploads/'; // Customize this path
            $newFileName = $file->getRandomName();
            $file->move($uploadPath, $newFileName);

            // Insert data into the database
            $data = [
                'Title' => $this->request->getPost('title'),
                'Artist' => $this->request->getPost('artist'),
                'FilePath' => $uploadPath . $newFileName,
            ];
            $musicModel->insert($data);

            // Redirect back to the main page or display a success message
            return redirect()->to('/');
        } else {
            // Handle file validation errors and display them
            $validationErrors = $file->getErrorString();
            return view('upload', ['validationErrors' => $validationErrors]);
        }
    }
}
