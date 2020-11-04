<?php
namespace App\Models;
use CodeIgniter\Model;

class StatsModel extends Model{
  public function totalGames(){
    $db = \Config\Database::connect();
    $builder = $db->table('games');
    return $builder->countAllResults();
  }
  public function launchedGames(){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->where('release <=', date('Y-m-d'));
    return $builder->countAllResults();
  }
  public function comingGames(){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->where('release >', date('Y-m-d'));
    return $builder->countAllResults();
  }
  public function proGames(){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->where('pro_from !=', '')
                  ->where('pro_from <=', date('Y-m-d'));
    return $builder->countAllResults();
  }
  public function rumorGames(){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->where('rumor', 1);
    return $builder->countAllResults();
  }
}

?>
