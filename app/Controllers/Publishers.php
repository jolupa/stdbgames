<?php
namespace App\Controllers;
use App\Models\PublishersModel;
use CodeIgniter\Controller;

helper(['url','text','copkie']);

class Publishers extends Controller{
	public function getpublishers($publisherid){
		$publishers = new PublishersModel();
		$data['publisher'] = $publishers->getPublishers();
		$data['publisherid'] = $publisherid;

		return view('publishers/allpubs', $data);
	}
	public function publisher($slug){
		$publisher = new PublishersModel();
		$data['publisher'] = $publisher->getPublisher($slug);
		echo view('templates/header', $data);

		echo view('publishers/overview', $data);
		echo view('templates/footer');
	}
	public function developersbypublisher($publisherid){
		$developerpublisher = new PublishersModel();
		$data['developerpublisher'] = $developerpublisher->developersByPublisher($publisherid);

		return view('publishers/bydevelopers', $data);
	}
	public function edit($slug){
		$publisher = new PublishersModel();
		$data['publisher'] = $publisher->getPublisher($slug);
		echo view('templates/header');
		echo view('publishers/edit', $data);
		echo view('templates/footer');
	}
	public function updatepublisher(){
		$updatepublisher = new PublishersModel();
		$data['Publisherid'] = $this->request->getVar('Publisherid');
		$data['Name'] = $this->request->getVar('Name');
		$data['Website'] = $this->request->getVar('Website');
		if ($this->request->getVar('About') != NULL){
			$data['About'] = $this->request->getVar('About');
		}
		$updatepublisher->updatePublisher($data);

		return redirect()->to('/games');
	}
	public function insert(){
		echo view('templates/header');
		echo view('publishers/insert');
		echo view('templates/footer');
	}
	public function insertPublisher(){
		$insertpublisher = new PublishersModel();
		$data['Publisherid'] = $this->request->getVar('Publisherid');
		$data['Name'] = $this->request->getVar('Name');
		$data['Website'] = $this->request->getVar('Website');
		if($this->request->getVar('About') != NULL){
			$data['About'] = $this->request->getVar('About');
		}
		$insertpublisher->insertPublisher($data);

		return redirect()->to('/games');
	}
}

 ?>
