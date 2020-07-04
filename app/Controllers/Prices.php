<?php
namespace App\Controllers;
use App\Models\PricesModel;
use CodeIgniter\Controller;

class Prices extends Controller{
  public function gamepricehistory($id){
    $pricemodel = new PricesModel();
    if($pricemodel->getPricesByGameId($id) == TRUE){
      $data['price'] = $pricemodel->getPricesByGameId($id);
    } else {
      $data['price'] = FALSE;
    }
    return view('prices/pricesgamelist', $data);
  }
}
?>
