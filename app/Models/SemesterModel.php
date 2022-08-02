class SemesterModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'semester';
    protected $primaryKey       = 'idsmt';
    protected $useAutoIncrement = true;
    
    protected $allowedFields    = ['smt','idkelas'];
}
