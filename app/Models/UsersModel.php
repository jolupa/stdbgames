<?php namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model{
  public function insertUser($data){
    $db = \Config\Database::connect();
    $builder = $db->table('users');
    return $builder->insert($data);
  }

  public function logUser($form){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->select('Userid,
                            Username,
                            Userpassword,
                            Userrole')
                  ->where('Username', $form['Username']);
    return $builder->get()
                   ->getRowArray();
  }

  public function getLastUsers(){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->select('Userid,
                            Username,
                            Usermail,
                            Userbirthdate,
                            Userdateregistry,
                            Userrole')
                  ->orderBy('Userid', 'DESC');
    return $builder->get(10)
                   ->getResultArray();
  }

  public function getUser($user){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->where('Username', $user);
    return $builder->get()
                   ->getRowArray();
  }

  public function updateUser($data){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->where('Userid', $data['Userid']);
    return $builder->update($data);
  }

  public function deleteUser($id){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->where('Userid', $id);
    return $builder->delete();
  }
}
?>
