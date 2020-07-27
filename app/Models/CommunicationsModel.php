<?php
namespace App\Models;
use CodeIgniter\Model;

class CommunicationsModel extends Model{
  public function getMailConfig(){
    $db = \Config\Database::connect();
    $builder = $db->table('config')
                  ->select('pass')
                  ->where('service', 'mail');
    return $builder->get()->getRowArray();
  }
}

?>
