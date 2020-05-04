<?php
namespace App\Models;
use CodeIgniter\Model;

class PricesModel extends Model{
	public function getPrices($gameid){
		$db = \Config\Database::connect();
		$builder = $db->table('prices')
									->select('Priceid AS pId,
														Date AS pDate,
														Price AS pPrice,
														Discounttype AS pDiscounttype')
									->where('Gameid', $gameid)
									->orderBy('Date', 'ASC');

		return $builder->get()
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
	public function newPrice($data){
		$db = \Config\Database::connect();
		$builder = $db->table('prices');

		return $builder->insert($data);
	}
	public function deletePrice($priceid){
		$db = \Config\Database::connect();
		$builder = $db->table('prices');

		return $builder->delete(['Priceid'=>$priceid]);
	}
	public function newPriceAddon($data){
		$db = \Config\Database::connect();
		$builder = $db->table('pricesaddons');

		return $builder->insert($data);
	}
}

 ?>
