<?php

  namespace App\Controllers;
  use App\Models\ChartsModel;

  class Charts extends BaseController {

    public function index () {

      $data['page_title'] = 'Some data for things - On Stadia GamesDB!';
      $data['page_description'] = 'Find some curious data for things on Stadia GamesDB!';
      $data['page_keywords'] = 'stadia, google, stream, games, cloud, online, streaming, fun, party';
      $data['page_image'] = base_url('/img/stdb_logo_big.png');
      $data['page_url'] = base_url('/charts');
      $data['page_twitterimagealt'] = 'Some charts with information - Stadia GamesDB!';

      echo view ( 'templates/header', $data );
      echo view ( 'charts/main' );
      echo view ( 'templates/footer' );

    }

    public function gamebyyear () {

      $model = new ChartsModel();
      $data['gamebyyear'] = $model->select('strftime("%Y", release) AS year, COUNT(id) AS total')
                              ->where('strftime("%Y", release) <=', date('Y'))
                              ->groupBy('year')
                              ->findAll();

      return view ( 'charts/parts/gamebyyear', $data );

    }

    public function gameprobymonth () {

      $model = new ChartsModel();
      $data['gameprobymonth'] = $model->select('strftime("%Y-%m", pro_from) AS date, count(id) AS total')
                                      ->where('pro_from !=', '')
                                      ->where('release <=', date('Y-m-d'))
                                      ->groupBy('date')
                                      ->findAll();

      return view ( 'charts/parts/gameprobymonth', $data );

    }

    public function totalvalueofgamesyear () {

      $model = new ChartsModel();
      $data['totalvalueofgamesyear'] = $model->select('strftime("%Y", release) AS year, sum(price) AS total')
                                              ->where('release <=', date('Y-m-d'))
                                              ->groupBy('year')
                                              ->findAll();

      return view ( 'charts/parts/totalvalueofgamesyear', $data );

    }

    public function totalvalueprogamesyear () {

      $model = new ChartsModel();
      $data['totalvalueprogamesyear'] = $model->select('strftime("%Y", release) AS year, sum(price) AS total')
                                              ->where('pro_from !=', '')
                                              ->where('release <=', date('Y-m-d'))
                                              ->groupBy('year')
                                              ->findAll();

      return view ( 'charts/parts/totalvalueprogamesyear', $data );

    }

    public function prices () {

      $model = new ChartsModel();
      $data['cheaperprice'] = $model->select('price')
                                      ->where('price !=', '')
                                      ->where('release <=', date('Y-m-d'))
                                      ->where('is_edition', 0)
                                      ->groupBy('price')
                                      ->orderBy('price', 'ASC')
                                      ->first();
      $data['higherprice'] = $model->select('price')
                                        ->where('price !=', '')
                                        ->where('release <=', date('Y-m-d'))
                                        ->where('is_edition', 0)
                                        ->groupBy('price')
                                        ->orderBy('price', 'DESC')
                                        ->first();
      $data['cheapestpricepro'] = $model->cheapestpricepro();
      $data['cheapestpriceall'] = $model->cheapestpriceall();

      return view ( 'charts/parts/prices', $data );

    }

    public function mostwishlisted () {

      $model = new ChartsModel();
      $data['mostwishlisted'] = $model->mostWishlisted();

      if ( ! empty ( $data['mostwishlisted'] ) ) {

        return view ( 'charts/parts/mostwishlisted', $data );

      } else {

        return '';

      }

    }

  }

 ?>
