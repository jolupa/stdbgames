<?php namespace App\Controllers;
use App\Models\UsersModel;
use CodeIgniter\Controller;

helper(['cookie', 'url']);

class Users extends Controller{
  public function signuser(){
    echo view('templates/header');
    echo view('users/signin');
    echo view('templates/footer');
  }

  public function insertuser(){
    $val = $this->validate([
                            'Name'      =>  ['label'  =>  'Name',
                                                 'rules'  =>  'required|alpha_numeric|is_unique[users.Username]',
                                                 'errors' =>  ['required'       =>  'You must set a Name for your login',
                                                               'alpha_numeric'  =>  'Only letters and numbers in the Username',
                                                               'is_unique'      =>  'That Name actually exist in the Database',],
                                                ],
                            'Password'  =>  ['label'  =>  'Password',
                                                                'rules'  =>  'required|min_length[6]|max_length[20]',
                                                                'errors' =>  ['required'   => 'You must set a Password for the account',
                                                               'min_length' =>  'The minimum characters for the Password is 6 characters',
                                                               'max_length' =>  'The maximum characters for the Password is 20 characters',],
                                                ],
                            'Birthdate' =>  ['label'  =>  'Birthdate',
                                                              'rules'  =>  'required|valid_date[Y-m-d]',
                                                              'errors' =>  ['required'   =>  'You have to set your birthdate',
                                                               'valid_date' =>  'The valid format for the date is YYY-MM-DD',],
                                                ],
                            'Mail'          =>  ['label'  => 'Mail',
                                                              'rules'  =>  'valid_email',
                                                              'errors' =>  ['valid_email'  =>  'Please, give us your correct email... Or just the trash mail.',],
                                               ],
                            'accept'                 => ['label'  =>  'Accept',
                                                                'rules'  =>  'required',
                                                                'errors' =>  ['required' =>  'You have to accept that we include this data in the database.',],
                                                ],
                          ]);
    $insuser = new UsersModel();
    if (!$val){
      echo view('templates/header');
      echo view('users/signin', ['validations'=>$this->validator]);
      echo view('templates/footer');
    } else {
      $data['Name'] = $this->request->getVar('Name');
      $data['Password'] = password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT);
      $data['Birthdate'] = $this->request->getVar('Birthdate');
      $data['Mail'] = $this->request->getVar('Mail');
      $data['Registrydate'] = date('Y-m-d');
      if ($this->request->getVar('Role') != NULL){
        $data['Role'] = $this->request->getVar('Role');
      } else {
        $data['Role'] = 0;
      }
      if ($this->request->getFile('Image') != NULL)
      {
        if ( is_dir (ROOTPATH.'/public/images/avatar') == FALSE)
        {
          mkdir(ROOTPATH.'/public/images/avatar', 0777, true);
        }
        $data['Image'] = strtolower(url_title($this->request->getVar('Name')));
        $newname = url_title($this->request->getVar('Name'));
        $file = $this->request->getFile('Image')
                             ->move(WRITEPATH.'uploads/', $newname);
        $imagethumb = \Config\Services::image()
                     ->withFile(WRITEPATH.'uploads/'.$newname)
                     ->fit(256, 256, 'center')
                     ->convert(IMAGETYPE_JPEG)
                     ->save(ROOTPATH.'public/images/avatar/'.$newname);
        unlink(WRITEPATH.'uploads/'.$newname);
      }
      $insuser->insertUser($data);

      return redirect()->to('/users/loguser');
    }
  }
  public function loguser(){
    echo view('templates/header');
    echo view('users/login');
    echo view('templates/footer');
  }
  public function login(){
    $log = new UsersModel();
    $form['Name'] = $this->request->getVar('Name');
    $form['Password'] = $this->request->getVar('Password');
    $data = $log->logUser($form);
    if (password_verify($form['Password'], $data['Password']) == TRUE){
      $session = \Config\Services::session();
      $session->set(['username'=>$form['Name'],'id'=>$data['Userid'],'role'=>$data['Role'],'is_logged'=>TRUE]);
      return redirect()->to('/users/landing/'.$form['Name']);
    } else {
      $data['error'] = "Sure you put the correct User and Password";
      echo view('templates/header');
      echo view('users/login', $data);
      echo view('templates/footer');
    }
  }
  public function logout(){
    $session = \Config\Services::session();
    $session->destroy();
    return redirect()->to('/home');
  }
  public function landing($user){
    $getuser = new UsersModel();
    $voted = new UsersModel();
    $library = new UsersModel();
    $data['user'] = $getuser->getUser(session('username'));
    $userid = session('id');
    $data['voted'] = $voted->getGamesVoted($userid);
    $data['library'] = $library->getGamesLibrary($userid);

    echo view('templates/header');
    echo view('users/landing', $data);
    echo view('users/votes', $data);
    echo view('users/library', $data);
    if (session('role') == 1){
      $lastusers = new UsersModel();
      $data['lastusers'] = $lastusers->getLastUsers();
      echo view('users/lastusers', $data);
    }
    echo view('templates/footer');
  }

  public function edit($user){
    if (session('is_logged') == TRUE){
      $getuser = new UsersModel();
      $data['getuser'] = $getuser->getUser($user);

      echo view('templates/header');
      echo view('users/edit', $data);
      echo view('templates/footer');
    } else {
      return redirect()->to('/home');
    }
  }

  public function updateuser(){
    if (session('role') == 1 || session('is_logged' == TRUE)){
      $update = new UsersModel();
      $data['Name'] = $this->request->getVar('Name');
      $data['Role'] = $this->request->getVar('Role');
      $data['Birthdate'] = $this->request->getVar('Birthdate');
      $data['Mail'] = $this->request->getVar('Mail');
      $data['Userid'] = $this->request->getVar('Userid');
      if ($this->request->getVar('Image') != NULL)
      {
        $data['Image'] = $this->request->getVar('Image');
      }
      if ($this->request->getFile('Image') != NULL)
      {
        if ( is_dir (ROOTPATH.'/public/images/avatar') == FALSE)
        {
          mkdir(ROOTPATH.'/public/images/avatar', 0777, true);
        }
        $data['Image'] = $this->request->getVar('Name');
        $newname = $this->request->getVar('Name');
        $file = $this->request->getFile('Image')
                                             ->move(WRITEPATH.'uploads/', $newname);
        $imagethumb = \Config\Services::image()
                     ->withFile(WRITEPATH.'uploads/'.$newname)
                     ->fit(256, 256, 'center')
                     ->save(ROOTPATH.'public/images/avatar/'.$newname);
        unlink(WRITEPATH.'uploads/'.$newname);
      }
      $update->updateUser($data);
      return redirect()->to('/users/landing/'.session('username'));
    } else {
      return redirect()->to('/home');
    }
  }

  public function deleteUser($id){
    $delete = new UsersModel();
    $delete->deleteUser($id);
    if (session('role') == 1){
      return redirect()->to('/users/landing/'.session('username'));
    } else {
      return redirect()->to('/home');
    }
  }

  public function uservote($vote, $gameid, $userid){
    $uvote = new UsersModel();
    if ($vote == 'upvote'){
      $data['score'] = 100;
    } elseif ($vote == 'well'){
      $data['score'] = 50;
    }
    if ($vote == 'downvote') {
      $data['score'] = 0;
    }
    $data['Gameid'] = $gameid;
    $data['Userid'] = $userid;
    $uvote->castVote($data);

    return redirect()->to(session('current_url'));
  }

  public function userinteraction($gameid, $userid){
    $wish = new UsersModel();
    $purchase = new UsersModel();
    $vote = new UsersModel();
    $data['wish'] = $wish->checkUserWish($gameid, $userid);
    $data['purchase'] = $purchase->checkUserPurchase($gameid, $userid);
    $data['vote'] = $vote->checkUserVote($gameid, $userid);

    return view('users/interaction', $data);
  }

  public function addlibrary($gameid, $userid){
    $checkwish = new UsersModel();
    if ($checkwish->checkUserWish($gameid, $userid) == 0){
      $add = new UsersModel();
      $data['Gameid'] = $gameid;
      $data['Userid'] = $userid;
      $add->addUserLibrary($data);

      return redirect()->to(session('current_url'));
    } else {
      $delwish = new UsersModel();
      $delwish->deleteUserWish($gameid, $userid);
      $add = new UsersModel();
      $data['Gameid'] = $gameid;
      $data['Userid'] = $userid;
      $add->addUserLibrary($data);

      return redirect()->to(session('current_url'));
    }
  }

  public function addwish($gameid, $userid){
    $add = new UsersModel();
    $data['Gameid'] = $gameid;
    $data['Userid'] = $userid;
    $add->addUserWish($data);

    return redirect()->to(session('current_url'));
  }
}
?>
