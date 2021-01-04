<?php
  namespace App\Controllers;
  use App\Models\AwardsModel;
  use CodeIgniter\Controller;

  class Award extends Controller{
    public function vote(){
      $awardmodel = new AwardsModel();
      if($awardmodel->checkVote() == false){
        return view('awards/vote');
      } else {
        return '';
      }
    }
    public function setvote($game_id){
      $awardmodel = new AwardsModel();
      $awardmodel->setVote($game_id);
      return redirect()->back();
    }
  }
 ?>
