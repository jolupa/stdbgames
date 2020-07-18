<?php
namespace App\Controllers;
use App\Models\LibrariesModel;
use App\Models\WishlistModel;
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
    $whislistmodel = new WishlistModel();
    if($whislistmodel->checkGameWishlist($id, session('user_id')) == true){
      $whislistmodel->deleteGameWishlist($id, session('user_id'));
      $librarymodel->addToUserLibrary($id, session('user_id'));
    } else {
      $librarymodel->addTowUserLibrary($id, session('user_id'));
    }
    return redirect()->back();
  }
}

?>
