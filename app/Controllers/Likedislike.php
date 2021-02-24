<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\LikeDislikeModel;

class LikeDislike extends Controller {
  public function getLikeDislikes($id){
    $likedislikemodel = new LikeDislikeModel();
    $data['like'] = $likedislikemodel->getLikes($id);
    $data['dislike'] = $likedislikemodel->getDislikes($id);
    return view('likedislike/likedislikebuttons', $data);
  }
  public function insertLike($id){
    $likedislikemodel = new LikeDislikeModel();
    $ip = $this->request->getIPAddress();
    if($likedislikemodel->getLikeDislikeByIp($ip, $id) == false) {
      $likedislikemodel->insertLike($id, $ip);
    }
    return redirect()->back();
  }
  public function insertdislike($id){
    $likedislikemodel = new LikeDislikeModel();
    $ip = $this->request->getIPAddress();
    if($likedislikemodel->getLikeDislikeByIp($ip, $id) == false) {
      $likedislikemodel->insertDislike($id, $ip);
    }
    return redirect()->back();
  }
  public function likedislikechart(){
    $likedislikemodel = new LikeDislikeModel();
    $data['chart'] = $likedislikemodel->getLikeDislikeChart();
    return view('likedislike/likedislikechart', $data);
  }
}
 ?>
