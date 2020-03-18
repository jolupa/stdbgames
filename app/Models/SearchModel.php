<?php namespace App\Models;
use CodeIgniter\Model;

class SearchModel extends Model{
  public function getResults( $query, $table ){
    $db = \Config\Database::connect();
    $builder = $db->table($table)
                  ->select('Gameid,
                            Name,
                            Release,
                            Image,
                            Slug,
                            About')
                  ->like('Name', $query)
                  ->like('About', $query);
    return $builder->get()
                   ->getResultArray();
  }
}
?>
