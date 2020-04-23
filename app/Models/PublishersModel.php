<?php
namespace App\Models;
use CodeIgniter\Model;

class PublishersModel extends Model{
	public function getPublishers(){
		$db = \Config\Database::connect();
		$builder = $db->table('publishers')
											->select('Publisherid AS pId,
																Name AS pName')
											->orderBy('Name', 'ASC');
		return $builder->get()
											->getResultArray();
	}
	public function getPublisher($slug){
		$db = \Config\Database::connect();
		$builder = $db->table('publishers')
									->select('Publisherid AS pId,
														Name AS pName,
														Slug AS pSlug,
														Website AS pWebsite')
									->where('Slug', $slug);
		return $builder->get()
										->getRowArray();
	}
	public function developersByPublisher($publisherid){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
									->select('games.Name AS gName,
														games.Slug AS gSlug,
														games.Image AS gImage,
														games.Release AS gRelease,
														developers.Name AS dName,
														developers.Slug AS dSlug')
									->join('developers','developers.Developerid = games.Developerid')
									->where('Publisherid',$publisherid);
		return $builder->get()
										->getResultArray();
	}
	public function updatePublisher($data){
		$db = \Config\Database::connect();
		$builder = $db->table('publishers')
									->where('Publisherid', $data['Publisherid']);

		return $builder->update($data);
	}
	public function insertPublisher($data){
		$db = \Config\Database::connect();
		$builder = $db->table('publishers');

		return $builder->insert($data);
	}
}

 ?>
