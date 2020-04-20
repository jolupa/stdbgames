<?php
namespace App\Controllers;
use App\Models\LibrariesModel;
use CodeIgniter\Controller;

helper(['url', 'text', 'cookie']);

class Libraries extends Controller{
	public function libraryuser($userid){
		$library = new LibrariesModel();
		$data['library'] = $library->libraryByUser($userid);

		return view('libraries/libraryuser', $data);
	}
	public function addtolibrary($userid, $gameid){
		$addlibrary = new LibrariesModel();
		$data['userid'] = $userid;
		$data['gameid'] = $gameid;
		$addlibrary->addToLibrary($data);

		return redirect()->to(session('current_url'));
	}
	public function checklibrary($userid, $gameid){
		$check = new LibrariesModel();
		$data['checklibrary'] = $check->checkLibrary($userid, $gameid);
		if (empty($data['checklibrary'])){
			return view('libraries/librarybutton', ['userid'=>$userid, 'gameid'=>$gameid]);
		} else {
			return view('libraries/inlibrary');
		}
	}
}

 ?>
