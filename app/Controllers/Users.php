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
                                                 'rules'  =>  'required|is_unique[users.Username]',
                                                 'errors' =>  ['required'   =>  'You must set a Name for your login',
                                                               'is_unique'  =>  'That Name actually exist in the Database',],
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
                            'Usermail'      =>  ['label'  => 'Mail',
                                                 'rules'  =>  'valid_email',
                                                 'errors' =>  ['valid_email'  =>  'Please, give us your correct email... Or just the trash mail.',],
                                               ],
                            'accept'        =>  ['label'  =>  'Accept',
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
    echo view('templates/header');
    if (session('role') == 1){
      $lastusers = new UsersModel();
      $data['lastusers'] = $lastusers->getLastUsers();
      echo view('users/lastusers', $data);
    }
    echo view('templates/footer');
  }
}
?>
