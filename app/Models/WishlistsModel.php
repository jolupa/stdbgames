<?php
namespace App\Models;
use CodeIgniter\Model;

class WishlistsModel extends Model{
  public function checkWishList($userid, $gameid){
    $db = \Config\Database::connect();
    $builder = $db->table('wishlists')
                  ->where('Userid', $userid)
                  ->where('Gameid', $gameid);
    if($builder->countAllResults() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }
  public function getWishListUser($userid){
    $db = \Config\Database::connect();
    $builder = $db->table('wishlists')
                  ->select('games.Name AS wgName,
                            games.Image AS wgImage,
                            games.Slug AS wgSlug')
                  ->join('games', 'games.Gameid = wishlists.Gameid')
                  ->where('wishlists.Userid', $userid);
    if($builder->countAll(FALSE) > 0){
      return $builder->get()->getResultArray();
    } else {
      return FALSE;
    }
  }
  public function addToWishList($userid, $gameid){
    $db = \Config\Database::connect();
    $builder = $db->table('wishlists');
    if($builder->insert(['Userid'=>$userid,'Gameid'=>$gameid]) == TRUE){
      return TRUE;
    } else {
      return FALSE;
    }
  }
  public function deleteUserGameWish($userid, $gameid){
    $db = \Config\Database::connect();
    $builder = $db->table('wishlists')
                  ->where('Userid', $userid)
                  ->where('Gameid', $gameid);
    if($builder->delete() == TRUE){
      return TRUE;
    } else {
      return FALSE;
    }
  }
}

?>
