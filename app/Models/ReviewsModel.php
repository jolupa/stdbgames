<?php
namespace App\Models;
use CodeIgniter\Model;

class ReviewsModel extends Model{
  public function checkReview($gameid, $userid){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->select('Date AS rDate,
                            About AS rAbout')
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
                            Score AS rScore,
                            reviews.Userid AS rUid,
                            Date AS rDate,
                            Exturl AS rExturl,
                            users.Name AS ruName,
                            users.Image AS ruImage,
                            users.Role AS ruRole')
                  ->join('users', 'users.Userid = reviews.Userid')
                  ->where('Gameid', $gameid)
                  ->orderBy('Date', 'ASC');
    return $builder->get()->getResultArray();
  }
  /* Posible that this model function didnt work I disable the controller function
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
  */
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
  public function votesTotal($gameid = false, $userid = false){
    $db = \Config\Database::connect();
    if($userid){
    $builder = $db->table('reviews')
                  ->selectAvg('Score', 'gScore')
                  ->where('Userid', $userid)
                  ->where('Gameid', $gameid);
    } else {
      $builder = $db->table('reviews')
                    ->selectAvg('Score', 'gScore')
                    ->where('Gameid', $gameid);
    }
    return $builder->get()->getRowArray();
  }
  public function checkVote($userid, $gameid){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->select('Gameid,
                            Userid')
                  ->where('Gameid', $gameid)
                  ->where('Userid', $userid);
    if($builder->countAllResults() > 0){
      return TRUE;
    } else {
      return FALSE;
    }
  }
  /*
  public function addVote($data){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews');
    return $builder->insert($data);
  }
  */
  public function votesByUser($userid){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->select('games.Name AS gName,
                            games.Slug AS gSlug,
                            games.Image AS gImage')
                  ->join('games', 'games.Gameid = reviews.Gameid')
                  ->where('Userid', $userid);
    return $builder->get()
                  ->getResultArray();
  }
  public function getBestVoted(){
    $db = \Config\Database::connect();
    $builder = $db->table('reviews')
                  ->select('AVG(Score) AS vScore,
                            games.Name As vgName,
                            games.Image AS vgImage,
                            games.Slug AS vgSlug,
                            developers.Name AS vdName,
                            publishers.Name AS vpName')
                  ->join('games', 'games.Gameid = reviews.Gameid')
                  ->join('developers', 'developers.Developerid = games.Developerid')
                  ->join('publishers', 'publishers.Publisherid = games.Publisherid')
                  ->groupBy('reviews.Gameid')
                  ->orderBy('vScore', 'DESC');
    return $builder->get(5)->getResultArray();
  }
}

?>
