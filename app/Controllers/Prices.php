<?php
namespace App\Controllers;
use App\Models\PricesModel;
use Abraham\TwitterOAuth\TwitterOAuth;
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
    require(ROOTPATH.'twitter.php');
    $statusmessage = "New Deal! https://stdb.games/game/".$slug;
    $connection = new TwitterOAuth($consumerkey, $consumersecret, $token, $tokensecret);
    $connection->post("statuses/update", ["status" => $statusmessage]);
    $pricemodel->createPriceDb($data);
    return redirect()->to('/game/'.$slug);
  }
  public function pricesfrontpage(){
    $pricemodel = new PricesModel();
    $data['prices'] = $pricemodel->getPricesFrontPage();
    return view('prices/pricesfrontpage', $data);
  }
  public function updateprice($game_id){
    $pricemodel = new PricesModel();
    if($pricemodel->getPricesByGameId($game_id) == TRUE){
      $data['price'] = $pricemodel->getPricesByGameId($game_id);
    } else {
      $data['price'] = FALSE;
    }
    return view('prices/pricesupdatelist', $data);
  }
  public function updatepricedb(){
    $pricemodel = new PricesModel();
    $data['price'] = $this->request->getVar('price');
    $data['date'] = $this->request->getVar('date');
    $data['date_till'] = $this->request->getVar('date_till');
    $data['discount_type'] = $this->request->getVar('discount_type');
    $data['game_id'] = $this->request->getVar('game_id');
    $data['id'] = $this->request->getVar('id');
    $slug = $this->request->getVar('slug');
    $pricemodel->updatePriceDb($data);
    return redirect()->to('/game/'.$slug);
  }
  public function listdeals(){
    $pricemodel = new PricesModel();
    $data['type'] = 'deals';
    $data['list'] = $pricemodel->getAllDeals();
    echo view('templates/header');
    echo view('games/list', $data);
    echo view('templates/footer');
  }
}
?>
