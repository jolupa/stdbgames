<?php

	namespace App\Models;
	use CodeIgniter\Model;

	class MondayModel extends Model {

		protected $DBGroup = 'default';
    protected $table = 'mondayreminder';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id','title','slug','entry','published','date'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;

	}

?>
