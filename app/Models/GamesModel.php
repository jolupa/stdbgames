<?php
namespace App\Models;
use CodeIgniter\Model;

class GamesModel extends Model{
	public function getGamesFounders(){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
									->select('Gameid AS gId,
														games.Name AS gName,
														games.Slug AS gSlug,
														Release AS gRelease,
														Image AS gImage,
														developers.Name AS gdName,
														publishers.Name AS gpName')
									->join('developers', 'developers.Developerid = games.Developerid')
									->join('publishers', 'publishers.Publisherid = games.Publisherid')
									->where('Pro', 1)
									->where('Profrom <=', date('Y-m-d'));
		return $builder->get()
											->getResultArray();
	}
	public function getGamesSoon(){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
											->select('Gameid AS gId,
																games.Name AS gName,
																games.Slug AS gSlug,
																Release AS gRelease,
																Image AS gImage,
																developers.Name AS gdName,
																publishers.Name AS gpName')
											->join('developers', 'developers.Developerid = games.Developerid')
											->join('publishers', 'publishers.Publisherid = games.Publisherid')
											->where('Release >', date('Y-m-d'))
											->orderBy('Release', 'ASC');
		return $builder->get(8)
											->getResultArray();
	}
	public function getGamesLaunched(){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
											->select('Gameid AS gId,
																games.Name AS gName,
																games.Slug AS gSlug,
																Release AS gRelease,
																Image AS gImage,
																developers.Name AS gdName,
																publishers.Name AS gpName')
											->join('developers', 'developers.Developerid = games.Developerid')
											->join('publishers', 'publishers.Publisherid = games.Publisherid')
											->where('Release <=', date('Y-m-d'))
											->orderBy('Release', 'DESC');
		return $builder->get(8)
											->getResultArray();
	}
	public function getGamesLasts(){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
											->select('Gameid AS gId,
																games.Name AS gName,
																games.Slug AS gSlug,
																Release AS gRelease,
																Image AS gImage,
																developers.Name AS gdName,
																publishers.Name AS gpName')
											->join('developers', 'developers.Developerid = games.Developerid')
											->join('publishers', 'publishers.Publisherid = games.Publisherid')
											->orderBy('Gameid', 'DESC');
		return $builder->get(4)
											->getResultArray();
	}
	public function getGame($slug){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
									->select('Gameid AS gId,
														games.Name AS gName,
														games.Slug AS gSlug,
														games.Image AS gImage,
														games.Developerid AS gdId,
														games.Publisherid AS gpId,
														games.About AS gAbout,
														games.Sku AS gSku,
														games.Appid AS gAppid,
														games.Releaseprice AS gReleaseprice,
														games.Firstonstadia AS gFirstonstadia,
														games.Stadiaexclusive AS gStadiaexclusive,
														Pro AS gPro,
														Profrom AS gProfrom,
														Protill AS gProtill,
														Release AS gRelease,
														games.About AS gAbout,
														developers.Name AS gdName,
														developers.Slug AS gdSlug,
														publishers.Name AS gpName,
														publishers.Slug AS gpSlug')
									->join('developers', 'developers.Developerid = games.Developerid')
									->join('publishers', 'publishers.Publisherid = games.Publisherid')
									->where('gSlug', $slug);
		return $builder->get()
										->getRowArray();
	}
	public function insertGame($data){
		$db = \Config\Database::connect();
		$builder = $db->table('games');

		return $builder->insert($data);
	}
	public function updateGame($data){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
									->where('Gameid', $data['Gameid']);

		return $builder->update($data);
	}
	public function getGames($type = false){
		$db = \Config\Database::connect();
		if ($type == 'soon'){
			$builder = $db->table('games')
										->select('games.Slug AS gSlug,
															games.Name AS gName,
															games.Image AS gImage,
															Release AS gRelease,
															developers.Name AS gdName,
															publishers.Name AS gpName')
										->join('developers', 'developers.Developerid = games.Developerid')
										->join('publishers', 'publishers.Publisherid = games.Publisherid')
										->where('Release >', date('Y-m-d'))
										->orderBy('Release', 'ASC');
		} elseif ($type == 'launched'){
			$builder = $db->table('games')
										->select('games.Slug AS gSlug,
															games.Name AS gName,
															games.Image AS gImage,
															Release AS gRelease,
															developers.Name AS gdName,
															publishers.Name AS gpName')
										->join('developers', 'developers.Developerid = games.Developerid')
										->join('publishers', 'publishers.Publisherid = games.Publisherid')
										->where('Release <=', date('Y-m-d'))
										->orderBy('Release', 'DESC');
		} elseif ($type === 'firstonstadia'){
			$builder = $db->table('games')
										->select('games.Slug AS gSlug,
															games.Name AS gName,
															games.Image AS gImage,
															Release AS gRelease,
															developers.Name AS gdName,
															publishers.Name AS gpName')
										->join('developers', 'developers.Developerid = games.Developerid')
										->join('publishers', 'publishers.Publisherid = games.Publisherid')
										->where('Firstonstadia', 1)
										->orderBy('Release', 'DESC');
		} elseif ($type === 'stadiaexclusive'){
			$builder = $db->table('games')
										->select('games.Slug AS gSlug,
															games.Name AS gName,
															games.Image AS gImage,
															Release AS gRelease,
															developers.Name AS gdName,
															publishers.Name AS gpName')
										->join('developers', 'developers.Developerid = games.Developerid')
										->join('publishers', 'publishers.Publisherid = games.Publisherid')
										->where('Stadiaexclusive', 1)
										->orderBy('Release', 'DESC');
		} elseif($type === 'all'){
			$builder = $db->table('games')
										->select('games.Slug AS gSlug,
															games.Name AS gName,
															games.Image AS gImage,
															Release AS gRelease,
															developers.Name AS gdName,
															publishers.Name AS gpName')
										->join('developers', 'developers.Developerid = games.Developerid')
										->join('publishers', 'publishers.Publisherid = games.Publisherid')
										->orderBy('Release', 'DESC');
		} else {
			$builder = $db->table('games')
										->select('games.Gameid AS gId,
															games.Name AS gName')
										->orderBy('Name', 'ASC');
		}
		return $builder->get()
									->getResultArray();
	}
	public function addGameToLibrary($data){
		$db = \Config\Database::connect();
		$builder = $db->table('libraries');

		return $builder->insert($data);
	}
	public function newPrice($data){
		$db = \Config\Database::connect();
		$builder = $db->table('prices');
		return $builder->insert($data);
	}
	public function getPrices($gameid){
		$db = \Config\Database::connect();
		$builder = $db->table('prices')
									->select('Price AS pPrice,
														Date AS pDate')
									->where('Gameid', $gameid)
									->orderBy('pDate', 'ASC');
		return $builder->get()
										->getResultArray();
	}
	public function deleteGame($gameid){
		$db = \Config\Database::connect();
		$builder = $db->table('games');
		return $builder->delete(['Gameid'=>$gameid]);
	}
}

 ?>
