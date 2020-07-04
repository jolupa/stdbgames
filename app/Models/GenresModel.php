<?php
namespace App\Models;
use CodeIgniter\Model;

class GenresModel extends Model{
  public function getAllGenres(){
    $db = \Config\Database::connect();
    $builder = $db->table('genres')
                  ->orderBy('genres.name', 'ASC');
    return $builder->get()->getResultArray();
  }
}
?>
