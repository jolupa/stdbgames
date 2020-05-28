<?php
// The Model for the Users Controller
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model{
	// We log the user into his account
	public function userLog($username){
		$db = \Config\Database::connect();
		$builder = $db->table('users')
											->select('Userid AS uId,
																Name AS uName,
																Slug AS uSlug,
																Password AS uPassword,
																Role AS uRole')
											->where('Name', $username);
		return $builder->get()
											->getRowArray();
	}
	// We insert the user into his account
	public function userInsert($data){
		$db = \Config\Database::connect();
		$builder = $db->table('users');
		return $builder->insert($data);
	}
	// We get the user information
	public function getUser($slug){
		$db = \Config\Database::connect();
		$builder = $db->table('users')
									->select('Userid AS uId,
														Name AS uName,
														Slug AS uSlug,
														Mail AS uMail,
														Role AS uRole,
														Birthdate AS uBirthdate,
														Registrydate AS uRegistrydate,
														Image AS uImage')
									->where('uSlug', $slug);
		return $builder->get()
										->getRowArray();
	}
	// Model for the admin function to list the Users
	// now limited to 10
	public function getUsers(){
		$db = \Config\Database::connect();
		$builder = $db->table('users')
									->select('Userid AS uId,
														Name AS uName,
														Image AS uImage,
														Slug AS uSlug,
														Registrydate AS uRegistrydate,
														Role AS uRole')
									->where('Role !=', 1)
									->orderBy('Registrydate', 'DESC');
		return $builder->get()->getResultArray();
	}
	// Update the DB with new User information
	public function updateUser($data){
		$db = \Config\Database::connect();
		$builder = $db->table('users')
									->where('Userid', $data['Userid']);

		return $builder->update($data);
	}
	// Delete the User from DB
	public function deleteUser($userid){
		$db = \Config\Database::connect();
		$builder = $db->table('users');
		return $builder->delete(['Userid'=>$userid]);
	}
}

 ?>
