<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kelas';
    protected $primaryKey       = 'idkelas';
    protected $allowedFields    = ['idkelas','kelas','tingkatankls'];
}
