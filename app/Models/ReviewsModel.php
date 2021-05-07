<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class ReviewsModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['game_id', 'user_id', 'about', 'url'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;

  }

 ?>
