<?php
namespace App\Controllers;
use App\Models\ReviewsModel;
use CodeIgniter\Controller;

helper(['text','cookie','url']);

class Reviews extends Controller{
  public function checkreview($gameid, $userid){
    $checkreview = new ReviewsModel();
    if($checkreview->checkReview($gameid, $userid) == TRUE){
      $data['checkreview'] = FALSE;
      return view('reviews/insert', $data);
    } else {
      $data['checkreview'] = TRUE;
      return view('reviews/insert', $data);
    }
  }
  public function review($gameid, $userid){
    $reviews = new ReviewsModel();
    $data['reviews'] = $reviews->getReviews($gameid, $userid);
    return view('reviews/review', $data);
  }
  public function addreview(){
    $add = new ReviewsModel();
    if($this->request->getVar('About') != NULL){
      $data['About'] = $this->request->getVar('About');
      $data['Date'] = date('Y-m-d H:m:s');
      $data['Gameid'] = $this->request->getVar('Gameid');
      $data['Userid'] = $this->request->getVar('Userid');
      $add->addReview($data);
    }
    if($this->request->getVar('Score') != NULL){
      if($this->request->getVar('Score') == 'Cast Your Vote!'){
        return redirect()->to(session('current_url'));
      } else {
        $gameid = $this->request->getVar('Gameid');
        $userid = $this->request->getVar('Userid');
        $vote = $this->request->getVar('Score');
        return redirect()->to('/votes/addvote/'.$gameid.'/'.$userid.'/'.$vote);
      }
    } else {
      return redirect()->to(session('current_url'));
    }
  }
  public function latestreviews(){
    $latest = new ReviewsModel();
    $data['latest'] = $latest->getLatestsReviews();
    return view('reviews/latest', $data);
  }
}

?>
