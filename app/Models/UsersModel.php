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

  public function castVote($data){
    $db = \Config\Database::connect();
    $builder = $db->table('votes');
    return $builder->insert($data);
  }

  public function checkvote($data){
    $db = \Config\Database::connect();
    $builder = $db->table('votes')
                  ->where('Userid', $data['Userid'])
                  ->where('Gameid', $data['Gameid']);
    return $builder->get()
                   ->getRowArray();
  }

  public function getGamesVoted($user){
    $db = \Config\Database::connect();
    $builder = $db->table('votes')
                  ->select('votes.Gameid,
                            votes.Userid,
                            games.Slug,
                            games.Name,
                            games,Image')
                   ->join('games', 'votes.Gameid = games.Gameid')
                   ->where('Userid', $user);
     return $builder->get()
                    ->getResultArray();
  }
}
?>
