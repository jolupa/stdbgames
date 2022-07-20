<?php
  namespace App\Controllers;

  class Main extends BaseController {

    protected $helpers = ['text'];

    public function index() {

      $data['page_title'] = 'Stadia GamesDB!';
      $data['page_description'] = 'All the information you need about games coming and launched on Stadia. Build your libraries, wishlist and more';
      $data['page_keywords'] = 'stadia, google, stream, games, cloud, online, streaming, fun, party';
      $data['page_image'] = base_url('/assets/images/stdb_logo_big.png');
      $data['page_url'] = base_url();
      $data['page_twitterimagealt'] = 'Stadia GamesDB!';

      echo view('templates/header', $data);
      echo view('main/index');
      echo view('templates/footer');

    }

    public function about () {

      $data['page_title'] = 'About Stadia GamesDB!';
      $data['page_description'] = 'Who we are, what we want and how we want it!';
      $data['page_keywords'] = 'stadia, google, stream, games, cloud, online, streaming, fun, party';
      $data['page_image'] = base_url('/img/stdb_logo_big.png');
      $data['page_url'] = base_url( '/about');
      $data['page_twitterimagealt'] = 'About Stadia GamesDB!';

      echo view ( 'templates/header', $data );
      echo view ( 'main/about' );
      echo view ( 'templates/footer' );

    }

  }
 ?>
