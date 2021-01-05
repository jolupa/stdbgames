<?php
  namespace App\Models;
  use CodeIgniter\Model;

  class AwardsModel extends Model{
    public function checkVote(){
      $db = \Config\Database::connect();
      $builder = $db->table('awards')
                    ->where('user_id', session('user_id'));
      if($builder->countAllResults() > 0){
        return true;
      } else {
        return false;
      }
    }
    public function setVote($game_id){
      $data = ['game_id' => $game_id,
                'user_id' => session('user_id')];
      $db = \Config\Database::connect();
      $builder = $db->table('awards');
      $builder->insert($data);
    }
  }
 ?>
