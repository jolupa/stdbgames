<?php namespace App\Models;
  use Codeigniter\Model;

  class UsersModel extends Model{
    public function addUser(){
      $db = \Config\Database::connect();
      $builder = $db->table('users');
      return $builder->insert($data);
    }
  }
 ?>
