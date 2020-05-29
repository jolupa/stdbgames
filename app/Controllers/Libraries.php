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
		if($check->checkLibrary($userid, $gameid) == TRUE){
			$data['lib_buttontype'] = FALSE;
 		} else {
			$data['lib_buttontype'] = TRUE;
		}
		return view('libraries/libbutton', $data);
	}
	public function deletelibraryuser($userid){
		$delete = new LibrariesModel();
		$delete->deleteLibraryUser($userid);
		return redirect()->to('/users/profile/'.session('username'));
	}
}

 ?>
