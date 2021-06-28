<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class ChartsModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'games';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = [];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;
    //protected $beforeInsert = [];

    public function cheapestpricepro () {

      $db = \Config\Database::connect();
      $builder = $db->table('prices')
                    ->select('price_pro')
                    ->where('price_pro !=', '')
                    ->groupBy('price_pro')
                    ->orderBy('price_pro', 'ASC');

      return $builder->get()->getRowArray();

    }

    public function cheapestpriceall () {

      $db = \Config\Database::connect();
      $builder = $db->table('prices')
                    ->select('price_nonpro')
                    ->where('price_nonpro !=', '')
                    ->groupBy('price_nonpro')
                    ->orderBy('price_nonpro', 'ASC');

      return $builder->get()->getRowArray();

    }

    public function mostWishlisted () {

      $db = \Config\Database::connect();
      $builder = $db->table('wishlists')
                    ->select('COUNT(user_id) AS total, games.name, games.image, games.slug')
                    ->join('games', 'games.id = wishlists.game_id')
                    ->groupBy('game_id')
                    ->orderBy('total', 'DESC');

      return $builder->get(3)->getResultArray();

    }

  }

 ?>
