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
															'Image'=>[ 'label'=>'Image',
													 								'rules'=>'max_size[Image,3048]',
																					'errors'=>[ 'max_size'=>'We have a maximum size, try to reduce the Image',],
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
			if ($this->request->getFile('Image') != NULL){
				if ( is_dir (ROOTPATH.'/public/images') == FALSE){
					mkdir(ROOTPATH.'/public/images', 0777, true);
				}
				$newname = $data['Slug'].'-addon';
				$data['Image'] = $newname;
				$file = $this->request->getFile('Image')
																	->move(WRITEPATH.'uploads', $newname.'.jpeg');
				$image = \Config\Services::image('imagick')
								->withFile(WRITEPATH.'uploads/'.$newname.'.jpeg')
								->resize(1980, 1024, true, 'height')
								->convert(IMAGETYPE_JPEG)
								->save(ROOTPATH.'public/images/'.$newname.'.jpeg');
				$imagethumb = \Config\Services::image('imagick')
												 ->withFile(WRITEPATH.'uploads/'.$newname.'.jpeg')
												 ->fit(256, 256, 'center')
												 ->convert(IMAGETYPE_JPEG)
												 ->save(ROOTPATH.'public/images/'.$newname.'-thumb.jpeg');
				unlink(WRITEPATH.'uploads/'.$newname.'.jpeg');
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
		$slug = $this->request->getVar('Slug');
		if ($this->request->getVar('Image') != NULL){
			$data['Image'] = $this->request->getVar('Image');
		} else {
			if ( is_dir (ROOTPATH.'/public/images') == FALSE){
				mkdir(ROOTPATH.'/public/images', 0777, true);
			}
			$newname = $data['Slug'].'-addon';
			$data['Image'] = $newname;
			$file = $this->request->getFile('Image')
																->move(WRITEPATH.'uploads', $newname.'.jpeg');
			$image = \Config\Services::image('imagick')
							->withFile(WRITEPATH.'uploads/'.$newname.'.jpeg')
							->resize(1980, 1024, true, 'height')
							->convert(IMAGETYPE_JPEG)
							->save(ROOTPATH.'public/images/'.$newname.'.jpeg');
			$imagethumb = \Config\Services::image('imagick')
											 ->withFile(WRITEPATH.'uploads/'.$newname.'.jpeg')
											 ->fit(256, 256, 'center')
											 ->convert(IMAGETYPE_JPEG)
											 ->save(ROOTPATH.'public/images/'.$newname.'-thumb.jpeg');
			unlink(WRITEPATH.'uploads/'.$newname.'.jpeg');
		}
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
	public function list(){
		$addons = new AddonsModel();
		$data['addons'] = $addons->listAddons();

		echo view('templates/header', $data);
		echo view('addons/list', $data);
		echo view('templates/footer');
	}
}

 ?>
