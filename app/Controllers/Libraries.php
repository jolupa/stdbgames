<?php

  namespace App\Controllers;
  use App\Models\LibrariesModel;

  class Libraries extends BaseController {

    public function addToLibrary ( int $id ) {

      if ( session ( 'logged' ) == true ) {

        $model = new LibrariesModel();
        $data = [

          'game_id' => $id,
          'user_id' => session ( 'user_id' ),

        ];

        $model->save( $data );

        if ( $model->updatewishlist( $id, session ( 'user_id' ) == true ) ) {

          $key = array_search ( $id, session ( 'wishlisted') );

          if ( ! empty ( $key ) ) {

            unset ( $_SESSION['wishlisted'][$key] );

          }

        }

        $session = \Config\Services::session();
        $total = count ( session ( 'library' ) );
        $session->push( 'library', [ $total => $id ] );

        return redirect()->to( previous_url () );

      } else {

        return redirect()->to( previous_url() )->with( 'error_wis', 'Log In or Sign Up to make you own Library' );

      }

    }

    public function removeFromLibrary ( int $id ) {

      if ( session ( 'logged' ) == true ) {

        $model = new LibrariesModel();
        $model->where( 'game_id', $id )->where( 'user_id', session ( 'user_id' ) )->delete();
        $key = array_search ( $id, session ( 'library' ) );

        if ( ! empty ( $key ) ) {

          unset ( $_SESSION['library'][$key] );

        }

        return redirect()->to( previous_url () );

      } else {

        return redirect()->to( previous_url () )->with( 'error_wis', 'Log In or Sign Up to make your own Library' );

      }

    }

    public function gamesinlibrary () {

      $pager = \Config\Services::pager();
      $model = new LibrariesModel();
      $data['libraries'] = $model->select('games.id, games.name, games.slug, games.image, games.like, games.dislike')
                                ->where('libraries.user_id', session ( 'user_id' ) )
                                ->join('games', 'games.id = libraries.game_id')
                                ->orderBy('games.name', 'ASC')
                                ->paginate(24, 'library');
      $data['pager'] = $model->pager;

      if ( ! empty ( $data['libraries'] ) ) {

        return view ( 'libraries/parts/gamesinlibrary', $data );

      } else {

        return '';

      }

    }

  }

 ?>
