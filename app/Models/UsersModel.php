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
}
?>
