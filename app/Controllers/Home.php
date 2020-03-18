<?php
namespace App\Controllers;
use App\Models\HomeModel;
use CodeIgniter\Controller;

helper('url');
helper('text');
helper('cookie');

class Home extends Controller{
	public function index(){
		$gameshome = new HomeModel();
		$foundershome = new HomeModel();
		$soonhome = new HomeModel();
		$data['title'] = "Stadia GamesDB!";
		$data['games'] = $gameshome->getGamesHome();
		$data['founders'] = $foundershome->getFoundersHome();
		$data['soon'] = $soonhome->getGamesSoon();

		echo view('templates/header', $data);
		echo view('home/founders', $data['founders']);
		echo view('search/searchform');
		echo view('home/soon', $data['soon']);
		echo view('home/list', $data['games']);
		echo view('templates/footer');
	}
}
?>
