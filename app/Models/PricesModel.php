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
                  ->select('price_pro AS price_pro,
                            price_nonpro AS price_nonpro,
                            date AS date,
                            date_till_pro AS date_till_pro,
                            date_till_nonpro AS date_till_nonpro,
                            for_pro AS for_pro,
                            for_nonpro AS for_nonpro,
                            games.name AS game_name,
                            games.image AS game_image,
                            games.slug AS game_url,')
                  ->where('prices.date_till_pro >=', date('Y-m-d'))
                  ->Orwhere('prices.date_till_nonpro >=', date('Y-m-d'))
                  ->join('games', 'games.id = prices.game_id')
                  ->orderBy('games.name', 'ASC');
    return $builder->get(4)->getResultArray();
  }
  public function updatePriceDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('prices')
                  ->where('id', $data['id']);
    if($builder->update($data) == true){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->where('id', $data['game_id']);
      return $builder->update(['updated_at'=>date('Y-m-d H:m:s')]);
    }
  }
  public function getAllDeals(){
    $db = \Config\Database::connect();
    $builder = $db->table('prices')
                  ->select('prices.price_pro AS price_pro,
                            prices.price_nonpro AS price_nonpro,
                            prices.date AS date,
                            prices.date_till_pro AS date_till_pro,
                            prices.date_till_nonpro AS date_till_nonpro,
                            games.id AS game_id,
                            games.name AS name,
                            games.slug AS slug,
                            games.image AS image,
                            games.price AS game_price')
                  ->where('prices.date_till_pro >=', date('Y-m-d'))
                  ->orWhere('prices.date_till_nonpro >=', date('Y-m-d'))
                  ->join('games', 'games.id = prices.game_id')
                  ->orderBy('games.name', 'ASC');
    return $builder->get()->getResultArray();
  }
}
?>
