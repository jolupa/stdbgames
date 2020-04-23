<?php
namespace App\Controllers;
use App\Models\DevelopersModel;
use CodeIgniter\Controller;

helper(['url','text','cookie']);

class Developers extends Controller{
	public function developer($slug){
		$developer = new DevelopersModel();
		$data['developer'] = $developer->getDeveloper($slug);

		echo view('templates/header', $data);
		echo view('developers/overview', $data);
		echo view('templates/footer');
	}
	public function publishersbydeveloper($developerid){
		$publisherdeveloper = new DevelopersModel();
		$data['publisherdeveloper'] = $publisherdeveloper->getPublishersByDeveloper($developerid);

		return view('developers/bypublisher', $data);
	}
	public function getdevelopers($developerid = false){
		$developers = new DevelopersModel();
		$data['developer'] = $developers->getDevelopers();
		$data['developerid'] = $developerid;

		return view('developers/alldevs', $data);
	}
	public function edit($slug){
		$developer = new DevelopersModel();
		$data['developer'] = $developer->getDeveloper($slug);

		echo view('templates/header');
		echo view('developers/edit', $data);
		echo view('templates/footer');
	}
	public function updatedeveloper(){
		$updatedeveloper = new DevelopersModel();
		$data['Developerid'] = $this->request->getVar('Developerid');
		$data['Name'] = $this->request->getVar('Name');
		$data['Website'] = $this->request->getVar('Website');
		if($this->request->getVar('About') != NULL){
			$data['About'] = $this->request->getVar('About');
		}
		$slug = $this->request->getVar('Slug');
		$updatedeveloper->developerUpdate($data);
		return redirect()->to('/developers/developer/'.$slug);
	}
	public function insert(){
		echo view('templates/header');
		echo view('developers/insert');
		echo view('templates/footer');
	}
	public function insertdeveloper(){
		$insertdeveloper = new DevelopersModel();
		$data['Name'] = $this->request->getVar('Name');
		$data['Slug'] = strtolower(url_text($this->request->getVar('Name')));
		$data['Website'] = $this->request->getVar('Website');
		if($this->request->getVar('About') != NULL){
			$data['About'] = $this->request->getVar('About');
		}
		$insertdeveloper->insertDeveloper($data);

		return redirect()->to('/developers/developer/'.$data['Slug']);
	}
}

?>
