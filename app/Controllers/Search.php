<?php namespace App\Controllers;
use App\Model\SearchModel;
use CodeIgniter\Controller;

helper('url');

class Search extends Model{
  public function index(){
    return view('search/searchform');
  }
  public function searchresult(){
    $result = new SearchModel();
    $query = $this->request->getVar('query');
    $table = $this->request->getVar('table');
    $data['results'] = $result->getResults($query,$table);

    echo view('templates/header');
    echo view('search/searchresults', $data);
    echo view('templates/footer');
  }
}
?>
