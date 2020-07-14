<?php
namespace App\Models;
use CodeIgniter\Model;

class PublishersModel extends Model{
  public function getPublisherById($id){
    $db = \Config\Database::connect();
    $builder = $db->table('publishers')
                  ->where('id', $id);
    return $builder->get()->getRowArray();
  }
  public function getPublisherBySlug($slug){
    $db = \Config\Database::connect();
    $builder = $db->table('publishers')
                  ->where('slug', $slug);
    return $builder->get()->getRowArray();
  }
  public function getAllPublishers(){
    $db = \Config\Database::connect();
    $builder = $db->table('publishers')
                  ->orderBy('publishers.name', 'ASC');
    return $builder->get()->getResultArray();
  }
  public function getGamesPublishedBy($publisher_id){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->where('games.publisher_id', $publisher_id);
    return $builder->get()->getResultArray();
  }
  public function createPublisherDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('publishers');
    return $builder->insert($data);
  }
  public function updatePublisherDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('publishers')
                  ->where('id', $data['id']);
    return $builder->update($data);
  }
}
?>
