<?php
namespace App\Controllers;
use App\Models\AddonsModel;
use CodeIgniter\Controller;

helper(['url','text','cookie']);

class Addons extends Controller{
	// We get the addons for the Overview of Games
	public function gamehasaddons($gameid){
		$gamehasaddons = new AddonsModel();
		$data['gamehasaddons'] = $gamehasaddons->getAddons($gameid);

		return view('addons/gamehasaddons', $data);
	}
	//We presente the form to insert a new addon on the DB
	public function insert(){
		echo view('templates/header');
		echo view('addons/insert');
		echo view('templates/footer');
	}
	//We insert the addon on DB
	public function insertaddon(){
		$insert = new AddonsModel();
		$data = [
						'Name' => $this->request->getVar('Name'),
						'Gameid' => $this->request->getVar('Gameid'),
						'Developerid' => $this->request->getVar('Developerid'),
						'Publisherid' => $this->request->getVar('Publisherid'),
						'Slug' => strtolower(url_title($this->request->getVar('Name'))),
						'Releaseprice' => $this->request->getVar('Releaseprice'),
						'Sku' => $this->request->getVar('Sku'),
						'Appid' => $this->request->getVar('Appid'),
						'Release' => $this->request->getVar('Release')
					];
		$insert->insertAddon($data);
		//If we insert the addon from a game page we return to
		//If not we return to the index page
		if(session('current_url')){
			return redirect()->to(session('current_url'));
		} else {
			return redirect()->to(base_url());
		}
	}
	//We presente the form to update the addon based on the addon-Slug
	public function update($slug){
		$update = new AddonsModel();
		$data['addon'] = $update->getAddon($slug);
		echo view('templates/header');
		echo view('addons/edit', $data);
		echo view('templates/footer');
	}
	//We update the addon on DB
	public function updateaddon(){
		$update = new AddonsModel();
		$data = [
			'Addonid' => $this->request->getVar('Addonid'),
			'Name' => $this->request->getVar('Name'),
			'Gameid'=> $this->request->getVar('Gameid'),
			'Developerid' => $this->request->getVar('Developerid'),
			'Publisherid' => $this->request->getVar('Publisherid'),
			'Releaseprice' => $this->request->getVar('Releaseprice'),
			'Release' => $this->request->getVar('Release'),
			'Sku' => $this->request->getVar('Sku'),
			'Appid' => $this->request->getVar('Appid')
		];
		$update->updateAddon($data);
		return redirect()->to(session('current_url'));
	}
	//We delete the addon from DB based on addon-Id
	public function deleteaddon($addonid){
		$delete = new AddonsModel();
		$delete->deleteAddon($addonid);
		return redirect()->to(session('current_url'));
	}
}

?>
