<?php
namespace App\Models;
use CodeIgniter\Model;

class VotesModel extends Model{
	public function votesTotal($gameid = false, $userid = false){
		$db = \Config\Database::connect();
		if($userid){
		$builder = $db->table('votes')
									->selectAvg('Score', 'gScore')
									->where('Userid', $userid)
									->where('Gameid', $gameid);
		} else {
			$builder = $db->table('votes')
										->selectAvg('Score', 'gScore')
										->where('Gameid', $gameid);
		}
		return $builder->get()->getRowArray();
	}
	public function addVote($data){
		$db = \Config\Database::connect();
		$builder = $db->table('votes');
		return $builder->insert($data);
	}
	public function checkVote($userid, $gameid){
		$db = \Config\Database::connect();
		$builder = $db->table('votes')
									->select('Gameid,
														Userid')
									->where('Gameid', $gameid)
									->where('Userid', $userid);
		if($builder->countAllResults() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function votesByUser($userid){
		$db = \Config\Database::connect();
		$builder = $db->table('votes')
									->select('games.Name AS gName,
														games.Slug AS gSlug,
														games.Image AS gImage')
									->join('games', 'games.Gameid = votes.Gameid')
									->where('Userid', $userid);
		return $builder->get()
									->getResultArray();
	}
}

 ?>
