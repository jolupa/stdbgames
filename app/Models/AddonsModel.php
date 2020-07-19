<?php
namespace App\Models;
use CodeIgniter\Model;

class AddonsModel extends Model{
  public function getAddonsByGameId($game_id){
    $db = \Config\Database::connect();
    $builder = $db->table('addons')
                  ->where('game_id', $game_id)
                  ->orderBy('release', 'DESC');
    if($builder->countAllResults(FALSE) > 0){
      return $builder->get()->getResultArray();
    } else {
      return FALSE;
    }
  }
  public function createAddonDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('addons');
    if($builder->insert($data) == true){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->where('id', $data['game_id']);
      return $builder->update(['updated_at'=>date('Y-m-d H:m:s')]);
    }
  }
  public function updateAddonDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('addons')
                  ->where('id', $data['id']);
    if($builder->update($data) == true){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->where('id', $data['game_id']);
      return $builder->update(['updated_at'=>date('Y-m-d H:m:s')]);
    }
  }
}
?>
