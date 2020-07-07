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
    $usersmodel = new UsersModel();
    $val = $this->validate([
      'name' => [
        'label' => 'Name',
        'rules' => 'required|is_unique[users.name]',
        'errors'=>  ['required' => 'You need a username', 'is_unique' => 'Your username exists'],
      ],
      'password' => [
        'label' => 'Password',
        'rules' => 'required|min_length[6]|max_length[20]',
        'errors'=> ['required' => 'Set a Password', 'min_length' => 'A minimum of six(6) characters', 'max_length' => 'A maximum of twenty(20) characters'],
      ],
      'accept' => [
        'label' => 'Accept',
        'rules' => 'required',
        'errors'=> ['required' => 'You have to accept that we are not going to sell your data to anyone.',]
      ],
    ]);
    if(!$val){
      echo view('templates/header');
      echo view('users/registerform', ['validations' => $this->validator]);
      echo view('templates/footer');
    } else {
      $data['name'] = $this->request->getVar('name');
      $data['slug'] = strtolower(url_title($data['name']));
      $data['password'] = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
      $data['email'] = $this->request->getVar('email');
      $data['birthdate'] = $this->request->getVar('birthdate');
      $data['created_at'] = strtotime('now');
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
      $gamemodel->createUserDb($data);
      return redirect()->to('/login');
    }
  }
  public function loginform(){
    echo view('templates/header');
    echo view('users/loginform');
    echo view('templates/footer');
  }
  public function loguser(){
    $usersmodel = new UsersModel();
    $user = $this->request->getVar('user');
    $password = $this->request->getVar('password');
    if($usersmodel->getUserByName($user) == true){
      $data = $usersmodel->getUserByName($user);
      if(password_verify($password, $data['password']) == true){
        $session = \Config\Services::session();
        $session->set([
          'username' => $data['name'],
          'slug' => $data['slug'],
          'user_id' => $data['id'],
          'role' => $data['role'],
          'logged' => true,
        ]);
        return redirect()->to('/games/');
      } else {
        $data['error'] = "Your username or password doesn't match. Try again";
        echo view('templates/header');
        echo view('users/loginform', $data);
        echo view('templates/footer');
      }
    } else {
      $data['error'] = "Your Username is not in the DB!";
      echo view('templates/header');
      echo view('users/loginform', $data);
      echo view('templates/footer');
    }
  }
  public function profile($slug){
    if(session('logged') == TRUE && $slug == session('slug')){
      $usersmodel = new UsersModel();
      $data['user'] = $usersmodel->getUserByName($slug);
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
    if(session('logged') == true && session('role') == 1){
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
      unlink(ROOTPATH.'public/images/avatar/'.$oldname.'.jpeg');
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
}
?>
