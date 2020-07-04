<?php
namespace App\Models;
use CodeIgniter\Model;

class PricesModel extends Model{
  public function getPricesByGameId($id){
    $db = \Config\Database::connect();
    $builder = $db->table('prices')
                  ->where('game_id', $id)
                  ->orderBy('release', 'ASC');
    if($builder->countAllResults(FALSE) > 0){
      return $builder->get()->getResultArray();
    } else {
      return FALSE;
    }
  }
}
?>
