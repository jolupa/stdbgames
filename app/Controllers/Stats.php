<?php
namespace App\Controllers;
use App\Models\StatsModel;
use CodeIgniter\Controller;

class Stats extends Controller{
	public function gamesstats(){
		$totalgames = new StatsModel();
		$launchedgames = new StatsModel();
		$comingames = new StatsModel();
		$data['totalgames'] = $totalgames->totalGamesStats();
		$data['launchedgames'] = $launchedgames->launchedGamesStats();
		$data['comingames'] = $comingames->comingGamesStats();

		return view('stats/headnavbar', $data);
	}
}

 ?>
