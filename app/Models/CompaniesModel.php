<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class CompaniesModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'companies';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['name', 'slug', 'url', 'about', 'twitter_account', 'is_developer', 'is_publisher'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;

    public function selectAll () {
      $db = \Config\Database::connect ();
      $builder = $db->table ('publishers');
      return $builder->get ()->getResultArray ();
    }
    public function selectAllDevs () {
      $db = \Config\Database::connect ();
      $builder = $db->table ('developers');
      return $builder->get ()->getResultArray ();
    }
    public function deletePassed ($id) {
      $db = \Config\Database::connect ();
      $builder = $db->table ('publishers')
                    ->where ('id', $id);
      $builder->delete ();
    }
  }

 ?>
