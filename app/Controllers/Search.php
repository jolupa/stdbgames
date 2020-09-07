<?php
namespace App\Controllers;
use App\Models\SearchModel;
use CodeIgniter\Controller;

helper(['text']);

class Search extends Controller{
  public function result(){
    $searchmodel = new SearchModel();
    $keyword = $this->request->getVar('keyword');
    if(is_array($searchmodel->searchGames($keyword))){
      $data['searchgames'] = $searchmodel->searchGames($keyword);
    } else {
      $data['searchgames'] = false;
    }
    if(is_array($searchmodel->searchDevelopers($keyword))){
      $data['searchdevelopers'] = $searchmodel->searchDevelopers($keyword);
    } else {
      $data['searchdevelopers'] = false;
    }
    if(is_array($searchmodel->searchPublishers($keyword))){
      $data['searchpublishers'] = $searchmodel->searchPublishers($keyword);
    } else {
      $data['searchpublishers'] = false;
    }
    $data['keyword'] = $keyword;
    echo view('templates/header');
    echo view('search/searchresult', $data);
    echo view('templates/footer');
  }
  public function searchform(){
    return view('search/form');
  }
  public function searchnavbarform(){
    return view('search/navbarsearchform');
  }
}
?>
