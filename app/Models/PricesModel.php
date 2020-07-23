<?php
namespace App\Models;
use CodeIgniter\Model;

class PricesModel extends Model{
  public function getPricesByGameId($id){
    $db = \Config\Database::connect();
    $builder = $db->table('prices')
                  ->where('game_id', $id)
                  ->orderBy('date', 'DESC');
    if($builder->countAllResults(FALSE) > 0){
      return $builder->get(10)->getResultArray();
    } else {
      return FALSE;
    }
  }
  public function createPriceDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('prices');
    if($builder->insert($data) == true){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->where('id', $data['game_id']);
      return $builder->update(['updated_at'=>date('Y-m-d H:m:s')]);
    }
  }
}
?>
