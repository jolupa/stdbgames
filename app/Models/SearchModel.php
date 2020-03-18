<?php namespace App\Models;
use CodeIgniter\Model;

class SearchModel extends Model{
  public function getResults( $query ){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->select('*')
                  ->like('Name', $query)
                  ->like('About', $query);
    return $builder->get()
                   ->getResultArray();
  }
}
?>
