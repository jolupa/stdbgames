<?php
namespace App\Controllers;
use App\Models\GamesModel;
use CodeIgniter\Controller;

helper('url');
helper('text');

class Games extends Controller
{
	public function game($slug)
	{
		$item = new GamesModel();
		$developer = new GamesModel();
		$publisher = new GamesModel();
		$data['item'] = $item->getGame($slug);
		$data['developer'] = $developer->getDevelopers();
		$data['publisher'] = $publisher->getPublishers();

		echo view('templates/header');
		echo view('games/overview', $data);
		echo view('templates/footer');
	}

	public function gameform()
	{
		$developers = new GamesModel();
		$publishers = new GamesModel();
		$data['publishers'] = $publishers->getPublishers();
		$data['developers'] = $developers->getDevelopers();

		echo view('templates/header');
		echo view('games/gameform', $data);
		echo view('templates/footer');
	}

	public function devform()
	{
		echo view('templates/header');
		echo view('games/devform');
		echo view('templates/footer');
	}

	public function pubform()
	{
		echo view('templates/header');
		echo view('games/pubform');
		echo view('templates/footer');
	}

	public function insertdeveloper()
	{
		$insert = new GamesModel();
		$data['Name'] = $this->request->getVar('Name');
		$data['Slug'] = strtolower(url_title($this->request->getVar('Name')));
		if ($this->request->getVar('Website') != NULL)
		{
			$data['Website'] = $this->request->getVar('Website');
		}
		$insert->insertDeveloper($data);

		return redirect()->to('/home/index');
	}

	public function insertpublisher()
	{
		$insert = new GamesModel();
		$data['Name'] = $this->request->getVar('Name');
		$data['Slug'] = strtolower(url_title($this->request->getVar('Name')));
		if ($this->request->getVar('Website'))
		{
			$data['Website'] = $this->request->getVar('Website');
		}
		$insert->insertPublisher($data);
		return redirect()->to('/home/index');
	}

	public function insertgame()
	{
		$insert = new GamesModel();
		$data['Title'] = $this->request->getVar('Title');
		$data['Slug'] = strtolower(url_title($this->request->getVar('Title')));
		$data['Release'] = $this->request->getVar('Release');
		$data['Pro'] = $this->request->getVar('Pro');
		$data['Developerid'] = $this->request->getVar('Developerid');
		$data['Publisherid'] = $this->request->getVar('Publisherid');
		if ($this->request->getVar('About') != NULL)
		{
			$data['About'] = $this->request->getVar('About');
		}
		if ($this->request->getFile('Image') != NULL)
		{
			if ( is_dir (ROOTPATH.'/public/images') == FALSE)
			{
				mkdir(ROOTPATH.'/public/images', 0777, true);
			}
			$data['Image'] = strtolower(url_title($this->request->getVar('Title')));
			$newname = strtolower(url_title($this->request->getVar('Title')));
			$file = $this->request->getFile('Image')
													 ->move(WRITEPATH.'uploads/', $newname);
		 	$image = \Config\Services::image()
							->withFile(WRITEPATH.'uploads/'.$newname)
							->resize(1980, 1024, true, 'height')
							->convert(IMAGETYPE_JPEG)
							->save(ROOTPATH.'public/images/'.$newname);
			$imagethumb = \Config\Services::image()
									 ->withFile(WRITEPATH.'uploads/'.$newname)
									 ->fit(256, 256, 'center')
									 ->save(ROOTPATH.'public/images/'.$newname.'-thumb');
		}
	  $insert->insertGame($data);
		return redirect()->to('/home/index');
	}

	public function gameeditform($slug)
	{
		$developers = new GamesModel();
		$publishers = new GamesModel();
		$game = new GamesModel();
		$data['developers'] = $developers->getDevelopers();
		$data['publishers'] = $publishers->getPublishers();
		$data['game'] = $game->getGame($slug);

		echo view('templates/header');
		echo view('games/gameeditform', $data);
		echo view('templates/footer');
	}

	public function updategame()
	{
		$data['Gameid'] = $this->request->getVar('Gameid');
		$data['Title'] = $this->request->getVar('Title');
		$data['Slug'] = $this->request->getVar('Slug');
		$data['Release'] = $this->request->getVar('Release');
		$data['Pro'] = $this->request->getVar('Pro');
		$data['Developerid'] = $this->request->getVar('Developerid');
		$data['Publisherid'] = $this->request->getVar('Publisherid');
		if ($this->request->getVar('About') != NULL)
		{
			$data['About'] = $this->request->getVar('About');
		}
		if ($this->request->getVar('Image') != NULL)
		{
			$data['Image'] = $this->request->getVar('Image');
		}
		if ($this->request->getFile('Image') != NULL)
		{
			$newname = strtolower(url_title($this->request->getVar('Title')));
			$file = $this->request->getFile('Image')
													 ->move(WRITEPATH.'uploads/', $newname);
		  $image = \Config\Services::image()
							->withFile(WRITEPATH.'uploads/'.$newname)
							->resize(1920, 1080, true, 'height')
							->convert(IMAGETYPE_JPEG)
							->save(ROOTPATH.'public/images/'.$newname);
			$imagethumb = \Config\Services::image()
									 ->withFile(WRITEPATH.'uploads/'.$newname)
									 ->fit(256, 256, 'center')
									 ->save(ROOTPATH.'public/images/'.$newname.'-thumb');
		  $data['Image'] = $newname;
		}

		$update = new GamesModel();
		$update->updateGame($data);
		return redirect()->to('/home/index');
	}

	public function developer($slug)
	{
		$developer = new GamesModel();
		$data['developer'] = $developer->developerOverview($slug);

		echo view('templates/header');
		echo view('games/developer', $data);
		echo view('templates/footer');
	}

	public function publisher($slug)
	{
		$publisher = new GamesModel();
		$data['publisher'] = $publisher->publisherOverview($slug);

		echo view('templates/header');
		echo view('games/publisher', $data);
		echo view('templates/footer');
	}

	public function deveditform($slug)
	{
		$developer = new GamesModel();
		$data['developer'] = $developer->getDeveloper($slug);

		echo view('templates/header');
		echo view('games/deveditform', $data);
		echo view('templates/footer');
	}

	public function updatedeveloper()
	{
		$data['Developerid'] = $this->request->getVar('Developerid');
		$data['Name'] = $this->request->getVar('Name');
		if ( $this->request->getVar('Website') != NULL)
		{
			$data['Website'] = $this->request->getVar('Website');
		} else {
			$data['Website'] = NULL;
		}
		if ( $this->request->getVar('About') != NULL)
		{
			$data['About'] = $this->request->getVar('About');
		}

		$update = new GamesModel();
		$update->updateDeveloper($data);

		return redirect()->to('/home/index');
	}

	public function pubeditform($slug)
	{
		$publisher = new GamesModel();
		$data['publisher'] = $publisher->getPublisher($slug);

		echo view('templates/header');
		echo view('games/pubeditform', $data);
		echo view('templates/footer');
	}

	public function updatepublisher()
	{
		$data['Publisherid'] = $this->request->getVar('Publisherid');
		$data['Name'] = $this->request->getVar('Name');
		if ( $this->request->getVar('Website') != NULL)
		{
			$data['Website'] = $this->request->getVar('Website');
		} else {
			$data['Website'] = NULL;
		}
		if ( $this->request->getVar('About') != NULL)
		{
			$data['About'] = $this->request->getVar('About');
		}

		$update = new GamesModel();
		$update->updatePublisher($data);

		return redirect()->to('/home/index');
	}
}
?>
