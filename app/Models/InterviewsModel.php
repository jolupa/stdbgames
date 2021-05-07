<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class InterviewsModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'interviews';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'game_id', 'body'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;

  }

 ?>
