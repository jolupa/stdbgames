<?php
namespace App\Controllers;
use App\Models\UsersModel;
use CodeIgniter\Controller;

helper(['url','text','cookie']);

class Users extends Controller{
	public function login(){
		echo view('templates/header');
		echo view('users/login');
		echo view('templates/footer');
	}
	public function loguser(){
		$user = new UsersModel();
		$username = $this->request->getVar('Name');
		$password = $this->request->getVar('Password');
		$data = $user->userLog($username);
		if (password_verify($password, $data['uPassword']) == TRUE){
			$session = \Config\Services::session();
			$session->set(['username'=>$data['uSlug'], 'id'=>$data['uId'], 'role'=>$data['uRole'], 'is_logged'=>TRUE]);

			return redirect()->to('/users/profile/'.session('username'));
		} else {
			$data['error'] = "The username or the password not match... Try again...";
			echo view('templates/header');
			echo view('users/login', $data);
			echo view('templates/footer');
		}
	}
	public function register(){
		echo view('templates/header');
		echo view('users/register');
		echo view('templates/footer');
	}
	public function insertuser(){
    $val = $this->validate([
                            'Name' => [ 'label' => 'Name',
                                        'rules' => 'required|alpha_numeric|is_unique[users.Name]',
                                        'errors' => [ 'required' => 'You dont want an username... Sorry you have to take one!',
                                                      'alpha_numeric' => 'You can only put letters and numbers in your name, nothing too much fancy',
                                                      'is_unique' => 'Sorry... We dont have Founders here and your username is taken', ]
                            ],
                            'Password' => [ 'label' => 'Password',
                                            'rules' => 'required|min_length[6]|max_length[20]',
                                            'errors' => [ 'required' => 'Set a password... Is more safety',
                                                          'min_length' => 'A minimum of six characters... Easy...',
                                                          'max_length' => 'Maximum twenty characters... Not too easy', ]
                            ],
                            'Birthdate' => [ 'label' => 'Birthdate',
                                              'rules' => 'required|valid_date[Y-m-d]',
                                              'errors' => [ 'required' => 'Your birthdate... Imagine we can send you something... Who knows!',
                                                            'valid_date' => 'The correct date format is YYYY-MM-DD... We are a little weirdos', ]
                            ],
                            'Mail' => [ 'label' => 'Mail',
                                        'rules' => 'valid_email',
                                        'errors' => [ 'valid_email' => 'Just your email... To Stay informed...',]
                            ],
                            'accept' => [ 'label' => 'Accept',
                                          'rules' => 'required',
                                          'errors' => [ 'required' => 'You have to know that the data you are entering is only for the database... Nothing More! Yeah! Clear!',]
                            ],
    ],);
		if (!$val){
			echo view('templates/header');
			echo view('users/register', ['validations'=>$this->validator]);
			echo view('templates/footer');
		} else {
			$insert = new UsersModel();
			$data['Name'] = $this->request->getVar('Name');
			$data['Slug'] = strtolower(url_title($this->request->getVar('Name')));
			$data['Password'] = password_hash($this->request->getVar('Password'), PASSWORD_DEFAULT);
			$data['Birthdate'] = $this->request->getVar('Birthdate');
			$data['Mail'] = $this->request->getVar('Mail');
			$data['Registrydate'] = date('Y-m-d');
			if ($this->request->getVar('Stadiauser') != NULL){
				$data['Stadiauser'] = $this->request->getVar('Stadiauser');
			}
			$data['Role'] = 0;
			if ($this->request->getFile('Image') != NULL){
				if (is_dir(ROOTPATH.'public/images/avatar') == FALSE){
					mkdir (ROOTPATH.'public/images/avatar', 0777, true);
				}
				$data['Image'] = strtolower(url_title($this->request->getVar('Name')));
				$newname = strtolower(url_title($this->request->getVar('Name')));
				$file = $this->request->getFile('Image')
																	->move(WRITEPATH.'uploads', $newname);
				$image = \Config\Services::image('imagick')
									->withFile(WRITEPATH.'uploads/'.$newname)
									->fit(256, 256, 'center')
									->convert(IMAGETYPE_JPEG)
									->save(ROOTPATH.'public/images/avatar/'.$newname.'.jpeg');
				unlink(WRITEPATH.'uploads/'.$newname.'.jpeg');
			}
			$insert->userInsert($data);
			return redirect()->to('/users/login');
		}
	}
  public function profile(){
    $getuser = new UsersModel();
		$slug = session('username');
    $data['user'] = $getuser->getUser($slug);

		if (session('is_logged') == TRUE && session('username') == $slug){
	    echo view('templates/header');
	    echo view('users/landing', $data);
	    echo view('templates/footer');
		} else {
			return redirect()->to('/games');
		}
  }
  public function library($userid){
    $library = new UsersModel();
    $data['library'] = $library->getUserLibrary($userid);

    return view('users/library', $data);
  }
	public function vote($userid){
		$votes = new UsersModel();
		$data['votes'] = $votes->getUserVotes($userid);

		return view('users/votes', $data);
	}
	public function listusers(){
		$listusers = new UsersModel();
		$data['userlist'] = $listusers->getUsers();

		return view('users/listusers', $data);
	}
	public function edit($slug){
		$user = new UsersModel();
		$data['user'] = $user->getUser($slug);

		echo view('templates/header');
		echo view('users/edit', $data);
		echo view('templates/footer');
	}
	public function updateuser(){
		$user = new UsersModel();
		$data['Name'] = $this->request->getVar('Name');
		$data['Userid'] = $this->request->getVar('Userid');
		$data['Slug'] = $this->request->getVar('Slug');
		if ($this->request->getVar('Image') != NULL){
			$data['Image'] = $this->request->getVar('Image');
		}
		$data['Mail'] = $this->request->getVar('Mail');
		$data['Registrydate'] = $this->request->getVar('Registrydate');
		$data['Birthdate'] = $this->request->getVar('Birthdate');
		if ($this->request->getFile('Image') != NULL){
			if (is_dir(ROOTPATH.'public/images/avatar') == FALSE){
				mkdir (ROOTPATH.'public/images/avatar', 0777, true);
			}
			$data['Image'] = strtolower(url_title($this->request->getVar('Name')));
			$newname = strtolower(url_title($this->request->getVar('Name')));
			$file = $this->request->getFile('Image')
																->move(WRITEPATH.'uploads', $newname);
			$image = \Config\Services::image()
								->withFile(WRITEPATH.'uploads/'.$newname)
								->fit(256, 256, 'center')
								->convert(IMAGETYPE_JPEG)
								->save(ROOTPATH.'public/images/avatar/'.$newname.'.jpeg');
			unlink(WRITEPATH.'uploads/'.$newname.'.jpeg');
		}
		$user->updateUser($data);

		return redirect()->to('/users/profile/'.$data['Slug']);
	}
	public function logout(){
		$session = \Config\Services::session();
		$session->destroy();

		return redirect()->to('/games');
	}
}

 ?>
