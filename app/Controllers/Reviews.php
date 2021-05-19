<?php

  namespace App\Controllers;
  use App\Models\ReviewsModel;
  use League\CommonMark\CommonMarkConverter;
  use Abraham\TwitterOAuth\TwitterOAuth;

  class Reviews extends BaseController {

    protected $helpers = ['text'];

    public function latestreviews () {

      $model = new ReviewsModel();
      $data['latestreviews'] = $model->select('reviews.url, games.name as name, games.slug as slug, games.image as image, users.name as uname, users.image as uimage, users.role as urole')
                                      ->join('games', 'games.id = reviews.game_id')
                                      ->join('users', 'users.id = reviews.user_id')
                                      ->orderBy('reviews.created_at', 'DESC')
                                      ->findAll(6);

      return view ( 'reviews/parts/latestreviews', $data );

    }

    public function gamereviews ( int $id, string $release ) {

      $model = new ReviewsModel();
      $pager = \Config\Services::pager();
      $data['reviews'] = $model->select('reviews.url AS url, reviews.created_at AS created_at, reviews.about AS about, users.name AS name, users.image AS image, users.role AS role')
                                ->where('game_id', $id)
                                ->join('users', 'users.id = reviews.user_id')
                                ->orderBy('reviews.created_at', 'DESC')
                                ->paginate(10, 'gamereviews');
      $data['pager'] = $model->pager;

      //We check if the game is launched to give access to Reviews

      if ( $release > date ( 'Y-m-d') ) {

        return '';

      } else {

        // We make sure that are reviews for the game

        if ( ! empty ( $data[ 'reviews' ] ) ) {



          // 'Cause there are reviews we convert the Markup to html if there are reviews with Markup

          $total = count ( $data['reviews'] );
          $i = 0;
          $convert = new CommonMarkConverter([

            'html_input' => 'strip',
            'allow_unsafe_links' => false,

          ]);

          // If there are only one review we convert only that Markup

          if ( $total == 1 ) {

            // 'Cause at the beggining of the page there was reviews without about we check if it's not empty

            if ( ! empty ( $data['reviews'][0]['about'] ) ) {

              $conversion = $convert->convertToHtml( $data['reviews'][0]['about'] );

              // Beacuse the CommonMark plugin returns empty when there's html we check that to not pass an empty value to
              // the review

              if ( ! empty ( $conversion) ) {

                $data['reviews'][0]['about'] = $conversion;

              }

            }

          } else {

            // If there are more than one review we make a while loop to convert all

            while ( $i <= $total ) {

              // As before we check that there's not empty about for the review

              if ( ! empty ( $data['reviews'][$i]['about'] ) ) {

                $conversion = $convert->convertToHtml( $data['reviews'][$i]['about'] );

                // We check again if the CommonMark don't return an empty value

                if ( ! empty ( $conversion ) ) {

                  $data['reviews'][$i]['about'] = $conversion;

                }

              }

              $i++;

            }

          }

          // Now we decide what to present to user depending if its logged and if there's any review from the user

          if ( session ( 'logged' ) == true ) {

            // We check if the user has Reviews

            $checkuser = $model->where('game_id', $id)
                                ->where('user_id', session ( 'user_id' ))
                                ->findAll();

            // If the user has reviews we return only the reviews

            if ( ! empty ( $checkuser ) ) {

              return view ( 'reviews/gamereviews', $data );

            } else {

              // If the user don't have any review we return the review with the form to insert one.

              $data['createreview'] = true;
              return view ( 'reviews/gamereviews', $data );

            }

          } else {

            // 'Cause the user is not logged but are reviews we return only the reviews

            return view ( 'reviews/gamereviews', $data );

          }

        } else {

          // If there are no reviews we check if the user is loged to offer the possibility to add a new one

          if ( session ( 'logged' ) == true ) {

            return view ( 'reviews/parts/createreview' );

          } else {

            // 'Cause the user is not loged and there's no reviews we don't return nothing

            return '';

          }

        }

      }

    }

    public function addReview () {

      $model = new ReviewsModel();
      $convert = new CommonMarkConverter([

        'allow_unsafe_links' => false,

      ]);

      $data['game_id'] = $this->request->getVar('game_id');
      $data['user_id'] = session ( 'user_id' );
      $data['about'] = $this->request->getVar('about');

      if ( ! empty ( $this->request->getVar('url' ) ) ) {

        $data['url'] = $this->request->getVar('url');

      }

      $model->save( $data );
      require ( ROOTPATH.'twitter.php' );
      $statusmessage = 'Our user '.session( 'username').' wrote a review for '.$this->request->getVar('game_name').' You agree? Want to tell what you think? '.previous_url();
      $connection = new TwitterOAuth ( $consumerkey, $consumersecret, $token, $tokensecret );
      $connection->post ( 'statuses/update', [ 'status' => $statusmessage ] );

      return redirect()->to( previous_url() );

    }

  }

 ?>
