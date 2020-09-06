<?php
namespace App\Models;
use CodeIgniter\Model;

class SearchModel extends Model{
  public function searchGames($keyword){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
									->like('name', $keyword);
    if($builder->countAllResults(FALSE) > 0){
      return $builder->get()->getResultArray();
    } else {
      return FALSE;
    }
	}
  public function searchDevelopers($keyword){
    $db = \Config\Database::connect();
    $builder = $db->table('developers')
                  ->like('name', $keyword);
    if ($builder->countAllResults(false) > 0){
      return $builder->get()->getResultArray();
    } else {
      return false;
    }
  }
  public function searchPublishers($keyword){
    $db = \Config\Database::connect();
    $builder = $db->table('publishers')
                  ->like('name', $keyword);
    if($builder->countAllResults(false) > 0){
      return $builder->get()->getResultArray();
    } else {
      return false;
    }
  }
}
?>
