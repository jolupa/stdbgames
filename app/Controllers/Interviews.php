<?php
namespace App\Controllers;
use App\Models\InterviewsModel;
use Abraham\TwitterOAuth\TwitterOAuth;
use CodeIgniter\Controller;

class Interviews extends Controller{
  public function interviews($game_id){
    $interviewmodel = new InterviewsModel();
    if($interviewmodel->getInterviewByGameId($game_id) == true){
      $data['content'] = true;
      $data['interview'] = $interviewmodel->getInterviewByGameId($game_id);
      return view('interviews/interview', $data);
    } else {
      $data['content'] = false;
      return view('interviews/interview', $data);
    }
  }
  public function interviewform($game_id){
    $interviewmodel = new InterviewsModel();
    if($interviewmodel->getInterviewByGameId($game_id) == true){
      $data['interview'] = $interviewmodel->getInterviewByGameId($game_id);
      return view('interviews/interviewform', $data);
    } else {
      $data['interview'] = false;
      return view('interviews/interviewform', $data);
    }
  }
  public function createinterviewdb(){
    $interviewmodel = new InterviewsModel();
    $data['body'] = $this->request->getVar('body');
    $data['game_id'] = $this->request->getVar('game_id');
    $slug = $this->request->getVar('slug');
    $name = $this->request->getVar('game_name');
    $interviewmodel->createInterviewDb($data);
    return redirect()->to('/game/'.$slug);
  }
  public function updateinterviewdb(){
    $interviewmodel = new InterviewsModel();
    $data['body'] = $this->request->getVar('body');
    $data['game_id'] = $this->request->getVar('game_id');
    $data['id'] = $this->request->getVar('id');
    $slug = $this->request->getVar('slug');
    $interviewmodel->updateInterviewDb($data);
    return redirect()->to('/game/'.$slug);
  }
  public function interviewlist(){
    $interviewmodel = new InterviewsModel();
    $data['interview'] = $interviewmodel->getInterviews();
    return view('interviews/interviewlist', $data);
  }
}
?>
