<?php
namespace App\Controllers;
use App\Models\ReviewsModel;
use Abraham\TwitterOAuth\TwitterOAuth;
use CodeIgniter\Controller;

class Reviews extends Controller{
  public function gamereviews($id){
    $reviewmodel = new ReviewsModel();
    if($reviewmodel->getReviewsAll($id) == TRUE){
      $data['review'] = $reviewmodel->getReviewsAll($id);
    } else {
      $data['review'] = FALSE;
    }
    if(session('logged') == TRUE){
      $data['review_user'] = $reviewmodel->getReviewUser($id, session('user_id'));
    } else {
      $data['review_user'] = FALSE;
    }
    return view('reviews/gamereviews', $data);
  }
  public function totalvotegameoverview($id){
    $reviewmodel = new ReviewsModel();
    $data['score'] = $reviewmodel->getScoreById($id);
    return view('reviews/scoregameoverview', $data);
  }
  public function latestreviews(){
    $reviewmodel = new ReviewsModel();
    $data['review'] = $reviewmodel->getAllReviews();
    return view('reviews/reviewfrontpage', $data);
  }
  public function chart(){
    $reviewmodel = new ReviewsModel();
    $data['chart'] = $reviewmodel->chart();
    return view('reviews/chart', $data);
  }
  public function addreview(){
    $reviewmodel = new ReviewsModel();
    if($this->request->getVar('about') == null || $this->request->getVar('score') == 'Cast Your Vote!'){
      return redirect()->back();
    } else{
      $data['about'] = $this->request->getVar('about');
      $data['game_id'] = $this->request->getVar('game_id');
      $data['user_id'] = $this->request->getVar('user_id');
      if($this->request->getVar('url') !== null){
        $data['url'] = $this->request->getVar('url');
      }
      $data['score'] = $this->request->getVar('score');
      $data['date'] = date('Y-m-d H:m:s');
      $game_name = $this->request->getVar('game_name');
      $return = $this->request->getVar('return');
      require(ROOTPATH.'twitter.php');
      $statusmessage = "New Review Added to DB! for ".$game_name." by user ".session('username')." https://stdb.games/game/".$return;
      $connection = new TwitterOAuth($consumerkey, $consumersecret, $token, $tokensecret);
      $connection->post("statuses/update", ["status" => $statusmessage]);
      $reviewmodel->AddReviewDb($data);
      return redirect()->to('/game/'.$return);
    }
  }
}
?>
