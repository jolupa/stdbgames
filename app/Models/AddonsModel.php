<?php
namespace App\Models;
use CodeIgniter\Model;

class AddonsModel extends Model{
	public function getAddon($slug){
		$db = \Config\Database::connect();
		$builder = $db->table('addons')
									->select('Addonid AS aId,
														addons.Name AS aName,
														addons.Slug AS aSlug,
														addons.Image AS aImage,
														addons.Release AS aRelease,
														addons.About AS aAbout,
														games.Gameid AS agId,
														games.Slug AS agSlug,
														games.Name AS agName,
														developers.Developerid AS adId,
														developers.Slug AS adSlug,
														developers.Name AS adName,
														publishers.Publisherid AS apId,
														publishers.Slug AS apSlug,
														publishers.Name AS apName')
									->join('games', 'games.Gameid = addons.Gameid')
									->join('developers', 'developers.Developerid = addons.Developerid')
									->join('publishers', 'publishers.Publisherid = addons.Publisherid')
									->where('aSlug', $slug);

		return $builder->get()
										->getRowArray();
	}
	public function insertAddon($data){
		$db = \Config\Database::connect();
		$builder = $db->table('addons');

		return $builder->insert($data);
	}
	public function updateAddon($data){
		$db = \Config\Database::connect();
		$builder = $db->table('addons')
									->where('Addonid', $data['Addonid']);

		return $builder->update($data);
	}
	public function gameHasAddons($gameid){
		$db = \Config\Database::connect();
		$builder = $db->table('addons')
									->select('Name AS aName,
														Slug AS aSlug,
														Image AS aImage')
									->where('Gameid', $gameid)
									->orderBy('Release', 'DESC');

		return $builder->get()
										->getResultArray();
	}
	public function getAddons(){
		$db = \Config\Database::connect();
		$builder = $db->table('addons')
									->select('addons.Slug AS aSlug,
														addons.Name AS aName,
														addons.Image AS aImage,
														addons.About AS aAbout,
														addons.Release AS aRelease,
														developers.Name AS adName,
														developers.Slug AS adSlug,
														publishers.Name AS apName,
														publishers.Slug AS apSlug')
									->join('developers', 'developers.Developerid = addons.Developerid')
									->join('publishers', 'publishers.Publisherid = addons.Publisherid')
									->where('aRelease <=', date('Y-m-d'))
									->orderBy('aRelease', 'DESC');

		return $builder->get(8)
										->getResultArray();
	}
	public function listAddons(){
		$db = \Config\Database::connect();
		$builder = $db->table('addons')
									->select('addons.Name AS aName,
														addons.Slug AS aSlug,
														addons.Image AS aImage,
														addons.Release AS aRelease,
														developers.Name AS adName,
														publishers.Name AS apName')
									->join('developers', 'developers.Developerid = addons.Developerid')
									->join('publishers', 'publishers.Publisherid = addons.Publisherid')
									->where('aRelease <=', date('Y-m-d'))
									->orderBy('aRelease', 'DESC');

		return $builder->get()
										->getResultArray();
	}
}

 ?>
