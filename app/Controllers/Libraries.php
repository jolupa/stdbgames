<?php

  namespace App\Controllers;
  use App\Models\LibrariesModel;

  class Libraries extends BaseController {

    public function addToLibrary ( int $game_id, string $slug ) {

      $model = new LibrariesModel ();
      $checkw = $model->checkWishlist ($game_id, session ('user_id'));
      if (!empty ($checkw)) {

        $model->removeWishlist ($game_id, session ('user_id'));

      }

      $data = [
        'game_id'=> $game_id,
        'user_id'=> session ('user_id')
      ];
      $model->save ($data);

      return redirect ()->to ('/game/'.$slug);

    }

    public function removeFromLibrary ( int $game_id, string $slug ) {

      $model = new LibrariesModel ();
      $model->where ('game_id', $game_id)->where ('user_id', session ('user_id'))->delete ();

      return redirect ()->to ('/game/'.$slug);

    }

    public function gamesinlibrary () {

      $pager = \Config\Services::pager();
      $model = new LibrariesModel();
      $data['libraries'] = $model->select('games.id, games.name, games.slug, games.image, games.like, games.dislike, games.rumor')
                                ->where('libraries.user_id', session ( 'user_id' ) )
                                ->join('games', 'games.id = libraries.game_id')
                                ->orderBy('games.name', 'ASC')
                                ->paginate(24, 'library');
      $data['pager'] = $model->pager;

      if ( ! empty ( $data['libraries'] ) ) {

        $data['totalinlibrary'] = $model->select('count(user_id) as total')
                                        ->where('user_id', session ( 'user_id' ) )
                                        ->findAll();
        return view ( 'libraries/parts/gamesinlibrary', $data );

      } else {

        return '';

      }

    }

    public function checkLibrary (int $game_id) {

      $model = new LibrariesModel ();
      $check = $model->where ('game_id', $game_id)
                      ->where ('user_id', session ('user_id'))
                      ->first ();
      if (!empty ($check)) {

        return view ('libraries/parts/removefromlibrary');

      } else {

        return view ('libraries/parts/addtolibrary');

      }

    }

  }

 ?>
