<?php namespace App\Models;
use CodeIgniter\Model;

class SearchModel extends Model{
  public function getResults($query,$table){
    $db = \Config\Database::connect();
    $builder = $db->table($table)
                  ->select('*')
                  ->like('Name',$query);
    return $builder->get()
                   ->getResultArray();
  }
}
?>
