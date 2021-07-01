<?php

  namespace App\Controllers;
  use App\Models\GalleryModel;
  use Madcoda\Youtube\Youtube;

  class Gallery extends BaseController {

    protected $helpers = ['text'];

    public function galleryitems ( string $query, int $id ) {

      $model = new GalleryModel();
      $data['video'] = $model->where('game_id', $id)
                            ->find();

      if ( ! empty ( $data['video'] ) ) {

        return view ( 'gallery/parts/galleryitems', $data );

      } else {

        try {

          require ( ROOTPATH.'youtube.php' );
          $channel = 'UCQKyy9Wl7hsVn1BP7BC53Yg';

          $youtube = new Youtube( array ( 'key' => $token ) );
          $data['getvideo'] = $youtube->searchVideos( $query, 1 );

          if ( ! empty ( $data['getvideo'] ) ) {

            $data['game_id'] = $id;
            $data['type'] = 'video';
            $data['url'] = $data['getvideo'][0]->id->videoId;
            $model->save($data);
            unset ( $data );

            $data['video'] = $model->where('game_id', $id)
                                    ->find();

            return view ( 'gallery/parts/galleryitems', $data );

          } else {

            return '';

          }

        }

        catch ( \Exception $e ) {

          return '';

        }

      }

    }

    public function changevideoform ( int $id ) {

      $model = new GalleryModel();
      $data['video'] = $model->select('id, game_id, url')
                              ->where('game_id', $id)
                              ->first();
      $data['page_title'] = 'Modify Video Gallery - Stadia GamesDB!';
      $data['page_description'] = 'Form to Modify Video Gallery - Staff Only';
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, interviews";
      $data['page_image'] = base_url ( '/img/stdb_logo_big.png' );
      $data['page_url'] = base_url ( '/gallery/changevideo' );
      $data['page_twitterimagealt'] = 'Modify Video Gallery - Staff Only';

      if ( ! empty ( $data['video'] ) ) {

        echo view ( 'templates/header', $data );
        echo view ( 'gallery/changevideoform', $data );
        echo view ( 'templates/footer' );

      } else {

        echo view ( 'templates/header', $data );
        echo view ( 'gallery/changevideoform' );
        echo view ( 'templates/footer' );

      }

    }

    public function save () {

      $model = new GalleryModel();
      $data['id'] = (int)$this->request->getVar('id');
      $data['game_id'] = (int)$this->request->getVar('game_id');
      $data['url'] = (string)$this->request->getVar('url');
      $model->save($data);

      return redirect()->to( '/gallery/changevideoform/'.$data['game_id'] );

    }

  }

 ?>
