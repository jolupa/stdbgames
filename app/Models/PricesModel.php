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
  public function getPricesFrontPage(){
    $db = \Config\Database::connect();
    $builder = $db->table('prices')
                  ->select('DISTINCT(game_id),
                            prices.price AS price,
                            prices.date_till AS date_till,
                            games.name AS game_name,
                            games.image AS game_image,
                            games.slug AS game_url,')
                  ->where('prices.date_till !=', '')
                  ->where('prices.date_till >=', date('Y-m-d'))
                  ->join('games', 'games.id = prices.game_id')
                  ->orderBy('prices.date_till', 'DESC');
    return $builder->get(5)->getResultArray();
  }
}
?>
