<?php
namespace App\Controllers;
use App\Models\ConnectModel;
use CodeIgniter\Controller;
helper(['text']);

class Connect extends Controller{
  public function main(){
    $connectmodel = new ConnectModel();
    $data['presented'] = $connectmodel->getGamesPresented();
    echo view('templates/header');
    echo view('connect/main', $data);
    echo view('templates/footer');
  }
}

?>
