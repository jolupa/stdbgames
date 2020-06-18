<?php
namespace App\Models;
use CodeIgniter\Model;

class InterviewsModel extends Model{
  public function getInterviewById($id){
    $db = \Config\Database::connect();
    $builder = $db->table('interviews')
                  ->where('game_id', $id);
    if($builder->countAllResults(false) > 0){
      return $builder->get()->getRowArray();
    } else {
      return false;
    }
  }
}

?>
