<?php
namespace App\Controllers;
use App\Models\PublishersModel;
use CodeIgniter\Controller;

helper(['text']);

class Publishers extends Controller{
  public function overviewgamepublisher($id){
    $publishermodel = new PublishersModel();
    $data['publisher'] = $publishermodel->getPublisherById($id);
    return view('publishers/overviewgamepublisher', $data);
  }
  public function allpubs(){
    $publishermodel = new PublishersModel();
    $data['publisher'] = $publishermodel->getAllPublishers();
    return view('publishers/pubselection', $data);
  }
  public function overview($slug){
    $publishermodel = new PublishersModel();
    $data['publisher'] = $publishermodel->getPublisherBySlug($slug);
    echo view('templates/header', $data);
    echo view('publishers/overview', $data);
    echo view('templates/footer');
  }
  public function gamespublishedby($publisher_id){
    $publishermodel = new PublishersModel();
    $data['game'] = $publishermodel->getGamesPublishedBy($publisher_id);
    return view('publishers/publishedby', $data);
  }
}
?>
