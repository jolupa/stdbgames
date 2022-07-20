<?php

  namespace App\Controllers;
  use App\Models\WishlistsModel;

  class Wishlists extends BaseController {

    public function addToWishlist ( int $game_id, string $slug ) {

      $model = new WishlistsModel ();
      $data = [
        'game_id'=>$game_id,
        'user_id'=>session ('user_id')
      ];
      $model->save ($data);

      return redirect ()->to ('/game/'.$slug);

    }

    public function removeFromWishlist ( int $game_id, string $slug ) {

      $model = new WishlistsModel ();
      $model->where ('game_id', $game_id)->where ('user_id', session ('user_id'))->delete ();

      return redirect ()->to ('/game/'.$slug);

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

        $data['totalinwishlist'] = $model->select('count(user_id) as total')
                                          ->where('user_id', session ( 'user_id' ) )
                                          ->findAll();
        return view ( 'wishlists/parts/gameswishlisted', $data );

      } else {

        return '';

      }

    }

    public function checkWishlists (int $game_id) {

      $model = new WishlistsModel ();
      $check = $model->where ('game_id', $game_id)
                      ->where ('user_id', session ('user_id'))
                      ->first ();
      if (!empty ($check)) {

        return view ('wishlists/parts/removefromwishlist');

      } else {

        return view ('wishlists/parts/addtowishlist');

      }

    }

  }

 ?>
