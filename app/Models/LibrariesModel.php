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

    public function updatewishlist ( int $game_id, int $user_id ) {

      // check if the game is wishlisted by user
      $db = \Config\Database::connect();
      $builder = $db->table('wishlists')
                      ->where('game_id', $game_id)
                      ->where('user_id', $user_id);

      if ( ! empty ( $builder->get()->getRowArray ) ) {

        $builder->delete();
        return true;

      } else {

        return false;

      }
    }

  }

 ?>
