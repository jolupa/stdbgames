<?php
namespace App\Models;
use CodeIgniter\Model;

class LibrariesModel extends Model{
  public function getUserLibrary($user_id){
    $db = \Config\Database::connect();
    $builder = $db->table('libraries')
                  ->select('games.name AS game_name,
                            games.slug AS game_slug,
                            games.image AS game_image,
                            games.appid AS game_appid')
                  ->join('games', 'games.id = libraries.game_id')
                  ->where('user_id', $user_id);
    if($builder->countAllResults(false) > 0){
      return $builder->get()->getResultArray();
    } else {
      return false;
    }
  }
  public function checkGameLibrary($id, $user_id){
    $db = \Config\Database::connect();
    $builder = $db->table('libraries')
                  ->where('game_id', $id)
                  ->where('user_id', $user_id);
    if($builder->countAllResults() > 0){
      return true;
    } else {
      return false;
    }
  }
  public function addToUserLibrary($id, $user_id){
    $db = \Config\Database::connect();
    $builder = $db->table('libraries');
    return $builder->insert(['game_id'=>$id, 'user_id'=>$user_id]);
  }
}

?>
