<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LikeDislikeModel;

class LikeDislike extends Controller {
  public function getLikeDislikes($id){
    $likedislikemodel = new LikeDislikeModel();
    $data['like'] = $likedislikemodel->getLikes($id);
    $data['dislike'] = $likedislikemodel->getDislikes($id);
    if(session('logged') == true){
      if($likedislikemodel->getLikesByUserId($id) == true){
        $data['user_like'] = 1;
      } else {
        $data['user_like'] = 0;
      }
      if($likedislikemodel->getDislikesByUserId($id) == true){
        $data['user_dislike'] = 1;
      } else {
        $data['user_dislike'] = 0;
      }
    }
    return view('likedislike/likedislikebuttons', $data);
  }
  public function insertLike($id){
    $likedislikemodel = new LikeDislikeModel();
    if(session('logged') == true){
      $likedislikemodel->insertLike($id);
      return redirect()->back();
    }
  }
  public function insertdislike($id){
    $likedislikemodel = new LikeDislikeModel();
    if(session('logged') == true){
      $likedislikemodel->insertDislike($id);
      return redirect()->back();
    }
  }
  public function likedislikechart(){
    $likedislikemodel = new LikeDislikeModel();
    $data['chart'] = $likedislikemodel->getLikeDislikeChart();
    return view('likedislike/likedislikechart', $data);
  }
}
 ?>
