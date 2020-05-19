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
	public function getBestVoted(){
		$db = \Config\Database::connect();
		$builder = $db->table('votes')
									->select('AVG(Score) AS vScore,
														games.Name As vgName,
														games.Image AS vgImage,
														games.Slug AS vgSlug,
														developers.Name AS vdName,
														publishers.Name AS vpName')
									->join('games', 'games.Gameid = votes.Gameid')
									->join('developers', 'developers.Developerid = games.Developerid')
									->join('publishers', 'publishers.Publisherid = games.Publisherid')
									->groupBy('Score')
									->orderBy('Score', 'DESC');
		return $builder->get(5)->getResultArray();
	}
}

 ?>
