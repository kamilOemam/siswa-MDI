<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'nis';
    protected $allowedFields    = ['nis','nama','jk','tmp_lahir','tgl_lahir','idsmt','idkelas','tingkat'];
    
     protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    public function dataSiswa(){
        $data = $this->db->table('siswa');
        $data->join('kelas', 'siswa.idkelas=kelas.idkelas','LEFT');
        $data->join('semester', 'siswa.idsmt=semester.idsmt','LEFT');
        $result = $data->get()->getResultArray();
        return $result;
    }
}
