<?php

namespace App\Controllers;

use \App\Models\UsersModel;
use CodeIgniter\Controller;

helper(['text']);

class Users extends Controller{
  public function signupform(){
    echo view('templates/header');
    echo view('users/registerform');
    echo view('templates/footer');
  }
  public function createuserdb(){
    $usermodel = new UsersModel();
    $val = $this->validate('userSignup');

    if(!$val){
      echo view('templates/header');
      echo view('users/registerform', ['validations' => $this->validator]);
      echo view('templates/footer');
    } else {
      $data['name'] = $this->request->getVar('name');
      $data['slug'] = strtolower(url_title($data['name']));
      $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
      $data['email'] = $this->request->getVar('email');
      $data['birth_date'] = $this->request->getVar('birth_date');
      $data['created_at'] = date('Y-m-d H:m:s');
      $data['role'] = 0;
      if($_FILES['image']['error'] !== 4){
        $newname = $data['slug'];
        $file = $this->request->getFile('image')
                              ->move(WRITEPATH.'uploads', $newname);
        $image = \Config\Services::image('imagick')
                ->withFile(WRITEPATH.'uploads/'.$newname)
                ->fit(256, 256, 'center')
                ->convert(IMAGETYPE_JPEG)
                ->save(ROOTPATH.'public/images/avatar/'.$newname.'.jpeg');
        unlink(WRITEPATH.'uploads/'.$newname);
        $data['image'] = $newname;
      }
      $usermodel->createUserDb($data);
      return redirect()->to('/login');
    }
  }
  public function loginform(){
    echo view('templates/header');
    echo view('users/loginform');
    echo view('templates/footer');
  }
  public function loguser(){
    $isValid = $this->validate('userLogin');
    $errors = [];

    if ($isValid) {
      $usersmodel = new UsersModel();
      $user       = $this->request->getVar('user');
      $password   = $this->request->getVar('password');

      if ($usersmodel->getUserByName($user)) {
        $data = $usersmodel->getUserByName($user);

        if (password_verify($password, $data['password'])) {
          $session = \Config\Services::session();
          $session->set([
              'username' => $data['name'],
              'slug'     => $data['slug'],
              'user_id'  => $data['id'],
              'role'     => $data['role'],
              'logged'   => true,
          ]);
          return redirect()->to('/games/');
        } else {
          $errors[] = "Your username or password doesn't match. Try again";
        }
      } else {
        $errors[] = "Your Username is not in the DB!";
      }
    }

    echo view('templates/header');
    echo view('users/loginform', [
        'user'        => $this->request->getVar('user'),
        'errors'      => $errors
    ]);
    echo view('templates/footer');
  }
  public function profile($slug){
    if(session('logged') == TRUE && $slug == session('slug')){
      $usersmodel = new UsersModel();
      $data['user'] = $usersmodel->getUserBySlug($slug);
      echo view('templates/header');
      echo view('users/profile', $data);
      echo view('templates/footer');
    } else {
      $data['error'] = "You are not allowed to see this page. Go to the <strong>Homepage</strong>";
      echo view('templates/header');
      echo view('users/profile', $data);
      echo view('templates/footer');
    }
  }
  public function listusers(){
    if (session('logged') != true && session('role') != 1) {
      return '';
    } else {
      $usersmodel = new UsersModel();
      $data['userlist'] = $usersmodel->getAllUsers();
      return view('users/listusers', $data);
    }
  }
  public function edituser($id){
    $usersmodel = new UsersModel();
    $data['user'] = $usersmodel->getUsersById($id);
    echo view('templates/header');
    echo view('users/editform', $data);
    echo view('templates/footer');
  }
  public function updateuserdb(){
    $usersmodel = new UsersModel();
    $data['id'] = $this->request->getVar('id');
    $data['name'] = $this->request->getVar('name');
    $data['birth_date'] = $this->request->getVar('birth_date');
    $data['email'] = $this->request->getVar('email');
    $data['slug'] = $this->request->getVar('slug');
    if($_FILES['image']['error'] !== 4){
      $oldname = $this->request->getVar('oldimage');
      if(file_exists(ROOTPATH.'public/images/avatar/'.$oldname.'jpeg')){
        unlink(ROOTPATH.'public/images/avatar/'.$oldname.'.jpeg');
      }
      $newname = $data['slug'];
      $file = $this->request->getFile('image')
                            ->move(WRITEPATH.'uploads/', $newname);
      $image = \Config\Services::image('imagick')
                ->withFile(WRITEPATH.'uploads/'.$newname)
                ->fit(256, 256, 'center')
                ->convert(IMAGETYPE_JPEG)
                ->save(ROOTPATH.'public/images/avatar/'.$newname.'.jpeg');
      unlink(WRITEPATH.'uploads/'.$newname);
      $data['image'] = $newname;
    } else {
      $data['image'] = $this->request->getVar('oldimage');
    }
    $usersmodel->updateUserDb($data);
    return redirect()->to('/user/profile/'.$data['slug']);
  }
  public function logoutuser(){
    $session = \Config\Services::session();
    $session->destroy();
    return redirect()->to('/games');
  }
  public function resetpasswordbymailform(){
    echo view('templates/header');
    echo view('users/resetpasswordbymail');
    echo view('templates/footer');
  }
  public function resetpasswordbymail(){
    $usermodel = new UsersModel();
    $mail = $this->request->getVar('email');
    $slug = strtolower(url_title($this->request->getVar('name')));
    if($usermodel->getUserBySlug($slug) == true){
      $data = $usermodel->getUserBySlug($slug);
      $communications = new CommunicationsModel();
      $mconfig = $communications->getMailConfig();
      if($mail == $data['email']){
        $newpassword = random_string('alnum', 16);
        $id = $data['id'];
        $usermodel->userResetPassword($newpassword, $id);
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
        $email->setTo($data['email']);
        $email->setSubject('Password Reset for Stadia GamesDB!');
        $email->setMessage('Here\'s your automated generated password '.$newpassword.' Please change it when you log back to the web!');
        $email->send();
        $data['success'] = "We send you an email with the new password, please change it when possible.";
        echo view('templates/header');
        echo view('users/rememberpassword', $data);
        echo view('templates/footer');
      } else {
        $data['error'] = "We can't find the email address you give us on the Database, is it correct?";
        echo view('templates/header');
        echo view('users/rememberpassword', $data);
        echo view('templates/footer');
      }
    } else {
      $data['error'] = "We can't find your username on the Database, is it correct?";
      echo view('templates/header');
      echo view('users/rememberpassword', $data);
      echo view('templates/footer');
    }
  }
  public function changepassword(){
    $session = \Config\Services::session();
    $usermodel = new UsersModel();
    $id = $this->request->getVar('id');
    $oldpassword = $this->request->getVar('oldpassword');
    $newpassword = $this->request->getVar('newpassword');
    $checkpassword = $this->request->getVar('checkpassword');
    if($newpassword == $checkpassword){
      if($usermodel->getUserById($id) == true){
        $data = $usermodel->getUserById($id);
        if(password_verify($oldpassword, $data['password']) == true){
          $usermodel->userResetPassword($newpassword, $id);
          return redirect()->to('/logout');
        } else {
          $errorpass = "Can't find the password on DB! Try again!";
          $session->setFlashdata(['errorpass'=>$errorpass]);
          return redirect()->back();
        }
      } else {
        $errorpass = "It seems that we can't find the user... Weird, try again!";
        $session->setFlashdata(['errorpass'=>$errorpass]);
        return redirect()->back();
      }
    } else {
      $errorpass = "The new password don't match with the check. Try again!";
      $session->setFlashdata(['errorpass'=>$errorpass]);
      return redirect()->back();
    }
  }
}
?>
