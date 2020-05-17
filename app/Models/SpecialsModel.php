<?php
namespace App\Models;
use CodeIgniter\Model;

class SpecialsModel extends Model{
  public function insertSpecial($data){
    $db = \Config\Database::connect();
    $builder = $db->table('specials');
    return $builder->insert($data);
  }
  public function getSpecial($slug){
    $db = \Config\Database::connect();
    $builder = $db->table('specials')
                  ->select('Specialid AS sId,
                            Date AS sDate,
                            Datetill AS sDatetill,
                            Title AS sTitle,
                            About AS sAbout,
                            Image AS sImage,
                            Slug AS sSlug')
                  ->where('Slug', $slug);
    return $builder->get()->getRowArray();
  }
  public function updateSpecial($data){
    $db = \Config\Database::connect();
    $builder = $db->table('specials')
                  ->where('Specialid', $data['Specialid']);
    return $builder->update($data);
  }
  public function getSpecialHome($slug){
    $db = \Config\Database::connect();
    $builder = $db->table('specials')
                  ->select('Slug AS sSlug,
                            Image AS sImage')
                  ->where('Slug', $slug);
    return $builder->get()->getRowArray();
  }
  public function getSixMonthsFirstGames(){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->select('Image AS sgImage,
                            Slug AS sgSlug')
                  ->where('Release =', '2019-11-19');
    return $builder->get()->getResultArray();
  }
}

 ?>
