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

  }

 ?>
