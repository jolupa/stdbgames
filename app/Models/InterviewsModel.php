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
    return $builder->insert($data);
  }
  public function updateInterviewDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('interviews')
                  ->where('id', $data['id']);
    return $builder->update($data);
  }
}

?>
