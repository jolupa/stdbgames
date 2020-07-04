<?php
namespace App\Controllers;
use App\Models\LibrariesModel;
use CodeIgniter\Controller;

class Libraries extends Controller{
  public function userlibrary($user_id){
    $librarymodel = new LibrariesModel();
    if($librarymodel->getUserLibrary($user_id) == true){
      $data['library'] = $librarymodel->getUserLibrary($user_id);
    } else {
      $data['library'] = false;
    }
    return view('libraries/userlibrary', $data);
  }
  public function isinlibrary($id){
    $librarymodel = new LibrariesModel();
    if($librarymodel->checkGameLibrary($id, session('user_id')) == true){
      $data['library'] = true;
    }else{
      $data['library'] = false;
    }
    return view('libraries/librarybutton', $data);
  }
  public function addtouserlibrary($id){
    $librarymodel = new LibrariesModel();
    $librarymodel->addToUserLibrary($id, session('user_id'));
    $goto = session('ci_previous_url');
    return redirect()->back();
  }
}

?>
