<?php
namespace App\Models;
use CodeIgniter\Model;

class StatsModel extends Model{
	public function totalGamesStats(){
		$db = \Config\Database::connect();
		$builder = $db->table('games');

		return $builder->countAllResults();
	}
	public function launchedGamesStats(){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
									->where('Release <=', date('Y-m-d'));

		return $builder->countAllResults();
	}
	public function comingGamesStats(){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
									->where('Release >', date('Y-m-d'));

		return $builder->countAllResults();
	}
}

 ?>
