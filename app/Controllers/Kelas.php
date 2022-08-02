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
     //membuat  tambah data
    public function tambah()
    {

        $data['action'] = base_url() . "/kelas/save";
        $data['main_title']  = 'Kelas i\'dadiyah';
        $data['title']  = 'Form kelas';
        $data['data']  = array(array(
            'idkelas' => '',
            'kelas' => '',
            'tingkatankls' => '',
            
        ));
        return view('layout/kelas/form', $data);
    }

    //membuat savedata
    public function save(){
        $idkelas = $this->request->getPost('idkelas');
        $kelas = $this->request->getPost('kelas');
        $tingkatankls = $this->request->getPost('tingkatankls');
       
        //membuat rulers
        if (! $this->validate([

            'idkelas' => [
            'rules'  => 'required|is_unique[kelas.idkelas]',
            'errors' => [
                'required' => 'Id kelas tidak boleh kosong',
            ],
        ],
        'kelas' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'nama kelas tidak boleh kosong',
            ],
        ],
        'tingkatankls' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'nama Fakultas tidak boleh kosong',
            ],
        ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();}
            else {
          //simpan data
          $data = [
            'idkelas' => $idkelas,
            'kelas'=>$kelas,
            'tingkatankls'=>$tingkatankls,
            
        ];  
        if ($this->KM->insert($data) != 0) {
            echo "
            <script>
            alert('proses simpan gagal dilakukan');
            window.location.href='" . base_url() . "/kelas/tambah'
            </script>
            ";
    } else {
        return redirect()->to('kelas/index');
  
    }
   }
 }
 public function edit($id){
    $data['action'] = base_url() . "/kelas/update";
    $data['main_title']  = 'Madrasah i\'dadiyah';
    $data['title']  = 'Edit kelas';
    $data['data'] = $this->KM->where('idkelas',$id)->findAll();
    return view('layout/kelas/form', $data);
 }
 public function update(){
    $idkelas = $this->request->getPost('idkelas');
    $kelas = $this->request->getPost('kelas');
    $tingkatankls = $this->request->getPost('tingkatankls');
    
   
    //membuat rulers
    if (! $this->validate([
        
        'idkelas' => [
        'rules'  => 'required',
        'errors' => [
            'required' => 'Id kelas tidak boleh kosong',
        ],
    ],
    'kelas' => [
        'rules'  => 'required',
        'errors' => [
            'required' => 'nama kelas tidak boleh kosong',
        ],
    ],
    'tingkatankls' => [
        'rules'  => 'required',
        'errors' => [
            'required' => 'Tingkat Kelas tidak boleh kosong',
        ],
    ],
   
    ])) {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
    }else{
        
      //simpan data
      $data = [
         
        'kelas'=>$kelas,
        'tingkatankls'=>$tingkatankls,
        
    ]; 
     
    if (!$this->KM->update($idkelas, $data) ) {
        echo "
        <script>
        alert('proses simpan gagal dilakukan');
        window.location.href='" . base_url() . "/kelas/edit/'".$idkelas."'
        </script>
        ";
} else {
    return redirect()->to('kelas/index');

}
}
}

public function hapus($id){
    if ($this->KM->delete($id)) {
        return redirect()->to('kelas/index');
    }else {
        echo "
        <script>
        alert('proses simpan gagal dilakukan');
        window.location.href='" . base_url() . "/kelas/'
        </script>
        ";

    }
}
}

}
