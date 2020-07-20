<?php
  namespace App\Models;
  use CodeIgniter\Model;

  class GamesModel extends Model{
    public function getGameBySlug($slug){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->where('slug', $slug);
      return $builder->get()->getRowArray();
    }
    public function gameOverview($slug){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->select('games.id,
                              games.name,
                              games.slug,
                              games.release,
                              games.about,
                              games.pro,
                              games.pro_from,
                              games.pro_till,
                              games.image,
                              games.genre,
                              games.sku,
                              games.appid,
                              games.price,
                              games.first_on_stadia,
                              games.stadia_exclusive,
                              games.early_access,
                              games.updated_at,
                              developers.name AS developer_name,
                              developers.slug AS developer_slug,
                              publishers.name AS publisher_name,
                              publishers.slug AS publisher_slug')
                    ->join('developers', 'developers.id = games.developer_id')
                    ->join('publishers', 'publishers.id = games.publisher_id')
                    ->where('games.slug', $slug);
      return $builder->get()->getRowArray();
    }
    public function getProGames(){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->select('games.name,
                              games.slug,
                              games.image,
                              games.release,
                              developers.name AS developer_name,
                              publishers.name AS publisher_name')
                    ->join('developers', 'developers.id = games.developer_id')
                    ->join('publishers', 'publishers.id = games.publisher_id')
                    ->where('games.pro', 1)
                    ->where('games.pro_from <=', date('Y-m-d'))
                    ->orderBy('release', 'ASC');
      return $builder->get()->getResultArray();
    }
    public function getSoonGames(){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->select('games.name,
                              games.slug,
                              games.image,
                              games.release,
                              developers.name AS developer_name,
                              publishers.name AS publisher_name')
                    ->join('developers', 'developers.id = games.developer_id')
                    ->join('publishers', 'publishers.id = games.publisher_id')
                    ->where('release >', date('Y-m-d'))
                    ->orderBy('release', 'ASC');
      return $builder->get(12)->getResultArray();
    }
    public function getLaunchedGames(){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->select('games.name,
                              games.slug,
                              games.image,
                              games.release,
                              developers.name AS developer_name,
                              publishers.name AS publisher_name')
                    ->join('developers', 'developers.id = games.developer_id')
                    ->join('publishers', 'publishers.id = games.publisher_id')
                    ->where('release <=', date('Y-m-d'))
                    ->orderBy('release', 'DESC');
      return $builder->get(12)->getResultArray();
    }
    public function getLastsGames(){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->select('games.name,
                              games.slug,
                              games.image,
                              games.release,
                              games.updated_at,
                              developers.name AS developer_name,
                              publishers.name AS publisher_name')
                    ->join('developers', 'developers.id = games.developer_id')
                    ->join('publishers', 'publishers.id = games.publisher_id')
                    ->where('games.created_at <=', date('now'))
                    ->orWhere('games.updated_at <=', date('now'))
                    ->orderBy('games.updated_at, games.created_at', 'DESC');
      return $builder->get(4)->getResultArray();
    }
    public function listAllGames($type){
      $db = \Config\Database::connect();
      if($type == 'soon'){
        $builder = $db->table('games')
                      ->select('games.name,
                                games.slug,
                                games.image,
                                games.release,
                                developers.name AS developer_name,
                                publishers.name AS publisher_name')
                      ->join('developers', 'developers.id = games.developer_id')
                      ->join('publishers', 'publishers.id = games.publisher_id')
                      ->where('games.release >', date('Y-m-d'))
                      ->orderBy('games.release', 'ASC');
      } elseif($type == 'launched'){
        $builder = $db->table('games')
                      ->select('games.name,
                                games.slug,
                                games.image,
                                games.release,
                                developers.name AS developer_name,
                                publishers.name AS publisher_name')
                      ->join('developers', 'developers.id = games.developer_id')
                      ->join('publishers', 'publishers.id = games.publisher_id')
                      ->where('games.release <=', date('Y-m-d'))
                      ->orderBy('games.release', 'DESC');
      } elseif($type == 'firstonstadia'){
        $builder = $db->table('games')
                      ->select('games.name,
                                games.slug,
                                games.image,
                                games.release,
                                developers.name AS developer_name,
                                publishers.name AS publisher_name')
                      ->join('developers', 'developers.id = games.developer_id')
                      ->join('publishers', 'publishers.id = games.publisher_id')
                      ->where('games.first_on_stadia', 1)
                      ->orderBy('games.release', 'ASC');
      } elseif($type == 'stadiaexclusive'){
        $builder = $db->table('games')
                      ->select('games.name,
                                games.slug,
                                games.image,
                                games.release,
                                developers.name AS developer_name,
                                publishers.name AS publisher_name')
                      ->join('developers', 'developers.id = games.developer_id')
                      ->join('publishers', 'publishers.id = games.publisher_id')
                      ->where('games.stadia_exclusive', 1)
                      ->orderBy('games.release', 'ASC');
      } elseif($type == 'earlyaccess'){
        $builder = $db->table('games')
                      ->select('games.name,
                                games.slug,
                                games.image,
                                games.release,
                                developers.name AS developer_name,
                                publishers.name AS publisher_name')
                      ->join('developers', 'developers.id = games.developer_id')
                      ->join('publishers', 'publishers.id = games.publisher_id')
                      ->where('games.early_access', 1)
                      ->orderBy('games.release', 'ASC');
      } else {
        $builder = $db->table('games')
                      ->select('games.name,
                                games.slug,
                                games.image,
                                games.release,
                                developers.name AS developer_name,
                                publishers.name AS publisher_name')
                      ->join('developers', 'developers.id = games.developer_id')
                      ->join('publishers', 'publishers.id = games.publisher_id')
                      ->orderBy('games.release', 'ASC');
      }
      return $builder->get()->getResultArray();
    }
    public function createGameDb($data){
      $db = \Config\Database::connect();
      $builder = $db->table('games');
      return $builder->insert($data);
    }
    public function updateGameDb($data){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->where('id', $data['id']);
      return $builder->update($data);
    }
    public function releaseByDate($id, $date){
      $db = \Config\Database::connect();
      $builder = $db->table('games')
                    ->where('id !=', $id)
                    ->where('release', $date)
                    ->orderBy('Name', 'ASC');
      return $builder->get()->getResultArray();
    }
  }

?>
