<?php
namespace App\Controllers;
use App\Models\BundlesModel;
use CodeIgniter\Controller;

helper(['url','text','cookie']);

class Bundles extends Controller{
  public function bundlecontent($gameid){
    $content = new BundlesModel();
    $data['content'] = $content->getBundleContent($gameid);
  }
  public function insert(){
    echo view('templates/header');
    echo view('bundles/insert');
    echo view('templates/footer');
  }
  public function insertbundle(){
    $insertbundle = new BundlesModel();
    $data['Name'] = $this->request->getVar('Name');
    $data['Slug'] = strtolow(url_title($this->request->getVar('Name')));
    $data['Gameid'] = $this->request->getVar('Gameid');
    $data['Developerid'] = $this->request->getVar('Developerid');
    $data['Release'] = $this->request->getVar('Release');
    $insertbundle->insertBundle($data);

    return redirect()->to('/bundles/overview/'.$data['Slug']);
  }
}

?>