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
  public function getLikeDislikeByUserId($id){
    $db = \Config\Database::connect();
    $builder = $db->table('likedislike')
                  ->select('user_id')
                  ->where('user_id', session('user_id'))
                  ->where('game_id', $id);
    if($builder->countAllResults(false) > 0){
      return true;
    } else {
      return false;
    }
  }
  public function insertLike($id){
    $db = \Config\Database::connect();
    $builder = $db->table('likedislike');
    return $builder->insert(['game_id' => $id, 'user_id' => session('user_id'), 'like' => 1]);
  }
  public function insertDislike($id){
    $db = \Config\Database::connect();
    $builder = $db->table('likedislike');
    return $builder->insert(['game_id' => $id, 'user_id' => session('user_id'), 'dislike' => 1]);
  }
  public function getLikeDislikeChart(){
    $db = \Config\Database::connect();
    $builder = $db->table('likedislike')
                  ->select('games.name AS game_name,
                            games.slug AS game_slug,
                            games.image AS game_image,
                            developers.name AS developer_name,
                            developers.slug AS developer_slug,
                            publishers.name AS publisher_name,
                            publishers.slug AS publisher_slug,
                            SUM(likedislike.like) AS like')
                  ->where('likedislike.like !=', '')
                  ->join('games', 'games.id = likedislike.game_id')
                  ->join('developers', 'developers.id = games.developer_id')
                  ->join('publishers', 'publishers.id = games.publisher_id')
                  ->groupBy('likedislike.game_id')
                  ->orderBy('like', 'DESC');
    return $builder->get(5)->getResultArray();
  }
  public function getLikesByUserId($id){
    $db = \Config\Database::connect();
    $builder = $db->table('likedislike')
                  ->select('user_id')
                  ->where('user_id', session('user_id'))
                  ->where('game_id', $id)
                  ->where('like', 1);
    if($builder->countAllResults(false) > 0){
      return true;
    } else {
      return false;
    }
  }
  public function getDislikesByUserId($id){
    $db = \Config\Database::connect();
    $builder = $db->table('likedislike')
                  ->select('user_id')
                  ->where('user_id', session('user_id'))
                  ->where('game_id', $id)
                  ->where('dislike', 1);
    if($builder->countAllResults(false) > 0){
      return true;
    } else {
      return false;
    }
  }
}
 ?>
