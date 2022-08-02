<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'nis';
    protected $allowedFields    = ['nis','nama','jk','tmp_lahir','tgl_lahir','idsmt','idkelas','tingkat'];
}
