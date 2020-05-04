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
														addons.Releaseprice AS aReleaseprice,
														addons.Release AS aRelease,
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
									->select('Addonid AS aId,
														Name AS aName,
														Slug AS aSlug,
														Release AS aRelease,
														Releaseprice As aReleaseprice')
									->where('Gameid', $gameid)
									->orderBy('Release', 'DESC');

		return $builder->get()
										->getResultArray();
	}
	public function addonsList(){
		$db = \Config\Database::connect();
		$builder = $db->table('addons')
									->select('addons.Addonid AS aId,
														addons.Name AS aName,
														games.Name AS agName')
									->join('games', 'games.Gameid = addons.Gameid');

		return $builder->get()
										->getResultArray();
	}
}

 ?>
