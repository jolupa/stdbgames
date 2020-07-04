<?php
namespace App\Models;
use CodeIgniter\Model;

class WishlistModel extends Model{
  public function getUserWishlist($user_id){
    $db = \Config\Database::connect();
    $builder = $db->table('wishlists')
                  ->select('games.name AS game_name,
                            games.image AS game_image,
                            games.slug AS game_slug')
                  ->join('games', 'games.id = wishlists.game_id')
                  ->where('user_id', $user_id);
    if($builder->countAllResults(false) > 0){
      return $builder->get()->getResultArray();
    } else {
      return false;
    }
  }
  public function checkGameWishlist($id, $user_id){
    $db = \Config\Database::connect();
    $builder = $db->table('wishlists')
                  ->where('game_id', $id)
                  ->where('user_id', $user_id);
    if($builder->countAllResults() > 0){
      return true;
    } else {
      return false;
    }
  }
  public function addToUserWishlist($id, $user_id){
    $db = \Config\Database::connect();
    $builder = $db->table('wishlist');
    return $builder->insert(['game_id'=>$id, 'user_id'=>$user_id]);
  }
}

?>
