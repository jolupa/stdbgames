<?php
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model{
  public function createUserDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('users');
    return $builder->insert($data);
  }
  public function getUserByName($name){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->where('name', $name);
    if($builder->countAllResults(false) > 0){
      return $builder->get()->getRowArray();
    } else {
      return false;
    }
  }
  public function getUserBySlug($slug){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->where('slug', $slug);
    if($builder->countAllResults(false) > 0){
      return $builder->get()->getRowArray();
    } else {
      return false;
    }
  }
  public function getAllUsers(){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->where('role !=', 1)
                  ->orderBy('created_at', 'DESC');
    return $builder->get()->getResultArray();
  }
  public function getUsersById($id){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->where('id', $id);
    return $builder->get()->getRowArray();
  }
  public function updateUserDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->where('id', $data['id']);
    return $builder->update($data);
  }
  public function userResetPassword($newpassword, $id){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->where('id', $id);
    return $builder->update(['password'=>password_hash($newpassword, PASSWORD_DEFAULT)]);
  }
}

?>
