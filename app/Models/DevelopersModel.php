<?php
namespace App\Models;
use CodeIgniter\Model;

class DevelopersModel extends Model{
  public function getDeveloperById($id){
    $db = \Config\Database::connect();
    $builder = $db->table('developers')
                  ->where('id', $id);
    return $builder->get()->getRowArray();
  }
  public function getAllDevelopers(){
    $db = \Config\Database::connect();
    $builder = $db->table('developers')
                  ->orderBy('developers.name', 'ASC');
    return $builder->get()->getResultArray();
  }
  public function getDeveloperBySlug($slug){
    $db = \Config\Database::connect();
    $builder = $db->table('developers')
                  ->where('slug', $slug);
    return $builder->get()->getRowArray();
  }
  public function getGamesDevelopedBy($developer_id){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->where('developer_id', $developer_id);
    return $builder->get()->getResultArray();
  }
  public function createDeveloperDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('developers');
    return $builder->insert($data);
  }
  public function updateDeveloperDb($data){
    $db = \Config\Database::connect();
    $builder = $db->table('developers')
                  ->where('id', $data['id']);
    return $builder->update($data);
  }
}
?>
