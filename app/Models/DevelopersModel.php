<?php
namespace App\Models;
use CodeIgniter\Model;

class DevelopersModel extends Model{
	public function getDeveloper($slug){
		$db = \Config\Database::connect();
		$builder = $db->table('developers')
											->select('Developerid AS dId,
																Name AS dName,
																Slug AS dSlug,
																About AS dAbout,
																Website AS dWebsite')
											->where('Slug', $slug);
		return $builder->get()
											->getRowArray();
	}
	public function getDevelopers(){
		$db = \Config\Database::connect();
		$builder = $db->table('developers')
											->select('Developerid AS dId,
																Name AS dName')
											->orderBy('Name', 'ASC');
		return $builder->get()
											->getResultArray();
	}
	public function getPublishersByDeveloper($developerid){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
											->select('Gameid AS gId,
																games.Name AS gName,
																games.Slug AS gSlug,
																Image AS gImage,
																Release AS gRelease,
																publishers.Name AS pName,
																publishers.Slug AS pSlug')
											->join('publishers', 'publishers.Publisherid = games.Publisherid')
											->where('Developerid', $developerid);

		return $builder->get()
											->getResultArray();
	}
	public function developerUpdate($data){
		$db = \Config\Database::connect();
		$builder = $db->table('developers')
									->where('Developerid', $data['Developerid']);
		return $builder->update($data);
	}
	public function insertDeveloper($data){
		$db = \Config\Database::connect();
		$builder = $db->table('developers');

		return $builder->insert($data);
	}
}

 ?>
