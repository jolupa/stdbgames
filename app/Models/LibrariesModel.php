<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class LibrariesModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'libraries';
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

    public function checkWishlist (int $game_id, int $user_id) {

      $db = \Config\Database::connect();
      $builder = $db->table ('wishlists');
      return $builder->getWhere (['game_id'=>$game_id, 'user_id'=>$user_id]);

    }

    public function removeWishlist (int $game_id, int $user_id) {

      $db = \Config\Database::connect();
      $builder = $db->table ('wishlists')
                    ->where ('game_id', $game_id)
                    ->where ('user_id', $user_id);
      $builder->delete ();

    }

    public function deleteGameInLibrary( int $game_id, int $user_id ) {

      $db = \Config\Database::connect();
      $builder = $db->table('libraries')
                    ->where('game_id', $game_id)
                    ->where('user_id', $user_id)
                    ->delete();

    }

  }

 ?>
