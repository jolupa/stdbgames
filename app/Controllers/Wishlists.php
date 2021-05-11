<?php

  namespace App\Controllers;
  use App\Models\WishlistsModel;

  class Wishlists extends BaseController {

    public function addToWishlist ( int $id ) {

      if ( session ( 'logged' ) == true ) {

        $model = new WishlistsModel();
        $data = [

          'game_id' => $id,
          'user_id' => session ( 'user_id' ),

        ];

        $model->save( $data );
        $session = \Config\Services::session();
        $total = count ( session ( 'wishlisted' ) );
        $session->push( 'wishlisted', [ $total => $id ] );

        return redirect()->to( previous_url () );

      } else {

        return redirect()->to( previous_url() )->with( 'error_wis', 'Log In or Sign Up to make you own Wishlist' );

      }

    }

    public function removeFromWishlist ( int $id ) {

      if ( session ( 'logged' ) == true ) {

        $model = new WishlistsModel();
        $model->where( 'game_id', $id )->where( 'user_id', session ( 'user_id' ) )->delete();
        $key = array_search ( $id, session ( 'wishlisted' ) );

        if ( ! empty ( $key ) ) {

          unset ( $_SESSION['wishlisted'][$key] );

        }

        return redirect()->to( previous_url () );

      } else {

        return redirect()->to( previous_url () )->with( 'error_wis', 'Log In or Sign Up to make your own Wishlist' );

      }

    }

    public function gameswishlisted () {

      $pager = \Config\Services::pager();
      $model = new WishlistsModel();
      $data['wishlist'] = $model->select('games.id, games.name, games.slug, games.image, games.like, games.dislike, games.rumor')
                                ->where('wishlists.user_id', session ( 'user_id' ) )
                                ->join('games', 'games.id = wishlists.game_id')
                                ->orderBy('games.name', 'ASC')
                                ->paginate(24, 'wishlist');
      $data['pager'] = $model->pager;

      if ( ! empty ( $data['wishlist'] ) ) {

        return view ( 'wishlists/parts/gameswishlisted', $data );

      } else {

        return '';

      }

    }

  }

 ?>
