<?php
namespace App\Models;
use CodeIgniter\Model;

class AddonsModel extends Model{
  public function getAddonsByGameId($id){
    $db = \Config\Database::connect();
    $builder = $db->table('addons')
                  ->where('game_id', $id);
    if($builder->countAllResults(FALSE) > 0){
      return $builder->get()->getResultArray();
    } else {
      return FALSE;
    }
  }
}
?>
