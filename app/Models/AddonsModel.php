<?php
namespace App\Models;
use CodeIgniter\Model;

class AddonsModel extends Model{
	//Model for gamehasaddons function
	public function getAddons($gameid){
		$db = \Config\Database::connect();
		$builder = $db->table('addons')
									->select('Addonid AS aId,
														Name AS aName,
														Slug AS aSlug,
														Release AS aRelease,
														Releaseprice AS aReleaseprice')
									->where('Gameid', $gameid)
									->orderBy('Release', 'DESC');
		return $builder->get()->getResultArray();
	}
	//Model for insertaddon function
	public function insertAddon($data){
		$db = \Config\Database::connect();
		$builder = $db->table('addons');
		return $builder->insert($data);
	}
	//Model for update function
	public function getAddon($slug){
		$db = \Config\Database::connect();
		$builder = $db->table('addons')
									->select('Addonid AS aId,
														Name AS aName,
														Release AS aRelease,
														Releaseprice As aReleaseprice,
														Gameid AS agId,
														Developerid AS adId,
														Publisherid AS apId,
														Sku AS aSku,
														Appid AS aAppid')
									->where('Slug', $slug);
		return $builder->get()->getRowArray();
	}
	//Model for updateaddon function
	public function updateAddon($data){
		$db = \Config\Database::connect();
		$builder = $db->table('addons')
									->where('Addonid', $data['Addonid']);
		return $builder->update($data);
	}
	//Model for deleteaddon function
	public function deleteAddon($addonid){
		$db = \Config\Database::connect();
		$builder = $db->table('addons');
		return $builder->delete(['Addonid'=>$addonid]);
	}
}

 ?>
