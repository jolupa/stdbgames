<?php
namespace App\Controllers;
use App\Models\DevelopersModel;
use CodeIgniter\Controller;

helper(['text']);

class Developers extends Controller{
  public function overviewgamedeveloper($id){
    $developermodel = new DevelopersModel();
    $data['developer'] = $developermodel->getDeveloperById($id);
    return view('developers/overviewgamedeveloper', $data);
  }
  public function alldevs(){
    $developermodel = new DevelopersModel();
    $data['developer'] = $developermodel->getAllDevelopers();
    return view('developers/devselection', $data);
  }
  public function overview($slug){
    $developermodel = new DevelopersModel();
    $data['developer'] = $developermodel->getDeveloperBySlug($slug);
    echo view('templates/header', $data);
    echo view('developers/overview', $data);
    echo view('templates/footer');
  }
  public function gamesdevelopedby($developer_id){
    $developermodel = new DevelopersModel();
    $data['game'] = $developermodel->getGamesDevelopedBy($developer_id);
    return view('developers/developedby', $data);
  }
  public function insertform(){
    if(session('logged') == true){
      $data['editor'] = true;
      echo view('templates/header');
      echo view('developers/insert');
      echo view('templates/footer', $data);
    } else {
      $data['error'] ="You don't have permission to see this page.";
      echo view('templates/header');
      echo view('developers/insert', $data);
      echo view('templates/footer');
    }
  }
  public function createdeveloperdb(){
    $developermodel = new DevelopersModel();
    $data['name'] = $this->request->getVar('name');
    $data['slug'] = strtolower(url_title($this->request->getVar('name')));
    $data['url'] = $this->request->getVar('url');
    $data['about'] = $this->request->getVar('about');
    $data['created_at'] = date('Y-m-d H:m:s');
    $developermodel->createDeveloperDb($data);
    return redirect()->to('/developer/'.$data['slug']);
  }
  public function updateform($slug){
    if(session('role') == 1){
      $developermodel = new DevelopersModel();
      $data['developer'] = $developermodel->getDeveloperBySlug($slug);
      $data['editor'] = true;
      echo view('templates/header');
      echo view('developers/updateform', $data);
      echo view('templates/footer', $data);
    } else {
      $data['error'] = "You don't have permission to see this page.";
      echo view('templates/header');
      echo view('developers/updateform', $data);
      echo view('templates/footer');
    }
  }
  public function updatedeveloperdb(){
    $developermodel = new DevelopersModel();
    $data['id'] = $this->request->getVar('id');
    $data['name'] = $this->request->getVar('name');
    $data['url'] = $this->request->getVar('url');
    $data['about'] = $this->request->getVar('about');
    $data['updated_at'] = date('Y-m-d H:m:s');
    $developermodel->updateDeveloperDb($data);
    return redirect()->to('/developer/'.$this->request->getVar('slug'));
  }
}
?>
