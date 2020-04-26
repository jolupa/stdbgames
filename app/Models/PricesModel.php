<?php
namespace App\Models;
use CodeIgniter\Model;

class PricesModel extends Model{
	public function getPrices($gameid){
		$db = \Config\Database::connect();
		$builder = $db->table('prices')
									->select('Date AS pDate,
														Price AS pPrice')
									->where('Gameid', $gameid)
									->orderBy('Date', 'ASC');

		return $builder->get(10)
										->getResultArray();
	}
	public function getPricesAddons($addonid){
		$db = \Config\Database::connect();
		$builder = $db->table('pricesaddons')
									->select('Date AS pDate,
														Price AS pPrice')
									->where('Addonid', $addonid)
									->orderBy('Date', 'ASC');

		return $builder->get(10)
										->getResultArray();
	}
}

 ?>
