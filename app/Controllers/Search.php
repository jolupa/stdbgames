<?php
namespace App\Controllers;
use App\Models\SearchModel;
use CodeIgniter\Controller;

helper(['text']);

class Search extends Controller{
  public function result(){
    $searchmodel = new SearchModel();
    $keyword = $this->request->getVar('keyword');
    if($searchmodel->searchResult($keyword) == TRUE){
      $data['keyword'] = $keyword;
      $data['search'] = $searchmodel->searchResult($keyword);
    } else {
      $data['keyword'] = $keyword;
      $data['search'] = FALSE;
    }
    echo view('templates/header');
    echo view('search/searchresult', $data);
    echo view('templates/footer');
  }
  public function searchform(){
    return view('search/form');
  }
}
?>
