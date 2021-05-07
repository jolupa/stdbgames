<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class PublishersModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'publishers';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'name', 'slug', 'url', 'about', 'twitter_account'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;

  }

 ?>
