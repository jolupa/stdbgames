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
    return $builder->insert($data);
  }
  public function updateAddonDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('addons')
                  ->where('id', $data['id']);
    return $builder->update($data);
  }
}
?>
