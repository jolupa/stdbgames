<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class GamesModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'games';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['name', 'slug', 'developer_id', 'publisher_id', 'release', 'about', 'pro', 'pro_from', 'pro_till', 'image', 'sku', 'appid', 'price', 'first_on_stadia', 'stadia_exclusive', 'early_access', 'rumor', 'cross_play', 'multi_couch', 'multi_online', 'crowd_choice', 'cross_save', 'cross_progression', 'state_share', 'stream_connect', 'crowd_play', 'is_pxc', 'max_resolution', 'fps', 'hdr_sdr', 'is_f2p', 'like', 'dislike', 'url', 'twitter_account', 'demo_appid', 'demo_sku', 'preorder_appid', 'preorder_sku', 'dropped', 'ed_only'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;
    //protected $beforeInsert = [];

    public function updatelikedislike ( array $data ) {

      $db = \Config\Database::connect();
      $builder = $db->table('likedislike');
      $builder->insert( $data );

    }

    public function deletegamelikedislike ( int $id ) {

      $db = \Config\Database::connect();
      $builder = db->table('likedislike')
                    ->where('game_id', $id);
      $builder->delete();

    }

    public function deletegamewishlists ( int $id ) {

      $db = \Config\Database::connect();
      $builder = $db->table('wishlists')
                    ->where('game_id', $id);
      $builder->delete();

    }

    public function deletegamelibraries ( int $id ) {

      $db = \Config\Database::connect();
      $builder = $db->table('libraries')
                    ->where('game_id', $id);
      $builder->delete();

    }

    public function deletegameprices ( int $id ) {

      $db = \Config\Database::connect();
      $builder = $db->table('prices')
                    ->where('game_id', $id);
      $builder->delete();

    }

    public function deletegamegalleries ( int $id ) {

      $db = \Config\Database::connect();
      $builder = $db->table('galleries')
                    ->where('game_id', $id);
      $builder->delete();

    }

    public function deletegamereviews ( int $id ) {

      $db = \Config\Database::connect();
      $builder = $db->table('reviews')
                    ->where('game_id', $id);
      $builder->delete();
      
    }

  }

 ?>
