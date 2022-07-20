<?php

  namespace App\Controllers;
  use App\Models\PricesModel;
  use Abraham\TwitterOAuth\TwitterOAuth;

  class Prices extends BaseController {

    protected $helpers = ['text'];

    public function dealsfrontpage () {

      $model = new PricesModel();
      $data['deals'] = $model->select('prices.id, price_pro, price_nonpro, date_till_pro, date_till_nonpro, games.name, games.slug, games.image,games.is_edition, games.edition_game_id')
                            ->where('date_till_pro >', date('Y-m-d'))
                            ->orWhere('date_till_nonpro >', date('Y-m-d'))
                            ->join('games', 'games.id = prices.game_id')
                            ->orderBy('name', 'ASC')
                            ->findAll(4);
      if ( ! empty ( $data['deals'] ) ) {
        $data ['how_many_deals'] = $model->where ('date_till_pro >', date ('Y-m-d'))
                                          ->orWhere ('date_till_nonpro >', date ('Y-m-d'))
                                          ->countAllResults ();
        return view ( 'prices/parts/dealsfrontpage', $data );
      } else {
        return '';
      }
    }
    public function getslug (int $game_id, string $name) {
      $model = new PricesModel ();
      $data ['slug'] = $model->select ('games.slug')
                              ->where ('games.id', $game_id)
                              ->join ('games', 'games.id = '.$game_id)
                              ->first ();
      $data ['slug']['name'] = $name;
      return view ('prices/parts/slug', $data);
    }
    public function alldeals () {
      $model = new PricesModel ();
      $data ['deals'] = $model->select ('prices.id, price_pro, price_nonpro, date_till_pro, date_till_nonpro, games.name, games.slug, games.image,games.is_edition, games.edition_game_id')
                              ->where ('date_till_pro >', date ('Y-m-d'))
                              ->orWhere ('date_till_nonpro >', date ('Y-m-d'))
                              ->join ('games', 'games.id = prices.game_id')
                              ->orderBy ('name', 'ASC')
                              ->findAll ();
      $data['page_title'] = 'All the Game Deals on Stadia - Stadia GamesDB!';
      $data['page_description'] = 'All the game deals on Stadia';
      $total = count ( $data['deals'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, deals";
      if ( empty ( $data['deals']['image'] ) ) {
        $data['page_image'] = base_url ( '/img/stdb_logo_big.png' );
      } else {
        $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 1, $total )]['image'].'.jpeg');
      }

      $data['page_url'] = base_url ( '/prices/alldeals');
      $data['page_twitterimagealt'] = 'All deals on Stadia';
      $data['page_header'] = 'All the game deals on Stadia';
      echo view ('templates/header', $data);
      echo view ('prices/alldeals', $data);
      echo view ('templates/footer');
    }

    public function dealongame ( $id ) {

      $model = new PricesModel();
      $data['dealongame'] = $model->where('game_id', $id)
                                  ->orderBy('id', 'DESC')
                                  ->first();
      if ( ! empty ( $data['dealongame'] ) ) {

        if ( $data['dealongame']['date_till_pro'] > date('Y-m-d') || $data['dealongame']['date_till_nonpro'] > date('Y-m-d') ) {

          return view ( 'prices/parts/dealongame', $data );

        } else {

          return view ( 'prices/parts/dealongame' );

        }

      } else {

        return view ( 'prices/parts/dealongame' );

      }

    }
    public function dealoneditions ($ed_price, $ed_dropped, $ed_id, $ed_pro) {
      $model = new PricesModel ();
      $data ['editiondeal'] = $model->where ('game_id', $ed_id)
                                    ->orderBy ('id', 'DESC')
                                    ->first ();
      if (!empty ($data ['editiondeal'])) {
        if ($data ['editiondeal']['date_till_pro'] > date ('Y-m-d') || $data ['editiondeal']['date_till_nonpro'] > date ('Y-m-d')) {
          $data ['editiondeal']['price'] = $ed_price;
          $data ['editiondeal']['dropped'] = $ed_dropped;
          $data ['editiondeal']['pro'] = $ed_pro;
          return view ('prices/parts/editiondeal', $data);
        } else {
          unset ($data ['editiondeal']);
          $data ['editiondeal']['price'] = $ed_price;
          $data ['editiondeal']['dropped'] = $ed_dropped;
          $data ['editiondeal']['pro'] = $ed_pro;
          return view ('prices/parts/editiondeal', $data);
        }
      } else {
        $data ['editiondeal']['price'] = $ed_price;
        $data ['editiondeal']['dropped'] = $ed_dropped;
        $data ['editiondeal']['pro'] = $ed_pro;
        return view ('prices/parts/editiondeal', $data);
      }
    }
    public function dealsall () {
      $model = new PricesModel ();
      $data ['dealsall'] = $model->select ('games.name, games.id AS game_id, games.is_edition, games.edition_game_id, games.slug, prices.id, prices.price_pro, prices.price_nonpro, prices.date_till_pro, prices.date_till_nonpro')
                                ->where ('prices.date_till_pro >', date ('Y-m-d'))
                                ->where ('prices.date_till_nonpro >', date ('Y-m-d'))
                                ->join ('games', 'games.id = prices.game_id')
                                ->orderBy ('games.name', 'ASC')
                                ->findAll ();
      if (!empty ($data ['dealsall'])) {
        $i = 0;
        $total = count ($data ['dealsall']);
        while ($i < $total) {
          if ($data['dealsall'][$i]['is_edition'] == 1) {
            $data ['dealsall'][$i]['slug'] = $model->select('games.slug')
                                                  ->where ('games.id', $data ['dealsall'][$i]['edition_game_id'])
                                                  ->first ();
          }
          $i++;
        }
        return view ('templates/header', $data);
        return view ('prices/dealsall', $data);
        return view ('templates/footer');
      }
    }

    public function delete ( int $id ) {

      if ( session ('logged') == false || session ('role') != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You can\'t edit internal page data without being a DB! staff');

      } else {

        $model = new PricesModel();
        $model->delete($id, true);

        return redirect()->to( '/')->with( 'error_del', 'Deleted succesfully');

      }

    }

    public function list () {

      $model = new PricesModel();
      $data['list'] = $model->select('prices.price_pro, prices.price_nonpro, games.name AS name, games.slug AS slug, games.image AS image, games.price AS price')
                            ->where('date_till_pro >', date('Y-m-d'))
                            ->orWhere('date_till_nonpro >', date('Y-m-d'))
                            ->join('games', 'games.id = prices.game_id')
                            ->orderBy('name', 'ASC')
                            ->paginate(44);
      if ( empty ( $data['list'] ) ) {

        $data['error'] = 'No deals at this momment';

      }
      $data['pager'] = $model->pager;
      $data['page_title'] = 'All the Game Deals on Stadia - Stadia GamesDB!';
      $data['page_description'] = 'All the game deals on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, deals";

      if ( empty ( $data['list']['image'] ) ) {

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
      $data['history'] = $model->where('game_id', $id)
                                ->orderBy('date', 'DESC')
                                ->findAll ();

      if ( ! empty ( $data['history'] ) ) {

        return view ( 'prices/parts/historyprices', $data );

      } else {

        return '';

      }

    }

    public function priceaddform ( int $id) {

      if ( session ('logged') == false || session ('role') != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You can\'t Edit or Add content wthour being a DB! Staff' );

      } else {

        $model = new PricesModel();
        $data['prices'] = $model->where('game_id', $id)
                                ->orderBy('date', 'DESC')
                                ->findAll();
        $data['game'] = $model->getGameForDeal( $id );
        $data['page_title'] = 'Add Game Deals on Stadia - Stadia GamesDB!';
        $data['page_description'] = 'Add game deals on Stadia - Staff Only';
        $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, deals";
        $data['page_image'] = base_url ( '/img/stdb_logo_big.png' );
        $data['page_url'] = base_url ( '/prices/priceaddform');
        $data['page_twitterimagealt'] = 'Add deals on Stadia - Staff Only';

        if ( ! empty ( $data['prices'] ) ) {

          echo view ( 'templates/header', $data );
          echo view ( 'prices/priceaddform', $data );
          echo view ( 'templates/footer' );

        } else {

          echo view ( 'templates/header', $data );
          echo view ( 'prices/priceaddform', $data );
          echo view ( 'templates/footer' );

        }

      }

    }

    public function savepricesdb () {

      $model = new PricesModel();
      $validation = $this->validate('addprices');

      if ( ! $validation ) {

        return redirect()->back()->with( 'validation', 'We need a date to know when the deal starts');

      } else {

        if ( ! empty ( $this->request->getVar('id') ) ) {

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
        require ( ROOTPATH.'twitter.php' );
        $statusmessage = 'Don\'t miss the #Stadia deal on '.$this->request->getVar('name').' Check it out! https://stdb.games/game/'.$this->request->getVar('slug');
        $connection = new TwitterOAuth ( $consumerkey, $consumersecret, $token, $tokensecret );
        $connection->post ( 'statuses/update', [ 'status' => $statusmessage ] );

        return redirect()->to( '/update/game/'.$this->request->getVar('slug') );

      }

    }

    public function dealgameswishlisted ( int $id ) {

      $model = new PricesModel();
      $data['dealonwishlist'] = $model->where('game_id', $id)
                                      ->orderBy('id', 'DESC')
                                      ->first();

      if ( ! empty ($data['dealonwishlist'] ) ) {

        if ( $data['dealonwishlist']['date_till_pro'] >= date ('Y-m-d') || $data['dealonwishlist']['date_till_nonpro'] >= date ('Y-m-d') ) {

          return view ( 'prices/parts/dealonwishlist' );

        } else {

          return '';

        }

      } else {

        return '';

      }

    }
    public function editiondeal (int $edition_id) {
      $model = new PricesModel ();
      $data ['editiondeal'] = $model->select ('games.id, games.release, games.is_f2p, games.dropped, games.price, games.pro, games.pro_from, games.pro_till, games.rumor, prices.game_id, prices.price_pro, prices.price_nonpro, prices.date_till_pro, prices.date_till_nonpro')
                                    ->where ('game_id', $edition_id)
                                    ->join ('games', 'prices.game_id = games.id')
                                    ->orderBy ('prices.id', 'DESC')
                                    ->first ();
      if (!empty ($data ['editiondeal'])) {
          return view ('/prices/parts/editiondeal', $data);
      } else {
        $data ['editiondeal'] = $model->select ('games.id, games.release, games.is_f2p, games.dropped, games.price, games.pro, games.pro_from, games.pro_till')
                                      ->where ('game_id', $edition_id)
                                      ->join ('games', 'prices.game_id = games.id')
                                      ->first ();
        return print_r ($data ['editiondeal']);
      }
    }

  }

 ?>
