<?php
namespace App\Controllers;
use App\Models\VotesModel;
use CodeIgniter\Controller;

helper(['url', 'text','cookie']);

class Votes extends Controller{
	public function total($gameid){
		$totalvote = new VotesModel();
		$data['totalvote'] = $totalvote->votesTotal($gameid);

		return view('votes/totalvote', $data);
	}
	public function checkvote($userid, $gameid){
		$check = new VotesModel();
		$data['checkvote'] = $check->checkVote($userid, $gameid);
		if (empty($data['checkvote'])){
			return view('votes/votebutton', ['userid'=>$userid, 'gameid'=>$gameid]);
		} else {
			return view('votes/voted');
		}
	}
	public function addvote($gameid, $userid, $vote){
		$addvote = new VotesModel();
		$data['Gameid'] = $gameid;
		$data['Userid'] = $userid;
		$data['Score'] = $vote;
		$data['addvote'] =$addvote->addVote($data);

		return redirect()->to(session('current_url'));
	}
	public function votesbyuser($userid){
		$votesbyuser = new VotesModel();
		$data['votesbyuser'] = $votesbyuser->votesByUser($userid);

		return view('users/votes', $data);
	}
}
 ?>
