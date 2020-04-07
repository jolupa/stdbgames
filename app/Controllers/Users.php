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
                            'Username'      =>  ['label'  =>  'Name',
                                                 'rules'  =>  'required|alpha_numeric|is_unique[users.Username]',
                                                 'errors' =>  ['required'       =>  'You must set a Name for your login',
                                                               'alpha_numeric'  =>  'Only letters and numbers in the Username',
                                                               'is_unique'      =>  'That Name actually exist in the Database',],
                                                ],
                            'Userpassword'  =>  ['label'  =>  'Password',
                                                                'rules'  =>  'required|min_length[6]|max_length[20]',
                                                                'errors' =>  ['required'   => 'You must set a Password for the account',
                                                               'min_length' =>  'The minimum characters for the Password is 6 characters',
                                                               'max_length' =>  'The maximum characters for the Password is 20 characters',],
                                                ],
                            'Userbirthdate' =>  ['label'  =>  'Birthdate',
                                                              'rules'  =>  'required|valid_date[Y-m-d]',
                                                              'errors' =>  ['required'   =>  'You have to set your birthdate',
                                                               'valid_date' =>  'The valid format for the date is YYY-MM-DD',],
                                                ],
                            'Usermail'          =>  ['label'  => 'Mail',
                                                              'rules'  =>  'valid_email',
                                                              'errors' =>  ['valid_email'  =>  'Please, give us your correct email... Or just the trash mail.',],
                                               ],
                            'Userimage'        => ['label'  =>  'Avatar',
                                                               'rules'  =>  'required',
                                                              'errors'  =>  ['required'  =>  'Ey! Upload an Avatar so you can be really... Really cool!',],
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
      $data['Username'] = $this->request->getVar('Username');
      $data['Userpassword'] = password_hash($this->request->getVar('Userpassword'), PASSWORD_DEFAULT);
      $data['Userbirthdate'] = $this->request->getVar('Userbirthdate');
      $data['Usermail'] = $this->request->getVar('Usermail');
      $data['Userdateregistry'] = date('Y-m-d');
      if ($this->request->getVar('Userrole') != NULL){
        $data['Userrole'] = $this->request->getVar('Userrole');
      } else {
        $data['Userrole'] = 0;
      }
      if ($this->request->getFile('Userimage') != NULL)
      {
        if ( is_dir (ROOTPATH.'/public/images/avatar') == FALSE)
        {
          mkdir(ROOTPATH.'/public/images/avatar', 0777, true);
        }
        $data['Userimage'] = strtolower(url_title($this->request->getVar('Username')));
        $newname = url_title($this->request->getVar('Username'));
        $file = $this->request->getFile('Userimage')
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
    $form['Username'] = $this->request->getVar('Username');
    $form['Password'] = $this->request->getVar('Password');
    $data = $log->logUser($form);
    if (password_verify($form['Password'], $data['Userpassword']) == TRUE){
      $session = \Config\Services::session();
      $session->set(['username'=>$form['Username'],'id'=>$data['Userid'],'role'=>$data['Userrole'],'is_logged'=>TRUE]);
      return redirect()->to('/users/landing/'.$form['Username']);
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
    $data['user'] = $getuser->getUser(session('username'));
    $user = session('id');
    $data['voted'] = $voted->getGamesVoted($user);

    echo view('templates/header');
    echo view('users/landing', $data);
    echo view('users/votes', $data);
    if (session('role') == 1){
      $lastusers = new UsersModel();
      $data['lastusers'] = $lastusers->getLastUsers();
      echo view('users/lastusers', $data);
    }
    echo view('templates/footer');
  }

  public function edit($user){
    if (session('role') == 1){
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
    if (session('role') == 1){
      $update = new UsersModel();
      $data['Username'] = $this->request->getVar('Username');
      $data['Userrole'] = $this->request->getVar('Userrole');
      $data['Userbirthdate'] = $this->request->getVar('Userbirthdate');
      $data['Usermail'] = $this->request->getVar('Usermail');
      $data['Userid'] = $this->request->getVar('Userid');
      if ($this->request->getVar('Userimage') != NULL)
      {
        $data['Userimage'] = $this->request->getVar('Userimage');
      }
      if ($this->request->getFile('Userimage') != NULL)
      {
        if ( is_dir (ROOTPATH.'/public/images/avatar') == FALSE)
        {
          mkdir(ROOTPATH.'/public/images/avatar', 0777, true);
        }
        $data['Userimage'] = $this->request->getVar('Username');
        $newname = $this->request->getVar('Username');
        $file = $this->request->getFile('Userimage')
                                             ->move(WRITEPATH.'uploads/', $newname);
        $imagethumb = \Config\Services::image()
                     ->withFile(WRITEPATH.'uploads/'.$newname)
                     ->fit(256, 256, 'center')
                     ->save(ROOTPATH.'public/images/avatar/'.$newname);
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

  public function uservote($vote, $item, $session){
    $uvote = new UsersModel();
    if ($vote == 'upvote'){
      $data['score'] = 100;
    }
    if ($vote == 'downvote') {
      $data['score'] = -100;
    }
    $data['Gameid'] = $item;
    $data['Userid'] = $session;
    if ($uvote->checkvote($data)){
      $session = \Config\Services::session();
      $session->setFlashdata('voted', 1);
      return redirect()->to(session('_ci_previous_url'));
    } else {
      $uvote->castVote($data);
      return redirect()->to(session('_ci_previous_url'));
    }
  }
}
?>
