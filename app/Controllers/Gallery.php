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

  }

 ?>
