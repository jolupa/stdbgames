<?php

  namespace App\Controllers;
  use App\Models\EditionsModel;
  use Abraham\TwitterOAuth\TwitterOAuth;

  class Editions extends BaseController {

    protected $helpers = ['text'];

    public function addformeditions ( int $id, string $slug ) {

      if ( session ( 'logged' ) == false || session ( 'role' ) != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You can\'t Edit or Add content wthout being a DB! Staff' );

      } else {

        $data['game'] = $id;
        $data['page_title'] = 'Add Game Edition';
        $data['page_description'] = 'Add Game Edition to DB! - Staff Only';
        $data['page_keywords'] ='stadia, google, stream, games, cloud, online, streaming, fun, party';
        $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
        $data['page_url'] = base_url( '/editions/addformeditions' );
        $data['page_twitterimagealt'] = 'Add Game Edition to DB! - Staff Only';
        $data['game_slug'] = $slug;

        echo view ( 'templates/header', $data );
        echo view ( 'editions/addformeditions', $data );
        echo view ( 'templates/footer' );

      }

    }

    public function updateformeditions ( int $id ) {

      if ( session ( 'logged' ) == false || session ( 'role' ) != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You cam\'t Edit or Add content without being a DB! Staff' );

      } else {

        $model = new EditionsModel();
        $data['edition'] = $model->where('id', $id)
                                  ->first();
        $data['page_title'] = 'Update Game Edition';
        $data['page_description'] = 'Update Game Edition to DB! - Staff Only';
        $data['page_keywords'] ='stadia, google, stream, games, cloud, online, streaming, fun, party';
        $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
        $data['page_url'] = base_url( '/editions/addformeditions' );
        $data['page_twitterimagealt'] = 'Update Game Edition to DB! - Staff Only';

        echo view ( 'templates/header', $data );
        echo view ( 'editions/updateformeditions', $data );
        echo view ( 'templates/footer' );

      }

    }

    public function save () {

      $model = new EditionsModel();

      if ( ! empty ( $this->request->getVar('id') ) ) {

        $data['id'] = $this->request->getVar('id');

      }

      $data['is_edition'] = 1;
      $data['edition_game_id'] = $this->request->getVar('edition_game_id');
      $data['slug'] = $this->request->getVar('slug');

      if ( empty ( $this->request->getVar('name') ) ) {

        return redirect()->back()->withInput()->with( 'validation_name', 'Name Required');

      } else {

        $data['name'] = $this->request->getVar('name');

      }

      if ( ! empty ( $this->request->getVar('release') ) ) {

        $data['release'] = $this->request->getVar('release');

      }

      if ( ! empty ( $this->request->getVar('price') ) ) {

        $data['price'] = $this->request->getVar('price');

      }

      if ( $_FILES['image']['error'] == 4) {

        if ( ! empty ( $this->request->getVar( 'old_image' ) ) ) {

          $data['image'] = $this->request->getVar('old_image');

        } else {

          return redirect()->back()->withInput()->with('validation', 'We need an image to make more beauty the edition presentation' );

        }

      } else {

        if ( ! empty ( $this->request->getVar('old_image') ) ) {

          unlink ( ROOTPATH.'public/img/games/'.$this->request->getVar('old_image').'.jpeg' );
          unlink ( ROOTPATH.'public/img/games/'.$this->request->getVar('old_image').'-thumb.jpeg' );

        }

        $file = $this->request->getFile('image')
                              ->move(WRITEPATH.'uploads', strtolower ( url_title ( $data['name'] ) ) );

        $image = \Config\Services::image('imagick')->withfile(WRITEPATH.'uploads/'.strtolower ( url_title ( $data['name'] ) ) )
                                                    ->resize(1370, 728, 'width')
                                                    ->convert(IMAGETYPE_JPEG)
                                                    ->save(ROOTPATH.'public/img/games/'.strtolower ( url_title ( $data['name'] ) ).'.jpeg' );

        $imagethumb = \Config\Services::image('imagick')->withfile(WRITEPATH.'uploads/'.strtolower ( url_title ( $data['name'] ) ) )
                                                    ->fit(256, 256, 'center')
                                                    ->convert(IMAGETYPE_JPEG)
                                                    ->save(ROOTPATH.'public/img/games/'.strtolower ( url_title ( $data['name'] ) ).'-thumb.jpeg' );

        unlink ( WRITEPATH.'uploads/'.strtolower ( url_title ( $data['name'] ) ) );
        $data['image'] = strtolower ( url_title ( $data['name'] ) );

      }

      if ( ! empty ( $this->request->getVar('pro') ) && empty ( $this->request->getVar('pro_from') ) ) {

        return redirect()->back()->withInput()->with( 'validation_pro', 'If a Game is Pro we need When it Starts the Pro Feature' );

      } elseif ( ! empty ( $this->request->getVar('pro') ) && ! empty ( $this->request->getVar('pro_from') ) ) {

        $data['pro'] = 1;
        $data['pro_from'] = $this->request->getVar('pro_from');

      }

      if ( ! empty ( $this->request->getVar('pro_till') ) ) {

        $data['pro_till'] = $this->request->getVar('pro_till');

      }

      if ( ! empty ( $this->request->getVar('preorder_appid') ) ) {

        $data['preorder_appid'] = $this->request->getVar('preorder_appid');
        $data['preorder_sku'] = $this->request->getVar('preorder_sku');

      }

      if ( ! empty ( $this->request->getVar('appid') ) ) {

        $data['appid'] = $this->request->getVar('appid');
        $data['sku'] = $this->request->getVar('sku');

      }

      if ( ! empty ( $this->request->getVar('demo_appid') ) ) {

        $data['demo_appid'] = $this->request->getVar('demo_appid');
        $data['demo_sku'] = $this->request->getVar('demo_sku');

      }

      $model->save( $data );

      if ( ! empty ( $this->request->getVar('tweet') ) ) {

        require ( ROOTPATH.'twitter.php' );

        if ( ! empty ( $this->request->getVar('id') ) ) {

          $statusmessage = 'We updated a Game Edition '.$data['name'].' Like, Dislike or add it to your Library or Wishlist! https://stdb.games/game/'.$this->request->getVar('slug');

        } else {

          $statusmessage = 'We added a new Game Edition to DB! '.$data['name'].' Like, Dislike or add it to your Library or Wishlist! https://stdb.games/game/'.$this->request->getVar('slug');

        }

        $connection = new TwitterOAuth ( $sonsumerkey, $consumersecret, $token, $tokensecret );
        $connection->post ( 'statuses/update', [ 'status' => $statusmessage ] );

      }

      return redirect()->to( '/game/'.$this->request->getVar('slug') );

    }

    public function editionsbygame ( int $id ) {

      $model = new EditionsModel();
      $data['editions'] = $model->where('is_edition', 1)
                                ->where('edition_game_id', $id)
                                ->orderBy('release', 'DESC')
                                ->findAll();
      if ( ! empty ( $data['editions'] ) ) {

        return view ( 'editions/parts/editionsbygame', $data );

      } else {

        return '';

      }

    }

    public function delete ( int $id ) {

      if ( session ('logged') == false || session ('role') != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You can\'t edit internal page data without being a DB! staff');

      } else {

        $model = new EditionsModel();

        $data['edition'] = $model->where('id', $id)
                                  ->first();

        unlink ( ROOTPATH.'public/img/games/'.$data['edition']['image'].'.jpeg' );
        unlink ( ROOTPATH.'public/img/games/'.$data['edition']['image'].'-thumb.jpeg' );
        $model->delete($id, true);
        return redirect()->to( '/' )->with( 'error_del', 'Deleted succesfully');

      }

    }

  }

 ?>
