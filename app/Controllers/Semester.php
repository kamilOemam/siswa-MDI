<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\SemesterModel;

class Semester extends BaseController
{
  protected $KM;
    protected $SM;

    public function __construct()
    {
        $this->KM = new KelasModel();
        $this->SM = new SemesterModel();
    }
    public function index()
    {
        $data['main_title'] = 'Semester';
        $data ['title'] = 'List Semester';
        $data['data_semester'] = $this->SM->dataSemester();
        // dd($data['data_semester']);
        return view('layout/semester/content', $data);
    }
    public function tambah()
    {
        $data['main_title'] = 'Semester';
        $data ['title'] = 'Form Semester';
        $data ['action'] = base_url()."/semester/save";
        $data ['data'] = array(array(
            'smt'=>'',
            'idkelas'=>''
        )) ;
        $data['data_kelas'] = $this->KM->find();
        return view('layout/semester/form',$data);
    }
    public function save()
    {
        $smt = $this->request->getPost('smt');
        $idkelas = $this->request->getPost('idkelas');

        if (!$this->validate( [
            'smt'=>[
                'rules'=>'required',
                'errors'=>[
                    'required' =>'Semester tidak boleh kosong'
                ],
                'idkelas'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'kelas tidak boleh kosong'
                    ]
                ]
            ]
        ])) {
            //callback error
           session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }else {
            // simpan data
            $data = [
                'smt' =>$smt,
                'idkelas'=>$idkelas
            ];
            if (!$this->SM->insert($data)) {
                echo " <script>
                alert('proses simpan data gagal dilakukan');
                window.location.href='".base_url()."/semester/tambah';
                </script>";
            }else {
                
                return redirect()->to('semester/index');
        
            }   
        } 
    
    }
    
    public function edit($id)
    {
        $data ['action'] = base_url()."/semester/update";
        $data['main_title'] = 'Semester';
        $data ['title'] = 'Edit Semester';
        $data ['data'] = $this->SM->where('idsmt', $id)->findAll();
        $data['data_kelas'] = $this->KM->find();
        return view('layout/semester/form',$data);
    }
    public function update()
    {
        {
            $params = $this->request->getPost('params');
            $smt = $this->request->getPost('smt');
            $idkelas = $this->request->getPost('idkelas');
    
            if (!$this->validate( [
                'smt'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required' =>'Semester tidak boleh kosong'
                    ]
                    ],
                    'idkelas'=>[
                        'rules'=>'required',
                        'errors'=>[
                            'required'=>'kelas tidak boleh kosong'
                        ]
                    ]
            ])) {
                //callback error
               session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }else {
                // simpan data
                $data = [
                    'smt' =>$smt,
                    'idkelas'=>$idkelas
                ];
                if (!$this->SM->update($params, $data)) {
                    echo " <script>
                    alert('proses simpan data gagal dilakukan');
                    window.location.href='".base_url()."/semester/edit/" . $params . "';
                    </script>";
                }else {
                    
                    return redirect()->to('semester/index');
            
                }   
            } 
        
        }
    }
    public function hapus($id)
    {
        if ($this->SM->delete($id)) {
            return redirect()->to('semester/index');
        }else {
            echo "
            <script>
            alert('proses simpan gagal dilakukan');
            window.location.href='" . base_url() . "/semester/'
            </script>
            ";
    
        }
    }
}
