<?php
namespace App\Models;
use CodeIgniter\Model;

class LibrariesModel extends Model{
	public function libraryByUser($userid){
		$db = \Config\Database::connect();
		$builder = $db->table('libraries')
									->select('games.Name AS gName,
														games.Slug AS gSlug,
														games.Image AS gImage')
									->join('games', 'games.Gameid = libraries.Gameid')
									->where('libraries.Userid', $userid);
		return $builder->get()
									->getResultArray();
	}
	public function addToLibrary($data){
		$db = \Config\Database::connect();
		$builder = $db->table('libraries');

		return $builder->insert($data);
	}
	public function checkLibrary($userid, $gameid){
		$db = \Config\Database::connect();
		$builder = $db->table('libraries')
									->where('Gameid', $gameid)
									->where('Userid', $userid);
		if($builder->countAllResults() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	public function deleteLibraryUser($userid){
		$db = \Config\Database::connect();
		$builder = $db->table('libraries');
		return $builder->delete(['Userid'=>$userid]);
	}
}


 ?>
