<?php
namespace App\Controllers;
use App\Models\HomeModel;
use CodeIgniter\Controller;

helper('url');
helper('text');
helper('cookie');

class About extends Controller{
	public function index(){
		echo view('templates/header');
		echo view('templates/about');
		echo view('templates/footer');
	}
}
?>
