<?php
namespace App\Controllers;
use App\Models\GenresModel;
use CodeIgniter\Controller;

class Genres extends Controller{
  public function allgenres(){
    $genresmodel = new GenresModel();
    $data['genre'] = $genresmodel->getAllGenres();
    return view('genres/genresselection', $data);
  }
}
?>
