<?php
namespace App\Models;
use CodeIgniter\Model;

class BundlesModel extends Model{
  public function getBundleContent($gameid){
    $db = \Config\Database::connect();
    $builder = $db->table('bundles')
                  ->select('bundles.Bundleid AS bId,
                            bundles.Name AS bName,
                            bundles.Slug AS bSlug,
                            bundles.Gameid AS bgId,
                            bundles.Developerid AS bdId,
                            bundles.Addonsid AS baIds,
                            bundles.Release AS bRelease,
                            games.Name AS bgName,
                            games.Image AS bgImage,
                            games.Slug AS bgSlug,
                            developers.Name AS bdName,
                            developers.Slug AS bdSlug,
                            addons.Name AS baName,
                            addons.Slug AS baSlug')
                  ->join('games', 'games.Gameid = bundles.Gameid')
                  ->join('developers', 'developers.Developerid = bundles.Developerid')
                  ->join('addons', 'addons.Addonid = bundles.Addonsid')
                  ->where('bundles.Gameid', $gameid);
    
    return $builder->get()
                    ->getResultArray();
  }

}

?>