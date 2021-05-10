<?php

  namespace App\Controllers;
  use App\Models\GalleryModel;
  use Madcoda\Youtube\Youtube;

  class Gallery extends BaseController {

    protected $helpers = ['text'];

    public function galleryitems ( string $query ) {

      require ( ROOTPATH.'youtube.php' );
      $channel = 'UCQKyy9Wl7hsVn1BP7BC53Yg';

      try {

        $youtube = new Youtube( array ( 'key' => $token ) );
        $data['video'] = $youtube->searchVideos( $query, 1 );

        if ( ! empty ( $data['video'] ) ) {

          return view ( 'gallery/parts/galleryitems', $data );

        } else {

          return '';

        }

      }

      catch ( \Exception $e ) {

        return $e->getMessage();

      }

    }

  }

 ?>
