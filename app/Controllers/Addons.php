<?php
namespace App\Controllers;
use App\Models\AddonsModel;
use CodeIgniter\Controller;

helper(['text','url','cookie']);

class Addons extends Controller{
	public function addon($slug){
		$addon = new AddonsModel();
		$data['addon'] = $addon->getAddon($slug);

		echo view('templates/header', $data);
		echo view('addons/overview', $data);
		echo view('templates/footer');
	}
	public function insert(){
		echo view('templates/header');
		echo view('addons/insert');
		echo view('templates/footer');
	}
	public function insertaddon(){
		$insert = new AddonsModel();
		$val = $this->validate([ 'Name'=>[ 'label'=>'Name',
											'rules'=>'required|is_unique[games.Name]',
											'errors'=>[ 'required'=>'The Addon has a Name nope?',
														'is_unique'=>'The Addon is already in the DB!', ],
									],
								]);
		if(!$val){
			echo view('templates/header');
			echo view('addons/insert', ['validations'=>$this->validator]);
			echo view('templates/footer');
		} else {
			$data['Name'] = $this->request->getVar('Name');
			$data['Release'] = $this->request->getVar('Release');
			$data['Gameid'] = $this->request->getVar('Gameid');
			$data['Developerid'] = $this->request->getVar('Developerid');
			$data['Publisherid'] = $this->request->getVar('Publisherid');
			$data['About'] = $this->request->getVar('About');
			$data['Slug'] = strtolower(url_title($this->request->getVar('Name')));
			if ($this->request->getVar('Releaseprice') != NULL){
				$data['Releaseprice'] = $this->request->getVar('Releaseprice');
			}
			if ($this->request->getVar('Sku') != NULL){
				$data['Sku'] = $this->request->getVar('Sku');
			}
			if ($this->request->getVar('Appid') != NULL){
				$data['Appid'] = $this->request->getVar('Appid');
			}
			$insert->insertAddon($data);

			return redirect()->to('/addons/addon/'.$data['Slug']);
		}
	}
	public function update($slug){
		$update = new AddonsModel();
		$data['addon'] = $update->getAddon($slug);

		echo view('templates/header');
		echo view('addons/edit', $data);
		echo view('templates/footer');
	}
	public function updateaddon(){
		$update = new AddonsModel();
		$data['Addonid'] = $this->request->getVar('Addonid');
		$data['Name'] = $this->request->getVar('Name');
		$data['Release'] = $this->request->getVar('Release');
		$data['Gameid'] = $this->request->getVar('Gameid');
		$data['Developerid'] = $this->request->getVar('Developerid');
		$data['Publisherid'] = $this->request->getVar('Publisherid');
		$data['About'] = $this->request->getVar('About');
		if($this->request->getVar('Releaseprice') != NULL){
			$data['Releaseprice'] = $this->request->getVar('Releaseprice');
		}
		if ($this->request->getVar('Sku') != NULL){
			$data['Sku'] = $this->request->getVar('Sku');
		}
		if ($this->request->getVar('Appid') != NULL){
			$data['Appid'] = $this->request->getVar('Appid');
		}
		$slug = $this->request->getVar('Slug');
		$update->updateAddon($data);

		return redirect()->to('/addons/addon/'.$slug);
	}
	public function gamehasaddons($gameid){
		$hasaddons = new AddonsModel();
		$data['gamehasaddons'] = $hasaddons->gameHasAddons($gameid);

		return view('addons/gamehasaddons', $data);
	}
	public function addonshome(){
		$addonshome = new AddonsModel();
		$data['addonshome'] = $addonshome->getAddons();

		return view('addons/addonshome', $data);
	}
	public function addonslist(){
		$addonlist = new AddonsModel();
		$data['addons'] = $addonlist->addonsList();

		return view('addons/list', $data);
	}
}

 ?>
