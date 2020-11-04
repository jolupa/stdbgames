<?php
namespace App\Controllers;
use App\Models\StatsModel;
use CodeIgniter\Controller;

class Stats extends Controller{
  public function gamestats(){
    $statsmodel = new StatsModel();
    $data['totalgames'] = $statsmodel->totalGames();
    $data['launchedgames'] = $statsmodel->launchedGames();
    $data['cominggames'] = $statsmodel->comingGames();
    $data['prostats'] = $statsmodel->proGames();
    $data['rumoredgames'] = $statsmodel->rumorGames();
    return view('stats/statsnavbar', $data);
  }
}

?>
