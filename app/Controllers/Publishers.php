<?php
namespace App\Controllers;
use App\Models\PublishersModel;
use CodeIgniter\Controller;

helper(['text']);

class Publishers extends Controller{
  public function overviewgamepublisher($id){
    $publishermodel = new PublishersModel();
    $data['publisher'] = $publishermodel->getPublisherById($id);
    return view('publishers/overviewgamepublisher', $data);
  }
  public function allpubs(){
    $publishermodel = new PublishersModel();
    $data['publisher'] = $publishermodel->getAllPublishers();
    return view('publishers/pubselection', $data);
  }
  public function overview($slug){
    $publishermodel = new PublishersModel();
    $data['publisher'] = $publishermodel->getPublisherBySlug($slug);
    echo view('templates/header', $data);
    echo view('publishers/overview', $data);
    echo view('templates/footer');
  }
  public function gamespublishedby($publisher_id){
    $publishermodel = new PublishersModel();
    $data['game'] = $publishermodel->getGamesPublishedBy($publisher_id);
    return view('publishers/publishedby', $data);
  }
  public function insertform(){
    if(session('role') == 1){
      $data['editor'] = true;
      echo view('templates/header');
      echo view('publishers/insert');
      echo view('templates/footer', $data);
    } else {
      $data['error'] = "You don't have permissions to see this page";
      echo view('templates/header');
      echo view('publishers/insert', $data);
      echo view('templates/footer');
    }
  }
  public function createpublisherdb(){
    $publishermodel = new PublishersModel();
    $data['name'] = $this->request->getVar('name');
    $data['slug'] = strtolower(url_title($this->request->getVar('name')));
    $data['url'] = $this->request->getVar('url');
    $data['about'] = $this->request->getVar('about');
    $data['created_at'] = date('Y-m-d H:m:s');
    $publishermodel->createPublisherDb($data);
    return redirect()->to('/publisher/'.$data['slug']);
  }
  public function updateform($slug){
    if(session('role') == 1){
      $publishermodel = new PublishersModel();
      $data['publisher'] = $publishermodel->getPublisherBySlug($slug);
      $data['editor'] = true;
      echo view('templates/header');
      echo view('publishers/updateform', $data);
      echo view('templates/footer', $data);
    } else {
      $data['error'] = "You don't have permission to see this page.";
      echo view('templates/header');
      echo view('publishers/updateform', $data);
      echo view('templates/footer');
    }
  }
  public function updatepublisherdb(){
    $publishermodel = new PublishersModel();
    $data['id'] = $this->request->getVar('id');
    $data['name'] = $this->request->getVar('name');
    $data['url'] = $this->request->getVar('url');
    $data['about'] = $this->request->getVar('about');
    $data['updated_at'] = date('Y-m-d H:m:s');
    $publishermodel->updatePublisherDb($data);
    return redirect()->to('/publisher/'.$this->request->getVar('slug'));
  }
}
?>
