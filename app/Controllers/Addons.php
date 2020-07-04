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
    $val = $this->validate([
      'Name'=>[
        'label'=>'name',
        'rules'=>'required|is_unique[addons.name]',
        'errors'=>[
          'required'=>'We need a name for the addon',
          'is_unique'=>'The addon exists on the DB!',
        ],
      ],
    ]);
    if(!$val){
      echo view('templates/header');
      echo view('addons/insert',['validations'=>$this->validator]);
      echo view('templates/footer');
    } else {
      $addonmodel = new AddonsModel();
      $data['name'] = $this->request->getVar('name');
      $data['release'] = $this->request->getVar('release');
      $data['game_id'] = $this->request->getVar('game_id');
      $data['price'] = $this->request->getVar('price');
      $data['sku'] = $this->request->getVar('sku');
      $data['appid'] = $this->request->getVar('appid');
      $data['created_at'] = date('Y-m-d H:m:s');
      $slug = $this->request->getVar('slug');
      if($addonmodel->createAddonDb($data) == true){
        return redirect()->to('/game/'.$slug);
      } else {
        return redirect()->to('/update/game/'.$slug);
      }
    }
  }
}
?>
