<?php
  namespace App\Controllers;
  use App\Models\UsersModel;
  use CodeIgniter\Controller;

  class Users extends Controller{
    public function useraddform(){
      $adduser = new UsersModel();
    }
  }
 ?>
