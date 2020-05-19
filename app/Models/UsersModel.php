<?php
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model{
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
	public function userInsert($data){
		$db = \Config\Database::connect();
		$builder = $db->table('users');
		return $builder->insert($data);
	}
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
  public function getUserLibrary($userid){
    $db = \Config\Database::connect();
    $builder = $db->table('libraries')
                  ->select('games.Name AS gName,
                            games.Image AS gImage,
                            games.Slug AS gSlug')
                  ->join('games', 'games.Gameid = libraries.Gameid')
                  ->where('libraries.Userid', $userid);
    return $builder->get()
                    ->getResultArray();
  }
	public function getUserVotes($userid){
		$db = \Config\Database::connect();
		$builder = $db->table('votes')
									->select('games.Name AS gName,
														games.Image AS gImage,
														games.Slug AS gSlug')
									->join('games', 'games.Gameid = votes.Gameid')
									->where('votes', $userid);
		return $builder->get()
										->getResultArray();
	}
	public function getUsers(){
		$db = \Config\Database::connect();
		$builder = $db->table('users')
									->select('Userid AS uId,
														Name AS uName,
														Slug AS uSlug,
														Registrydate AS uRegistrydate,
														Role AS uRole')
									->where('Role !=', 1);
		return $builder->get(10)
										->getResultArray();
	}
	public function updateUser($data){
		$db = \Config\Database::connect();
		$builder = $db->table('users')
									->where('Userid', $data['Userid']);

		return $builder->update($data);
	}
	public function deleteUser($userid){
		$db = \Config\Database::connect();
		$builder = $db->table('users');
		return $builder->delete(['Userid'=>$userid]);
	}
}

 ?>
