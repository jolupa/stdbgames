<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class UsersModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'name', 'slug', 'image', 'password', 'birth_date', 'email', 'role'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;

    public function getMailPass () {

      $db = \Config\Database::connect();
      $querybuilder = $db->table('config')
                          ->select('pass')
                          ->where('service', 'mail');
      return $querybuilder->get()->getRowArray();

    }

  }

 ?>
