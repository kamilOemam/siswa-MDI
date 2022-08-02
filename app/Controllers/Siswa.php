<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\SemesterModel;
use App\Models\SiswaModel;
use Config\View;

class Siswa extends BaseController
{
   protected $KM;
    protected $SM;
    protected $SWM;
    public function __construct()
    {
        $this->KM = new KelasModel();
        $this->SM = new SemesterModel();
        $this->SWM = new SiswaModel();
    }
    public function index()
    {
        $data['main_title'] = 'Siswa';
        $data ['title'] = 'List Siswa';
        $data['data_siswa'] = $this->SWM->dataSiswa  ();
        return view('layout/siswa/content', $data);
    }
    // public function test(){
    //     echo password_hash('admin', PASSWORD_BCRYPT);
    // }


    public function tambah()
    {
        $data['main_title'] = 'Siswa';
        $data ['title'] = 'Form Siswa';
        $data ['action'] = base_url()."/siswa/save";
        $data ['data'] = array(array(
            'nis'=>'',
            'nama'=>'',
            'idsmt'=>'',
            'idkelas'=>'',
            'jk'=>'',
            'tmp_lahir'=>'',
            'tgl_lahir'=>'',
           
        )) ;
        $data['data_kelas'] = $this->KM->find();
        return view('layout/siswa/form',$data);
    }
    public function save()
    {
        $nis = $this->request->getPost('nis');
        $nama = $this->request->getPost('nama');
        $idsmt = $this->request->getPost('idsmt');
        $idkelas = $this->request->getPost('idkelas');
        $jk = $this->request->getPost('jk');
        $tmp_lahir = $this->request->getPost('tmp_lahir');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        

        if (!$this->validate( [
            'nis'=>[
                'rules'=>'required|is_unique[siswa.nis]',
                'errors'=>[
                    'required' =>'nis tidak boleh kosong'
                ]
               
            ],
            'nama'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nama tidak boleh kosong'
                ]
            ],
            'idsmt'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Semester tidak boleh kosong'
                ]
                ],
            'idkelas'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'kelas tidak boleh kosong'
                ]
                ],
                'jk'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'JK tidak boleh kosong'
                    ]
                ],'tmp_lahir'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Tempat lahir tidak boleh kosong'
                    ]
                ],'tgl_lahir'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Tgl lahir tidak boleh kosong'
                    ]
                ],
               
        ])) {
            //callback error
           session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }else {
            // simpan data
            $data = [
                'nis' =>$nis,
                'nama'=>$nama,
                'idsmt'=>$idsmt,
                'idkelas'=>$idkelas,
                'jk'=>$jk,
                'tmp_lahir'=>$tmp_lahir,
                'tgl_lahir'=>$tgl_lahir,
                
            ];
            if ($this->SWM->insert($data)!=0) {
                echo " <script>
                alert('proses simpan data gagal dilakukan');
                window.location.href='".base_url()."/siswa/tambah';
                </script>";
            }else {
                
                return redirect()->to('siswa/index');
        
            }   
        } 
    
    }
    public function edit($id)
    {
        $data['main_title'] = 'siswa';
        $data ['title'] = 'Edit siswa';
        $data ['action'] = base_url()."/siswa/update";
        $data ['data'] = $this->SWM->where('nis', $id)->findAll(); ;
        $data['data_kelas'] = $this->KM->find();
        $data['data_semester'] = $this->SM->where('idkelas', $data['data'][0]['idkelas'])->findAll();
        return view('layout/siswa/form',$data);
    
    }
    public function update()
    {
        $nis = $this->request->getPost('nis');
        $nama = $this->request->getPost('nama');
        $idsmt = $this->request->getPost('idsmt');
        $idkelas = $this->request->getPost('idkelas');
        $jk = $this->request->getPost('jk');
        $tmp_lahir = $this->request->getPost('tmp_lahir');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
       

        if (!$this->validate( [
            'nis'=>[
                'rules'=>'required',
                'errors'=>[
                    'required' =>'nis tidak boleh kosong'
                ]
               
            ],
            'nama'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nama tidak boleh kosong'
                ]
            ],
            'idsmt'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Semester tidak boleh kosong'
                ]
                ],
            'idkelas'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'kelas tidak boleh kosong'
                ]
                ],
                'jk'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'JK tidak boleh kosong'
                    ]
                ],'tmp_lahir'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Tempat lahir tidak boleh kosong'
                    ]
                ],'tgl_lahir'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Tgl lahir tidak boleh kosong'
                    ]
                ],
                
        ])) {
            //callback error
           session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }else {
            // simpan data
            $data = [
                'nis' =>$nis,
                'nama'=>$nama,
                'idsmt'=>$idsmt,
                'idkelas'=>$idkelas,
                'jk'=>$jk,
                'tmp_lahir'=>$tmp_lahir,
                'tgl_lahir'=>$tgl_lahir,
               
            ];
            if (!$this->SWM->update($nis, $data)) {
                echo " <script>
                alert('proses simpan data gagal dilakukan');
                window.location.href='" . base_url() . "/siswa/edit/" . $nis . "';
                </script>";
            }else {
                
                return redirect()->to('siswa/index');
        
            }   
        } 
    
    }
    public function hapus($id)
    {
        if ($this->SWM->delete($id)) {
            return redirect()->to('siswa/index');
        }else {
            echo "
            <script>
            alert('proses hapus gagal dilakukan');
            window.location.href='" . base_url() . "/siswa/'
            </script>
            ";
    
        }
    }

    //========= utils

    public function cetakData()
    {
        $mpdf = new \Mpdf\Mpdf();
        $data['title'] = 'Data Siswa | Print';
        $data['data'] = $this->SWM->dataSiswa();
        $html = View('layout/siswa/cetakData', $data);
        $mpdf->SetHTMLHeader('
        <div class="kop-surat">
        <p class="kop1">Madrasah I\'dadiyah</p>
        <p class="kop2">Salafiyah-Syafi\'iyah Sukorejo </p>
        <p class="kop3">Sumberejo Banyuputih Situbondo Jawa Timur</p>
        <div class="garis"></div>
        </div>
        ');
        $mpdf->AddPage('P','','','','','15','15','50','10','10','10');
        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('Data Siswa', 'I');
    }

    
    public function getSmt()
    {
        $idkelas = $this->request->getPost('idkelas');
        $data = $this->SM->dataSemester($idkelas);

        echo json_encode($data);
    }
}
