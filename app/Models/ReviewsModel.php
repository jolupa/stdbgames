<?php
namespace App\Models;
use CodeIgniter\Model;

class ReviewsModel extends Model{
  public function getReviewsAll($id){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->select('reviews.id AS id,
                            reviews.about AS about,
                            reviews.created_at AS date,
                            reviews.url AS url,
                            reviews.updated_at AS updated_at,
                            users.id AS user_id,
                            users.image AS user_image,
                            users.name AS user_name,
                            users.role AS user_role,
                            games.id AS game_id,
                            games.name AS game_name,')
                  ->where('game_id', $id)
                  ->join('users', 'users.id = reviews.user_id')
                  ->join('games', 'games.id = reviews.game_id');
    if($builder->countAllResults(FALSE) > 0){
      return $builder->get()->getResultArray();
    } else {
      return FALSE;
    }
  }
  public function getReviewUser($id, $user_id){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->select('reviews.id AS id,
                            reviews.about AS about,
                            reviews.created_at AS date,
                            reviews.url AS url,
                            reviews.updated_at AS updated_at,
                            users.id AS user_id,
                            users.name AS user_name,
                            users.image AS user_image,
                            users.role AS user_role,
                            games.id AS game_id,
                            games.name AS game_name')
                  ->where('game_id', $id)
                  ->where('user_id', $user_id)
                  ->join('users', 'users.id = reviews.user_id')
                  ->join('games', 'games.id = reviews.game_id');
    if($builder->countAllResults(FALSE) > 0){
      return $builder->get()->getRowArray();
    } else {
      return FALSE;
    }
  }
  public function getScoreById($id){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->select('AVG(score) AS score')
                  ->where('game_id', $id);
    return $builder->get()->getRowArray();
  }
  public function getAllReviews(){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->select('reviews.id AS id,
                            reviews.about AS about,
                            reviews.created_at AS date,
                            users.name AS user_name,
                            users.role AS user_role,
                            games.name AS game_name,
                            games.slug AS game_slug,
                            games.image AS game_image')
                  ->join('users', 'users.id = reviews.user_id')
                  ->join('games', 'games.id = reviews.game_id')
                  ->orderBy('reviews.created_at', 'DESC');
    return $builder->get(5)->getResultArray();
  }
  public function addReviewDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews');
    return $builder->insert($data);
  }
  public function updateReviewDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->where('id', $data['id']);
    return $builder->update($data);
  }
}
?>
