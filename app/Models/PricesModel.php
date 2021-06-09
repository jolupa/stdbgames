<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class PricesModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'prices';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id', 'game_id', 'price_pro', 'price_nonpro', 'date', 'date_till_pro', 'date_till_nonpro', 'for_pro', 'for_nonpro'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;

    public function getNonDealEdition ( int $id ) {

      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->select('price, pro, pro_from')
                    ->where('id' , $id);

      return $builder->get()->getRowArray();

    }

    public function getGameForDeal ( int $id ) {

      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->select('slug, id, name')
                    ->where('id', $id);
      return $builder->get()->getRowArray();

    }

    public function thePrice( int $id ) {

      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->select('price, pro, pro_from, pro_till')
                    ->where('id', $id);
      return $builder->get()->getRowArray();

    }

  }

 ?>
