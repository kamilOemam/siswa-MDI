<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;


class Kelas extends BaseController {
 //pengaktifan model dalam construktor
    protected $KM;
    public function __construct()
    {
        $this->KM = new KelasModel();
    }
    //gettting data
    public function index()
    {   
        $data ['data_kelas']= $this->KM->find();
        $data['main_title']  = 'Kelas i\'dadiyah';
        $data['title']  = 'List Kelas';

       
        return view('layout/kelas/content', $data);//kirimkan data ke view
    }

}
