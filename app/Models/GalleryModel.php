<?php

  namespace App\Models;
  use CodeIgniter\Model;

  class GalleryModel extends Model {

    protected $DBGroup = 'default';
    protected $table = 'galleries';
    protected $returnType = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['game_id', 'type', 'url'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'datetime';
    protected $skipvalidation = true;

  }

 ?>
