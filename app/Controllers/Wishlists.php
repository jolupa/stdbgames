<?php
namespace App\Controllers;
use App\Models\WishlistsModel;
use CodeIgniter\Controller;

helper(['url','text','cookie']);

class Wishlists extends Controller{
  public function wishbutton($userid, $gameid){
    $wish = new WishlistsModel();
    if($wish->checkWishList($userid, $gameid) == TRUE){
      $data['wis_buttontype'] = FALSE;
    } else {
      $data['wis_buttontype'] = TRUE;
    }
    return view('wishlists/wishbutton', $data);
  }
  public function addtowishlist($userid, $gameid){
    $add = new WishlistsModel();
    if($add->addToWishList($userid, $gameid) == TRUE){
      return redirect()->to(session('current_url'));
    } else {
      return redirect()->back()->with('error','It seems that somethings goes wrong!');
    }
  }
  public function deletefromlibrary($userid, $gameid){
    $delete = new WishlistsModel();
    if($delete->deleteUserGameWish($userid, $gameid) == TRUE){
      return redirect()->to(session('current_url'));
    } else {
      return redirect()->back()->with('error', 'It seems that somethings goes wrong!');
    }
  }
  public function wishlistuser($userid){
    $wishlist = new WishlistsModel();
    $data['wishlist'] = $wishlist->getWishListUser($userid);
    return view('wishlists/wishlistuser', $data);
  }
}

?>
