<?php
namespace App\Models;
use CodeIgniter\Model;

class ReviewsModel extends Model{
  public function checkReview($gameid, $userid){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->where('Gameid', $gameid)
                  ->where('Userid', $userid);
    if($builder->countAllResults() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }
  public function getReviews($gameid = false){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->select('Reviewid AS rId,
                            About AS rAbout,
                            Date AS rDate,
                            users.Name AS ruName,
                            users.Image AS ruImage')
                  ->join('users', 'users.Userid = reviews.Userid')
                  ->where('Gameid', $gameid)
                  ->orderBy('Date', 'ASC');
    return $builder->get()->getResultArray();
  }
  public function getReview($gameid = false, $userid = false){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->select('Reviewid AS rId,
                            reviews.About AS rAbout,
                            Date AS rDate,
                            users.Name AS ruName,
                            users.Image AS ruImage')
                  ->join('users', 'users.Userid = reviews.Userid')
                  ->where('reviews.Userid', $userid)
                  ->where('reviews.Gameid', $gameid);
    return $builder->get()->getRowArray();
  }
  public function addReview($data){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews');
    return $builder->insert($data);
  }
  public function getLatestsReviews(){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->select('Reviewid AS rId,
                            reviews.About AS rAbout,
                            games.Name AS rgName,
                            games.Slug AS rgSlug,
                            games.Image AS rgImage,
                            users.Name AS ruName')
                  ->join('games', 'games.Gameid = reviews.Gameid')
                  ->join('users', 'users.Userid = reviews.Userid')
                  ->orderBy('reviews.Date', 'DESC');
    return $builder->get(5)->getResultArray();
  }
}

?>
