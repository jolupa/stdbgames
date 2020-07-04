<?php
namespace App\Controllers;
use App\Models\WishlistModel;
use CodeIgniter\Controller;

class Wishlists extends Controller{
  public function userwishlist($user_id){
    $wishlistmodel = new WishlistModel();
    if($wishlistmodel->getUserWishlist($user_id) == true){
      $data['wishlist'] = $wishlistmodel->getUserWishlist($user_id);
    } else {
      $data['wishlist'] = false;
    }
    return view('wishlists/userwishlist', $data);
  }
  public function isinwishlist($id){
    $whislistmodel = new WishlistModel();
    if($whislistmodel->checkGameWishlist($id, session('user_id')) == true){
      $data['wishlist'] = true;
    }else{
      $data['wishlist'] = false;
    }
    return view('wishlists/wishlistbutton', $data);
  }
  public function addtouserwishlist($id){
    $wishlistmodel = new WishlistsModel();
    $wishlistmodel->addToUserWishlist($id, session('user_id'));
    return redirect()->back();
  }
}
?>
