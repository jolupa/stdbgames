<?php
namespace App\Models;
use CodeIgniter\Model;

class ConnectModel extends Model{
  public function getGamesPresented(){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->where('created_at', date('2020-07-14 00:00:00'));
    return $builder->get()->getResultArray();
  }
}

?>
