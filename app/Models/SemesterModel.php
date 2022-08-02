class SemesterModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'semester';
    protected $primaryKey       = 'idsmt';
    protected $useAutoIncrement = true;
    
    protected $allowedFields    = ['smt','idkelas'];
    
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    public function dataSemester($id = null){
        $data = $this->db->table('semester');
        $data->join('kelas', 'semester.idkelas=kelas.idkelas','LEFT');
        if ($id != null) {
            $data->where('semester.idkelas', $id);
        }
        $result = $data->get()->getResultArray();
        return $result;
    }
}
