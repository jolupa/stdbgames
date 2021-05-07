<?php

  namespace App\Controllers;
  use App\Models\PricesModel;

  class Prices extends BaseController {

    protected $helpers = ['text'];

    public function dealsfrontpage () {

      $model = new PricesModel();
      $data['deals'] = $model->select('price_pro, price_nonpro, date_till_pro, date_till_nonpro, games.name, games.slug, games.image')
                            ->where('date_till_pro >', date('Y-m-d'))
                            ->orWhere('date_till_nonpro >', date('Y-m-d'))
                            ->join('games', 'games.id = prices.game_id')
                            ->orderBy('date_till_pro, date_till_nonpro', 'DESC')
                            ->findAll(6);

      if ( ! empty ( $data['deals'] ) ) {

        return view ( 'prices/parts/dealsfrontpage', $data );

      } else {

        return '';

      }

    }

    public function dealongame ( int $id ) {

      $model = new PricesModel();
      $data['dealongame'] = $model->where('game_id', $id)
                                  ->where('date_till_nonpro >', date('Y-m-d'))
                                  ->orWhere('date_till_pro >', date('Y-m-d'))
                                  ->orderBy('id', 'DESC')
                                  ->first();
      if ( ! empty ( $data['dealongame'] ) ) {

        return view ( 'prices/parts/dealongame', $data );

      } else {

        return view ( 'prices/parts/dealongame' );

      }

    }

    public function list () {

      $model = new PricesModel();
      $data['list'] = $model->select('prices.price_pro, prices.price_nonpro, games.name AS name, games.slug AS slug, games.image AS image, games.price AS price')
                            ->where('date_till_pro >', date('Y-m-d'))
                            ->orWhere('date_till_nonpro >', date('Y-m-d'))
                            ->join('games', 'games.id = prices.game_id')
                            ->orderBy('date_till_pro, date_till_nonpro', 'DESC')
                            ->paginate(44);
      if ( empty ( $data['list'] ) ) {
        $data['error'] = 'No deals at this momment';
      }
      $data['pager'] = $model->pager;
      $data['page_title'] = 'All the Game Deals on Stadia - Stadia GamesDB!';
      $data['page_description'] = 'All the game deals on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, deals";
      if ( empty ( $data['list'] ) ) {

        $data['page_image'] = base_url ( '/img/stdb_logo_big.png' );

      } else {

        $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 1, $total )]['image'].'.jpeg');

      }
      $data['page_url'] = base_url ( '/prices/list');
      $data['page_twitterimagealt'] = 'All deals on Stadia';
      $data['page_header'] = 'All the game deals on Stadia';

      if ( ! empty ( $data['list'] ) ) {

        echo view ( 'templates/header', $data);
        echo view ( 'templates/list', $data);
        echo view ( 'templates/footer');

      } else {

        echo view ( 'templates/header', $data );
        echo view ( 'templates/list', $data );
        echo view ( 'templates/footer');
      }

    }

    public function historyprices ( int $id ) {

      $model = new PricesModel();
      $pager = \Config\Services::pager();
      $data['history'] = $model->where('game_id', $id)
                                ->orderBy('date', 'DESC')
                                ->paginate(10, 'history');
      $data['pager'] = $model->pager;

      if ( ! empty ( $data['history'] ) ) {

        return view ( 'prices/parts/historyprices', $data );

      } else {

        return '';

      }

    }

    public function priceaddform ( int $id) {

      $model = new PricesModel();
      $data['prices'] = $model->where('game_id', $id)
                              ->orderBy('date', 'DESC')
                              ->findAll();

      if ( ! empty ( $data['prices'] ) ) {

        return view ( 'prices/parts/priceaddform', $data );

      } else {

        return view ( 'prices/parts/priceaddform');

      }

    }

    public function savepricesdb () {

      $model = new PricesModel();
      $validation = $this->validate('addprices');

      if ( ! $validation ) {

        return redirect()->back()->with( 'validation', 'We need a date to know when the deal starts');

      } else {

        if ( $this->request->getVar('id') ) {

          $data['id'] = $this->request->getVar('id');

        }


        $data['game_id'] = $this->request->getVar('game_id');
        $data['date'] = $this->request->getVar('date');

        if ( ! empty ( $this->request->getVar('price_pro' ) ) ) {

          $data['price_pro'] = $this->request->getVar('price_pro');

        }

        if ( ! empty ( $this->request->getVar('date_till_pro') ) ) {

          $data['date_till_pro'] = $this->request->getVar('date_till_pro');

        }

        if ( ! empty ( $this->request->getVar('price_nonpro') ) ) {

          $data['price_nonpro'] = $this->request->getVar('price_nonpro');

        }

        if ( ! empty ( $this->request->getVar('date_till_nonpro') ) ) {

          $data['date_till_nonpro'] = $this->request->getVar('date_till_nonpro');

        }

        $model->save( $data );
        return redirect()->to( '/update/game/'.$this->request->getVar('slug') );

      }

    }

  }

 ?>
