<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class WishlistsModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'wishlists';
    //protected $primaryKey = 'id';
    //protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['user_id', 'game_id'];
    protected $useTimestamps = false;
    //protected $createdField = 'created_at';
    //protected $updatedField = 'updated_at';
    //protected $deletedField = 'deleted_at';
    //protected $dateFormat = 'datetime';
    //protected $skipvalidation = true;
    //protected $beforeInsert = [ 'isLike', 'isDislike' ];

  }

 ?>
