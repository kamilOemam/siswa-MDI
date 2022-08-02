<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'biodata';
    protected $primaryKey       = 'idname';
    protected $allowedFields    = ['nis','umur','citacita','hobi','motivasi','alamat'];
}
