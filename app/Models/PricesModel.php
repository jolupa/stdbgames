<?php
namespace App\Models;
use CodeIgniter\Model;

class PricesModel extends Model{
	public function getPrices($gameid){
		$db = \Config\Database::connect();
		$builder = $db->table('prices')
									->select('Date AS pDate,
														Price AS pPrice,
														Discounttype AS pDiscounttype')
									->where('Gameid', $gameid)
									->orderBy('Date', 'ASC');

		return $builder->get(8)
										->getResultArray();
	}
	public function getPricesAddons($addonid){
		$db = \Config\Database::connect();
		$builder = $db->table('pricesaddons')
									->select('Date AS pDate,
														Price AS pPrice,
														Discounttype AS pDiscounttype')
									->where('Addonid', $addonid)
									->orderBy('Date', 'ASC');

		return $builder->get(8)
										->getResultArray();
	}
	public function newPriceGame($data){
		$db = \Config\Database::connect();
		$builder = $db->table('prices');

		return $builder->insert($data);
	}
	public function newPriceAddon($data){
		$db = \Config\Database::connect();
		$builder = $db->table('pricesaddons');

		return $builder->insert($data);
	}
}

 ?>
