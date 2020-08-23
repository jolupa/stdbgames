<?php
namespace App\Controllers;
use App\Models\PricesModel;
use CodeIgniter\Controller;
helper(['text']);

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
  public function addpriceform(){
    return view('prices/insert');
  }
  public function createpricedb(){
    $pricemodel = new PricesModel();
    $data['game_id'] = $this->request->getVar('game_id');
    $data['price'] = $this->request->getVar('price');
    $data['date'] = $this->request->getVar('date');
    $data['date_till'] = $this->request->getVar('date_till');
    $data['discount_type'] = $this->request->getVar('discount_type');
    $slug = $this->request->getVar('slug');
    $pricemodel->createPriceDb($data);
    return redirect()->to('/game/'.$slug);
  }
  public function pricesfrontpage(){
    $pricemodel = new PricesModel();
    $data['prices'] = $pricemodel->getPricesFrontPage();
    return view('prices/pricesfrontpage', $data);
  }
}
?>
