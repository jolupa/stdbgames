<?php
namespace App\Controllers;
use App\Models\ReviewsModel;
use CodeIgniter\Controller;

helper(['text','cookie','url']);

class Reviews extends Controller{
  public function review($gameid, $userid){
    $check = new ReviewsModel();
    if($check->checkReview($gameid, $userid) === TRUE){
      $reviews = new ReviewsModel();
      $review = new ReviewsModel();
      $data['reviews'] = $review->getReviews($gameid, $userid);
      $data['review'] = $review->getReview($gameid, $userid);
      $data['insert'] = FALSE;
      return view('reviews/review', $data);
    }
    if($check->checkReview($gameid, $userid) === FALSE){
      $reviews = new ReviewsModel();
      $data['reviews'] = $reviews->getReviews($gameid);
      $data['insert'] = TRUE;
      return view('reviews/review', $data);
    }
  }
  public function addreview(){
    $add = new ReviewsModel();
    $data['About'] = $this->request->getVar('About');
    $data['Date'] = date('Y-m-d');
    $data['Gameid'] = $this->request->getVar('Gameid');
    $data['Userid'] = $this->request->getVar('Userid');
    $add->addReview($data);
    if($this->request->getVar('Score') != NULL){
      $gameid = $this->request->getVar('Gameid');
      $userid = $this->request->getVar('Userid');
      $vote = $this->request->getVar('Score');
      return redirect()->to('/votes/addvote/'.$gameid.'/'.$userid.'/'.$vote);
    } else {
      return redirect()->to(session('current_url'));
    }
  }
}

?>
