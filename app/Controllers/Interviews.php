<?php
namespace App\Controllers;
use App\Models\InterviewsModel;
use CodeIgniter\Controller;

class Interviews extends Controller{
  public function interviews($id){
   $interviewmodel = new InterviewsModel();
   if($interviewmodel->getInterviewById($id) == true){
     $data['content'] = true;
     $data['interview'] = $interviewmodel->getInterviewById($id);
     return view('interviews/interview', $data);
   } else {
     $data['content'] = false;
     return view('interviews/interview', $data);
   }
  }
}

?>
