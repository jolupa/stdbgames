<?php
namespace App\Models;
use CodeIgniter\Model;

class InterviewsModel extends Model{
  public function getInterviewByGameId($game_id){
    $db = \Config\Database::connect();
    $builder = $db->table('interviews')
                  ->where('game_id', $game_id);
    if($builder->countAllResults(false) > 0){
      return $builder->get()->getRowArray();
    } else {
      return false;
    }
  }
  public function createInterviewDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('interviews');
    if($builder->insert($data) == true){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->where('id', $data['game_id']);
      return $builder->update(['updated_at'=>date('Y-m-d H:m:s')]);
    }
  }
  public function updateInterviewDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('interviews')
                  ->where('id', $data['id']);
    if($builder->update($data) == true){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->where('id', $data['game_id']);
      return $builder->update(['updated_at'=>date('Y-m-d H:m:s')]);
    }
  }
  public function getInterviews(){
    $db = \Config\Database::connect();
    $builder = $db->table('interviews')
                  ->select('games.name AS game_name,
                            games.image AS game_image,
                            games.slug AS game_slug')
                  ->join('games', 'games.id = interviews.game_id')
                  ->orderBy('interviews.id', 'DESC');
    return $builder->get(4)->getResultArray();
  }
}

?>
