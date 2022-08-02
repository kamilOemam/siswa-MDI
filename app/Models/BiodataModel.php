<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'biodata';
    protected $primaryKey       = 'idname';
    protected $allowedFields    = ['nis','umur','citacita','hobi','motivasi','alamat'];
    
     protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    public function dataBiodata(){
        $data = $this->db->table('biodata');
        $data->join('siswa', 'biodata.nis=siswa.nis','LEFT');
        $result = $data->get()->getResultArray();
        // dd($result);
        return $result;
    }

}
