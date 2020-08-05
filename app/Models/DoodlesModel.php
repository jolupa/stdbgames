<?php
namespace App\Models;
use CodeIgniter\Model;

class DoodlesModel extends Model{
  public function indexDoodle(){
    $db = \Config\Database::connect();
    $builder = $db->table('doodles')
                  ->select('doodles.game_id,
                            doodles.image,
                            games.name AS game_name,
                            games.slug AS game_slug')
                  ->join('games','games.id = doodles.game_id');
    if($builder->countAllResults(false) > 0){
      return $builder->get()->getResultArray();
    } else {
      return false;
    }
  }
  public function createDoodleDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('doodles');
    return $builder->insert($data);
  }
}

?>
