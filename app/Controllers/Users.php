<?php
// The Controller for all the functions related to Users.
namespace App\Controllers;
use App\Models\UsersModel;
use CodeIgniter\Controller;

helper(['url','text','cookie']);

class Users extends Controller{
	// Form to log the user in the system
	public function login(){
		echo view('templates/header');
		echo view('users/login');
		echo view('templates/footer');
	}
	// Function to log the user in her account
	public function loguser(){
		$user = new UsersModel();
		$username = $this->request->getVar('Name');
		$password = $this->request->getVar('Password');
		$data = $user->userLog($username);
		if (password_verify($password, $data['uPassword']) == TRUE){
			$session = \Config\Services::session();
			$session->set(['username'=>$data['uName'], 'slug'=>$data['uSlug'], 'id'=>$data['uId'], 'role'=>$data['uRole'], 'is_logged'=>TRUE]);

			return redirect()->to('/users/profile/'.session('username'));
		} else {
			$data['error'] = "The username or the password not match... Try again...";
			echo view('templates/header');
			echo view('users/login', $data);
			echo view('templates/footer');
		}
	}
	// Form to register the user
	public function register(){
		echo view('templates/header');
		echo view('users/register');
		echo view('templates/footer');
	}
	// We register the user in the DB if the essential fields are completed
	// If all goes well we sen the user to the register form
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
			if ($_FILES['Image']['error'] == 4){
				$insert->userInsert($data);
				return redirect()->to('/users/login');
			} else {
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
				unlink(WRITEPATH.'uploads/'.$newname);
				$insert->userInsert($data);
				return redirect()->to('/users/login');
			}
		}
	}
	// The page with all the option for the user
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
	// Function only for admins where all the new users registered
	// is presenten in a list
	public function listusers(){
		$listusers = new UsersModel();
		$data['userlist'] = $listusers->getUsers();

		return view('users/listusers', $data);
	}
	// Function for the user to edit his profile we check if is
	// registered and if the page is his profile, then  we put
	// the form to edit his data
	public function edit($slug){
		$user = new UsersModel();
		$data['user'] = $user->getUser($slug);

		echo view('templates/header');
		echo view('users/edit', $data);
		echo view('templates/footer');
	}
	// Function to update in DB the user data
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
		if ($_FILES['Image']['error'] == 4){
			$user->updateUser($data);
			return redirect()->to('/users/profile/'.$data['Slug']);
		} else {
			if($this->request->getVar('oldimage') != NULL){
				unlink(ROOTPATH.'public/images/avatar/'.$this->request->getVar('oldimage').'.jpeg');
			}
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
			unlink(WRITEPATH.'uploads/'.$newname);
			$user->updateUser($data);
			return redirect()->to('/users/profile/'.$data['Slug']);
		}
	}
	// Function to logout the user
	public function logout(){
		$session = \Config\Services::session();
		$session->destroy();

		return redirect()->to('/games');
	}
	// Function to delete the user if he wants
	public function deleteuser($userid, $image){
		$delete = new UsersModel();
		$delete->deleteUser($userid);
		unlink(ROOTPATH.'public/images/avatar/'.$image.'.jpeg');

		return redirect()->to('/libraries/deletelibraryuser/'.$userid);
	}
	// Change password
	public function changepass(){
		$user = new UsersModel();
		$oldpassword = $this->request->getVar('oldpassword');
		$data = $user->userLog(session('username'));
		if(password_verify($oldpassword, $data['uPassword']) === TRUE){
			if($this->request->getVar('newpassword') === $this->request->getVar('checkpassword')){
				$user->changePassword(session('id'), password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT));
				return redirect()->to('/users/logout');
			} else {
				return redirect()->to('/users/edit'.session('username'));
			}
		} else {
			return redirect()->to('/users/edit'.session('username'));
		}
	}
}

?>
