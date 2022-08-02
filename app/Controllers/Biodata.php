<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BiodataModel;
use App\Models\SiswaModel;

class Biodata extends BaseController
{
 //pengaktifan model dalam construktor
    protected $BM;
    protected $SWM;
    public function __construct()
    {
        $this->SWM = new SiswaModel();
        $this->BM = new BiodataModel();
    }
    //gettting data
    public function index()
    {   
        $data ['data_biodata']= $this->BM->dataBiodata();
        $data['main_title']  = 'Biodata Siswa i\'dadiyah';
        $data['title']  = 'List Biodata';
       

       
        return view('layout/biodata/content', $data);//kirimkan data ke view
    }
    //membuat  tambah data
    public function tambah()
    {

        $data['action'] = base_url() . "/biodata/save";
        $data['main_title']  = 'Biodata Siswa i\'dadiyah';
        $data['title']  = 'Form Biodata';
        $data['data_siswa'] = $this->SWM->dataSiswa  ();
        $data['data']  = array(array(
            'nis' => '',
            'umur' => '',
            'alamat' => '',
            'citacita' => '',
            'hobi' => '',
            'motivasi' => '',
            'idname' => '',
            
        ));
        return view('layout/biodata/form', $data);
    }

    //membuat savedata
    public function save(){
        $nis = $this->request->getPost('nis');
        $umur = $this->request->getPost('umur');
        $alamat = $this->request->getPost('alamat');
        $citacita = $this->request->getPost('citacita');
        $hobi = $this->request->getPost('hobi');
        $motivasi = $this->request->getPost('motivasi');
       
        //membuat rulers
        if (!$this->validate([
            'nis' => [
            'rules'  => 'required|is_unique[biodata.nis]',
            'errors' => [
                'required' => 'Id nama tidak boleh kosong',
            ],
        ],
        'umur'=>[
            'rules'=>'required',
            'errors'=>[
                'required'=>'umur tidak boleh kosong'
            ]
        ],
        'alamat'=>[
            'rules'=>'required',
            'errors'=>[
                'required'=>'alamat tidak boleh kosong'
            ]
        ],
        'hobi'=>[
            'rules'=>'required',
            'errors'=>[
                'required'=>'hobi tidak boleh kosong'
            ]
        ],
        'motivasi'=>[
            'rules'=>'required',
            'errors'=>[
                'required'=>'motivasi tidak boleh kosong'
            ]
        ],
        'citacita'=>[
            'rules'=>'required',
            'errors'=>[
                'required'=>'cita-cita tidak boleh kosong'
            ]
        ],
        


        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();}
            else {
          //simpan data
          $data = [
            'nis' => $nis,
            'umur'=>$umur,
            'alamat'=>$alamat,
            'citacita'=>$citacita,
            'hobi'=>$hobi,
            'motivasi'=>$motivasi,
            
        ];  
        if (!$this->BM->insert($data) ) {
            echo "
            <script>
            alert('proses simpan gagal dilakukan');
            window.location.href='" . base_url() . "/biodata/tambah'
            </script>
            ";
    } else {
        return redirect()->to('biodata/index');
  
    }
   }
 }
 public function edit($id)
 {
    $data['data_siswa'] = $this->SWM->dataSiswa  ();
    $data['action'] = base_url() . "/biodata/update";
    $data['main_title']  = 'Madrasah i\'dadiyah';
    $data['title']  = 'Edit biodata';
    $data['data'] = $this->BM->where('idname',$id)->findAll();
    return view('layout/biodata/form', $data);
 }
 public function update(){
    $nis = $this->request->getPost('nis');
    $idname = $this->request->getPost('idname');
    $umur = $this->request->getPost('umur');
    $alamat = $this->request->getPost('alamat');
    $citacita = $this->request->getPost('citacita');
    $hobi = $this->request->getPost('hobi');
    $motivasi = $this->request->getPost('motivasi');
    
   
    //membuat rulers
    if (! $this->validate([
        'nis' => [
        'rules'  => 'required',
        'errors' => [
            'required' => 'Id nama tidak boleh kosong',
        ],
    ],
    'alamat' => [
        'rules'  => 'required',
        'errors' => [
            'required' => 'Alamat tidak boleh kosong',
        ],
    ],
   
    ])) {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
    }else{
        
      //simpan data
      $data = [
         
        'umur'=>$umur,
        'alamat'=>$alamat,
        'citacita'=>$citacita,
        'hobi'=>$hobi,
        'motivasi'=>$motivasi
        
        
    ]; 
     
    if (!$this->BM->update($idname, $data) ) {
        echo "
        <script>
        alert('proses simpan gagal dilakukan');
        window.location.href='" . base_url() . "/biodata/edit/'".$idname."'
        </script>
        ";
} else {
    return redirect()->to('biodata/index');

}
}
}

public function hapus($id){
    if ($this->BM->delete($id)) {
        return redirect()->to('biodata/index');
    }else {
        echo "
        <script>
        alert('proses simpan gagal dilakukan');
        window.location.href='" . base_url() . "/biodata/'
        </script>
        ";

    }
}
}
