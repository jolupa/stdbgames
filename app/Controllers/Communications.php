<?php
namespace App\Controllers;
use App\Models\CommunicationsModel;
use CodeIgniter\Controller;

class Communications extends Controller{
  public function wronggame(){
    if($this->request->getVar('wrong') == null){
      $session = \Config\Services::session();
      $error = "If you want to tell us something... You have to put something on the form!";
      $session->setFlashdata(['error'=>$error]);
      return redirect()->to('/game/'.$this->request->getVar('slug').'/true');
    } else {
      $comm = new CommunicationsModel();
      $mconfig = $comm->getMailConfig();
      $email = \Config\Services::email();
      $config['protocol'] = 'smtp';
      $config['SMTPHost'] = 'smtp-relay.gmail.com';
      $config['SMTPUser'] = 'hello@stdb.games';
      $config['SMTPPass'] = $mconfig['pass'];
      $config['SMTPCrypto'] = 'tls';
      $config['SMTPPort'] = 587;
      $config['wordWrap'] = true;
      $config['wrapChars'] = 80;
      $config['mailType'] = 'text';
      $config['priority'] = 3;
      $email->initialize($config);
      $email->setFrom('hello@stdb.games', 'Stadia GamesDB!');
      $email->setTo('hello@stdb.games');
      $email->setSubject('Someone has find something wrong with '.$this->request->getVar('name'));
      $email->setMessage($this->request->getVar('wrong'));
      $email->send();
      return redirect()->to('/game/'.$this->request->getVar('slug'));
    }
  }
}

?>
