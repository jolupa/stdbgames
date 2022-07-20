<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class ReviewsModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['game_id', 'user_id', 'about', 'url', 'like', 'dislike'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;

    public function checkReviewLikeDislike (int $review_id, int $user_id) {
      $db = \Config\Database::connect ();
      $builder = $db->table ('reviews_likesdislikes')
                    ->where ('review_id', $review_id)
                    ->where ('user_id', $user_id);
      return $builder->get ()->getRowArray ();
    }

    public function removeReviewLikeDislike (int $review_id, int $user_id) {
      $db = \Config\Database::connect ();
      $builder = $db->table ('reviews_likesdislikes')
                    ->where ('review_id', $review_id)
                    ->where ('user_id', $user_id);
      $builder->delete ();
    }

    public function addReviewLikeDislike ($data) {
      $db = \Config\Database::connect ();
      $builder = $db->table ('reviews_likesdislikes');
      $builder->insert ($data);
    }

  }

 ?>
