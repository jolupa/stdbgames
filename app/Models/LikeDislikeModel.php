<?php
namespace App\Models;
use CodeIgniter\Model;

class LikeDislikeModel extends Model {
  public function getLikes($id){
    $db = \Config\Database::connect();
    $builder = $db->table('likedislike')
                  ->select('SUM(like) AS total')
                  ->where('game_id', $id);
    return $builder->get()->getRowArray();
  }
  public function getDislikes($id){
    $db = \Config\Database::connect();
    $builder = $db->table('likedislike')
                  ->select('SUM(dislike) AS total')
                  ->where('game_id', $id);
    return $builder->get()->getRowArray();
  }
  public function getLikeDislikeByIp($ip, $id){
    $db = \Config\Database::connect();
    $builder = $db->table('likedislike')
                  ->select('ip')
                  ->where('ip', $ip)
                  ->where('game_id', $id);
    if($builder->countAllResults(false) > 0){
      return true;
    } else {
      return false;
    }
  }
  public function insertLike($id, $ip){
    $db = \Config\Database::connect();
    $builder = $db->table('likedislike');
    return $builder->insert(['game_id' => $id, 'ip' => $ip, 'like' => 1]);
  }
  public function insertDislike($id, $ip){
    $db = \Config\Database::connect();
    $builder = $db->table('likedislike');
    return $builder->insert(['game_id' => $id, 'ip' => $ip, 'dislike' => 1]);
  }
}
 ?>
