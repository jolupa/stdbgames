<?php
namespace App\Controllers;
use App\Models\GamesModel;
use CodeIgniter\Controller;

helper(['url','text','cookie']);

class Games extends Controller{
	public function index(){
		$founders = new GamesModel();
		$soon = new GamesModel();
		$launched = new GamesModel();
		$lasts = new GamesModel();
		$data['founders'] = $founders->getGamesFounders();
		$data['soon'] = $soon->getGamesSoon();
		$data['launched'] = $launched->getGamesLaunched();
		$data['lasts'] = $lasts->getGamesLasts();

		echo view('templates/header', $data);
		echo view('games/lasts', $data['lasts']);
		echo view('games/founders', $data['founders']);
		echo view('search/searchform');
		echo view('games/soon', $data['soon']);
		echo view('games/launched', $data['launched']);
		echo view('templates/footer');
	}
	public function game($slug){
		$game = new GamesModel();
		$data['game'] = $game->getGame($slug);
		$session = \Config\Services::session();
		$session->set('current_url', $_SERVER['REQUEST_URI']);

		echo view('templates/header', $data);
		echo view('games/overview', $data);
		echo view('templates/footer');
	}
	public function gameproinfo(){
		return view('games/proinfo');
	}
	public function insert(){
		echo view('templates/header');
		echo view('games/gameform');
		echo view('templates/footer');
	}
	public function insertgame(){
		$insert = new GamesModel();
		$val = $this->validate([ 'Name'=>[ 'label'=>'Name',
		 																					'rules'=>'required|is_unique[games.Name]',
																							'errors'=>[ 'required'=>'The Game has a Name nope?',
																														'is_unique'=>'The game is already in the DB!', ],
																						],
																'Image'=>[ 'label'=>'Image',
																 							'rules'=>'max_size[Image,3048]|is_image[Image]',
																							'errors'=>[ 'max_size'=>'We have a maximum size, try to reduce the Image',
																							 							'is_image'=>'Sure you are uploading an Image',],
																						],
															 ]);
		if (!$val){
			echo view('templates/header');
			echo view('games/gameform', ['validations'=>$this->validator]);
		} else {
			$data['Name'] = $this->request->getVar('Name');
			$data['Slug'] = strtolower(url_title($this->request->getVar('Name')));
			$data['Release'] = $this->request->getVar('Release');
			$data['Pro'] = $this->request->getVar('Pro');
			if ($this->request->getVar('Profrom') != NULL){
				$data['Profrom'] = $this->request->getVar('Profrom');
			}
			if ($this->request->getVar('Protill') != NULL){
				$data['Protill'] = $this->request->getVar('Protill');
			}
			$data['Developerid'] = $this->request->getVar('Developerid');
			$data['Publisherid'] = $this->request->getVar('Publisherid');
			if ($this->request->getVar('About') != NULL){
				$data['About'] = $this->request->getVar('About');
			}
			if ($this->request->getFile('Image') != NULL){
				if ( is_dir (ROOTPATH.'/public/images') == FALSE){
					mkdir(ROOTPATH.'/public/images', 0777, true);
				}
				$newname = $data['Slug'];
				$data['Image'] = $newname;
				$file = $this->request->getFile('Image')
														 			->move(WRITEPATH.'uploads', $newname);
			 	$image = \Config\Services::image()
								->withFile(WRITEPATH.'uploads/'.$newname)
								->resize(1980, 1024, true, 'height')
								->convert(IMAGETYPE_JPEG)
								->save(ROOTPATH.'public/images/'.$newname);
				$imagethumb = \Config\Services::image()
												 ->withFile(WRITEPATH.'uploads/'.$newname)
												 ->fit(256, 256, 'center')
												 ->convert(IMAGETYPE_JPEG)
												 ->save(ROOTPATH.'public/images/'.$newname.'-thumb');
				unlink(WRITEPATH.'uploads/'.$newname);
			}
		 	$insert->insertGame($data);

			return redirect()->to('/games/game/'.$data['Slug']);
		}
	}
	public function update($slug){
		$game = new GamesModel();
		$data['game'] = $game->getGame($slug);

		echo view('templates/header', $data);
		echo view('games/edit', $data);
		echo view('templates/footer');
	}
	public function updategame(){
		$data['Gameid'] = $this->request->getVar('Gameid');
		$data['Name'] = $this->request->getVar('Name');
		$data['Slug'] = strtolower(url_title($this->request->getVar('Name')));
		$data['Release'] = $this->request->getVar('Release');
		$data['Pro'] = $this->request->getVar('Pro');
		if ($this->request->getVar('Profrom') != NULL){
			$data['Profrom'] = $this->request->getVar('Profrom');
		}
		if ($this->request->getVar('Protill') != NULL){
			$data['Protill'] = $this->request->getVar('Protill');
		}
		$data['Developerid'] = $this->request->getVar('Developerid');
		$data['Publisherid'] = $this->request->getVar('Publisherid');
		if ($this->request->getVar('About') != NULL){
			$data['About'] = $this->request->getVar('About');
		}
		if ($this->request->getVar('Image') != NULL){
			$data['Image'] = $this->request->getVar('Image');
		} else {
			if ( is_dir (ROOTPATH.'/public/images') == FALSE){
				mkdir(ROOTPATH.'/public/images', 0777, true);
			}
			$newname = $data['Slug'];
			$data['Image'] = $newname;
			$file = $this->request->getFile('Image')
																->move(WRITEPATH.'uploads', $newname);
			$image = \Config\Services::image()
							->withFile(WRITEPATH.'uploads/'.$newname)
							->resize(1980, 1024, true, 'height')
							->convert(IMAGETYPE_JPEG)
							->save(ROOTPATH.'public/images/'.$newname);
			$imagethumb = \Config\Services::image()
											 ->withFile(WRITEPATH.'uploads/'.$newname)
											 ->fit(256, 256, 'center')
											 ->convert(IMAGETYPE_JPEG)
											 ->save(ROOTPATH.'public/images/'.$newname.'-thumb');
			unlink(WRITEPATH.'uploads/'.$newname);
		}
		$update->updateGame($data);

		return redirect()->to('/games/game/'.$data['Slug']);
	}
	public function list($type){
		$games = new GamesModel();
		$data['games'] = $games->getGames($type);
		$data['type'] = $type;

		echo view('templates/header', $data);
		echo view('games/list', $data);
		echo view('templates/footer');
	}
	public function about(){
		echo view('templates/header');
		echo view('templates/about');
		echo view('templates/footer');
	}
}
 ?>
