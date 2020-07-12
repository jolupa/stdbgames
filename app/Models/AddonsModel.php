<?php
namespace App\Models;
use CodeIgniter\Model;

class AddonsModel extends Model{
  public function getAddonsByGameId($id){
    $db = \Config\Database::connect();
    $builder = $db->table('addons')
                  ->where('game_id', $id)
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
}
?>
