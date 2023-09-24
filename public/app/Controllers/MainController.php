<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;

class MainController extends BaseController
{
    public function save()
    {
        $ID = $_POST['ID'];
        $data = [
            'Artists' =>$this->request->getVar('Artists'),
            'Album' =>$this->request->getVar('Album'),
            'Songs' =>$this->request->getVar('Songs'),
            'Playlists' =>$this->request->getVar('Playlists'),
        ];
    
        if($ID!= null){
            $main = new MainModel();
            $main->set($data)->where('ID', $ID)->update();
        }else{
            $main = new MainModel();
            $main->save($data);
        }
        return redirect()->to('/test');
    }
        public function delete($ID)
        {
        $main = new MainModel();
        $main->delete($ID);
        return redirect()->to('/test');
   }

        public function edit($ID)
   {
        $mmodel = new MainModel();
        $data = [
           'main' => $mmodel->findAll(),
           'var' => $mmodel->where('ID', $ID)->first(),      
        ];
        return view ('main', $data);
    }
       
    public function test()
    {
       $mmodel = new MainModel();
       $data['main'] = $mmodel->findAll();
       //var_dump($data);
       return view('main', $data);
    }
    public function index()
    {
        //
    }
}
