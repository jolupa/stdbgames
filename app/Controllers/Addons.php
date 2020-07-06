<?php
namespace App\Controllers;
use App\Models\AddonsModel;
use CodeIgniter\Controller;

class Addons extends Controller{
  public function addonsgamelist($id){
    $addonmodel = new AddonsModel();
    if($addonmodel->getAddonsByGameId($id) == TRUE){
      $data['addon'] = $addonmodel->getAddonsByGameId($id);
    } else {
      $data['addon'] = FALSE;
    }
    return view('addons/addonsgamelist', $data);
  }
  public function insertform(){
    return view('addons/insert');
  }
  public function createaddon(){
    $addonmodel = new AddonsModel();
    $data['name'] = $this->request->getVar('name');
    $data['slug'] = strtolower(url_title($data['name']));
    $data['price'] = $this->request->getVar('price');
    $data['game_id'] = $this->request->getVar('game_id');
    $data['release'] = $this->request->getVar('release');
    if($this->request->getVar('sku') !== null){
      $data['sku'] = $this->request->getVar('sku');
    } else {
      $data['sku'] = null;
    }
    if($this->request->getVar('appid') !== null){
      $data['appid'] = $this->request->getVar('appid');
    } else {
      $data['appid'] = null;
    }
    $addonmodel->createAddonDb($data);
    return redirect()->to('/game/'.$this->request->getVar('slug'));
  }
}
?>
