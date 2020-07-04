<?php
namespace App\Models;
use CodeIgniter\Model;

class SearchModel extends Model{
  public function searchResult($keyword){
		$db = \Config\Database::connect();
		$builder = $db->table('games')
									->like('name', $keyword);
    if($builder->countAllResults(FALSE) > 0){
      return $builder->get()->getResultArray();
    } else {
      return FALSE;
    }
	}
}
?>
