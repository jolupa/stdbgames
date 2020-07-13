<?php
namespace App\Controllers;
use App\Models\AddonsModel;
use CodeIgniter\Controller;

class Addons extends Controller{
  public function addonsgamelist($game_id){
    $addonmodel = new AddonsModel();
    if($addonmodel->getAddonsByGameId($game_id) == TRUE){
      $data['addon'] = $addonmodel->getAddonsByGameId($game_id);
    } else {
      $data['addon'] = FALSE;
    }
    return view('addons/addonsgamelist', $data);
  }
  public function insertform(){
    return view('addons/insert');
  }
  public function createaddondb(){
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
  public function updateaddon($game_id){
    $addonmodel = new AddonsModel();
    if($addonmodel->getAddonsByGameId($game_id) == TRUE){
      $data['addon'] = $addonmodel->getAddonsByGameId($game_id);
    } else {
      $data['addon'] = FALSE;
    }
    return view('addons/addonsupdatelist', $data);
  }
  public function updateaddondb(){
    $addonmodel = new AddonsModel();
    $data['name'] = $this->request->getVar('name');
    $data['id'] = $this->request->getVar('id');
    $data['game_id'] = $this->request->getVar('game_id');
    $data['price'] = $this->request->getVar('price');
    $data['sku'] = $this->request->getVar('sku');
    $data['appid'] = $this->request->getVar('appid');
    $slug = $this->request->getVar('slug');
    $addonmodel->updateAddonDb($data);
    return redirect()->to('/game/'.$slug);
  }
}
?>
