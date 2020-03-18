<?php namespace App\Models;
use CodeIgniter\Model;

class HomeModel extends Model{
  public function getGamesHome(){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->select('games.Name AS gName,
                            games.Slug AS gSlug,
                            Image AS gImage,
                            Release AS gRelease,
                            games.Developerid AS gdId,
                            games.Publisherid AS gpId,
                            developers.Name AS dName,
                            publishers.Name AS pName')
                  ->join('developers', 'developers.Developerid = games.Developerid')
                  ->join('publishers', 'publishers.Publisherid = games.Publisherid')
                  ->where('gRelease <=', date('Y-m-d'))
                  ->orderBy('gRelease', 'DESC')
                  ->orderBy('gTitle', 'ASC');
    return $builder->get()
                   ->getResultArray();
  }

  public function getFoundersHome(){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->select('games.Name AS gName,
                            games.Slug AS gSlug,
                            Image AS gImage,
                            Release AS gRelease,
                            games.Developerid AS gdId,
                            games.Publisherid AS gpId,
                            developers.Name AS dName,
                            publishers.Name As pName')
                  ->join('developers', 'games.Developerid = developers.Developerid')
                  ->join('publishers', 'games.Publisherid = publishers.Publisherid')
                  ->where('Pro', 1)
                  ->orderBy('gTitle', 'ASC');
    return $builder->get()
                   ->getResultArray();
    //return $query->getResultArray();
  }

  public function getGamesSoon(){
    $db = \Config\Database::connect();
    $builder = $db->table('games')
                  ->select('games.Name AS gName,
                            games.Slug AS gSlug,
                            Image AS gImage,
                            Release AS gRelease,
                            games.Developerid AS gdId,
                            games.Publisherid AS gpId,
                            developers.Name AS dName,
                            publishers.Name AS pName')
                  ->join('developers', 'developers.Developerid = games.Developerid')
                  ->join('publishers', 'publishers.Publisherid = games.Publisherid')
                  ->where('gRelease >', date('Y-m-d'))
                  ->orderBy('gRelease', 'DESC')
                  ->orderBy('gTitle', 'ASC');
    return $builder->get()
                   ->getResultArray();
  }
}
?>
