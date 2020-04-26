<?php
namespace App\Controllers;
use App\Models\PricesModel;
use CodeIgniter\Controller;

helper(['url','text','cookie']);

class Prices extends Controller{
	public function pricehistory($gameid){
		$price = new PricesModel();
		$data['price'] = $price->getPrices($gameid);

		return view('prices/pricehistory', $data);
	}
	public function price(){
		return view('prices/price');
	}
	public function pricehistoryaddon($addonid){
		$price = new PricesModel();
		$data['price'] = $price->getPricesAddons($addonid);

		return view('prices/pricehistoryaddon', $data);
	}
}

 ?>
