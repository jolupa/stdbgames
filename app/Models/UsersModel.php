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
                            Name,
                            Password,
                            Role')
                  ->where('Name', $form['Name']);
    return $builder->get()
                   ->getRowArray();
  }

  public function getLastUsers(){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->select('Userid,
                            Name,
                            Mail,
                            Birthdate,
                            Registrydate,
                            Role')
                  ->orderBy('Userid', 'DESC');
    return $builder->get(10)
                   ->getResultArray();
  }

  public function getUser($user){
    $db = \Config\Database::connect();
    $builder = $db->table('users')
                  ->where('Name', $user);
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

  public function addUserLibrary($data){
    $db = \Config\Database::connect();
    $builder = $db->table('libraries');
    return $builder->insert($data);
  }

  public function addUserWish($data){
    $db = \Config\Database::connect();
    $builder = $db->table('wishes');
    return $builder->insert($data);
  }

  public function checkUserVote($gameid, $userid){
    $db = \Config\Database::connect();
    $builder = $db->table('votes')
                  ->where('Userid', $userid)
                  ->where('Gameid', $gameid);
    if (is_array($builder->get()->getRowArray())){
      return 1;
    } else {
      return 0;
    }
  }

  public function checkUserPurchase($gameid, $userid){
    $db = \Config\Database::connect();
    $builder = $db->table('libraries')
                              ->where('Gameid', $gameid)
                              ->where('Userid', $userid);
    if (is_array($builder->get()->getRowArray())){
      return 1;
    } else {
      return 0;
    }
  }

  public function checkUserWish($gameid, $userid){
    $db = \Config\Database::connect();
    $builder = $db->table('wishes')
                              ->where('Gameid', $gameid)
                              ->where('Userid');
    if (!empty ($builder->get()->getRowArray() )){
      return 1;
      } else {
        return 0;
      }
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

  public function getGamesWish($user){
    $db = \Config\Database::connect();
    $builder = $db->table('wishes')
                  ->select('wishes.Gameid,
                            wishes.Userid,
                            games.Slug,
                            games.Name,
                            games,Image')
                   ->join('games', 'wishes.Gameid = games.Gameid')
                   ->where('Userid', $user);
     return $builder->get()
                    ->getResultArray();
  }

  public function getGamesLibrary($user){
    $db = \Config\Database::connect();
    $builder = $db->table('libraries')
                  ->select('games.Slug,
                            games.Name,
                            games,Image')
                   ->join('games', 'libraries.Gameid = games.Gameid')
                   ->where('Userid', $user);
     return $builder->get()
                    ->getResultArray();
  }

  public function deleteUserWish($gameid, $userid){
    $db = \Config\Database::connect();
    $builder = $db->table('wished')
                              ->where('Gameid', $gameid)
                              ->where('Userid', $userid);
      return $builder->delete();
  }
}
?>
