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
    if($this->request->getVar('About') == NULL && $this->request->getVar('Score') == NULL){
      return redirect()->to(session('current_url'));
    } else {
      if($this->request->getVar('About') != NULL){
        $data['About'] = $this->request->getVar('About');
      }
      $data['Date'] = date('Y-m-d H:m:s');
      $data['Gameid'] = $this->request->getVar('Gameid');
      $data['Userid'] = $this->request->getVar('Userid');
      if($this->request->getVar('Exturl') != NULL){
        $data['Exturl'] = $this->request->getVar('Exturl');
      }
      if($this->request->getVar('Score') != NULL){
        $data['Score'] = $this->request->getVar('Score');
      }
      $add->addReview($data);
      return redirect()->to(session('current_url'));
    }
  }
  public function latestreviews(){
    $latest = new ReviewsModel();
    $data['latest'] = $latest->getLatestsReviews();
    return view('reviews/latest', $data);
  }
  public function total($gameid = false, $userid = false){
    $totalvote = new ReviewsModel();
    if($userid){
      $data['totalvote'] = $totalvote->votesTotal($gameid, $userid);
    } else {
      $data['totalvote'] = $totalvote->votesTotal($gameid);
    }

    return view('reviews/totalvote', $data);
  }
  public function checkvote($userid, $gameid){
    $check = new ReviewsModel();
    $data['checkvote'] = $check->checkVote($userid, $gameid);
    if($data['checkvote'] == FALSE){
      return view('reviews/votebutton');
    } else {
      return view('reviews/voted');
    }
  }
  /*
  public function addvote($gameid, $userid, $vote){
    $addvote = new ReviewsModel();
    $data['Gameid'] = $gameid;
    $data['Userid'] = $userid;
    $data['Score'] = $vote;
    $data['addvote'] =$addvote->addVote($data);

    return redirect()->to(session('current_url'));
  }
  */
  public function votesbyuser($userid){
    $votesbyuser = new ReviewsModel();
    $data['votesbyuser'] = $votesbyuser->votesByUser($userid);

    return view('reviews/votes', $data);
  }
  public function votesfront(){
    $bestvoted = new ReviewsModel();
    $data['bestvoted'] = $bestvoted->getBestVoted();
    return view('reviews/votesfront', $data);
  }
}

?>
