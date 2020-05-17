<?php
namespace App\Controllers;
use App\Models\SpecialsModel;
use CodeIgniter\Controller;

helper(['url','text']);

class Specials extends Controller{
  public function insert(){
    echo view('templates/header');
    echo view('specials/insert');
    echo view('templates/footer');
  }
  public function insertspecial(){
    $insert = new SpecialsModel();
    $data['Image'] = $this->request->getVar('Image');
    $data['Title'] = $this->request->getVar('Title');
    $data['Slug'] = strtolower(url_title($data['Title']));
    $data['About'] = $this->request->getVar('About');
    $data['Date'] = $this->request->getVar('Date');
    $insert->insertSpecial($data);
    return redirect()->to('/games');
  }
  public function edit($slug = false){
    if(session('role') === 1){
      $edit = new SpecialsModel();
      $data['specials'] = $edit->getSpecial($slug);
      echo view('templates/header');
      echo view('specials/edit', $data);
      echo view('templates/footer');
    } else {
      return redirect()->to('/games');
    }
  }
  public function update(){
    $edit = new SpecialsModel();
    $data['Specialid'] = $this->request->getVar('Specialid');
    $data['Image'] = $this->request->getVar('Image');
    $data['Title'] = $this->request->getVar('Title');
    $data['Slug'] = strtolower(url_title($this->request->getVar('Title')));
    $data['About'] = $this->request->getVar('About');
    $data['Date'] = $this->request->getVar('Date');
    $edit->updateSpecial($data);
    return redirect()->to('/games');
  }
  public function special($slug){
    $special = new SpecialsModel();
    $data['specials'] = $special->getSpecial($slug);
    echo view('templates/header', $data);
    echo view('specials/overview', $data);
    echo view('templates/footer');
  }
  public function specialhome($slug){
    $specialhome = new SpecialsModel();
    $data['specialhome'] = $specialhome->getSpecialHome($slug);
    return view('specials/homebanner', $data);
  }
  public function specialsixmonths(){
    $sixmonths = new SpecialsModel();
    $data['sixmonths'] = $sixmonths->getSixMonthsFirstGames();
    return view('specials/sixmonthsfirstgames', $data);
  }
}

?>
