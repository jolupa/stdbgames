<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class EditionsModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'games';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['name', 'slug', 'release', 'pro', 'pro_from', 'pro_till', 'image', 'sku', 'appid', 'price', 'first_on_stadia', 'stadia_exclusive', 'early_acces', 'rumor', 'cross_play', 'multi_couch', 'multi_online', 'crowd_choice', 'cross_save', 'cross_progression', 'state_share', 'stream_connect', 'crowd_play', 'is_f2p', 'demo_appid', 'demo_sku', 'preorder_appid', 'preorder_sku', 'is_edition', 'edition_game_id', 'dropped'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;

  }

 ?>
