<?php

  namespace App\Controllers;
  use App\Models\ReviewsModel;
  use League\CommonMark\CommonMarkConverter;
  use Abraham\TwitterOAuth\TwitterOAuth;

  class Reviews extends BaseController {

    protected $helpers = ['text'];

    public function latestreviews () {

      $model = new ReviewsModel();
      $data['latestreviews'] = $model->select('reviews.id, reviews.url, games.name as name, games.slug as slug, games.image as image, games.like as like, games.dislike as dislike, users.name as uname, users.image as uimage, users.role as urole')
                                      ->join('games', 'games.id = reviews.game_id')
                                      ->join('users', 'users.id = reviews.user_id')
                                      ->orderBy('reviews.created_at', 'DESC')
                                      ->findAll(4);

      return view ( 'reviews/parts/latestreviews', $data );

    }

    public function gamereviews ( int $id, string $release, $edit = null ) {

      $model = new ReviewsModel();
      $pager = \Config\Services::pager();
      $data['reviews'] = $model->select('reviews.id, reviews.url AS url, reviews.created_at AS created_at, reviews.about AS about, users.name AS name, users.image AS image, users.role AS role, users.id AS user_id')
                          ->where('game_id', $id)
                          ->join('users', 'users.id = reviews.user_id')
                          ->orderBy('reviews.created_at', 'DESC')
                          ->findAll ();

      $convert = new CommonMarkConverter([
                                    'html_input' => 'strip',
                                    'allow_unsafe_links' => false,
                                  ]);
      if ($release > date ('Y-m-d')) {
        return '';
      }
      if (session ('logged') == true) {
        $check = $model->where ('game_id', $id)
                        ->where ('user_id', session ('user_id'))
                        ->first ();
        if (empty ($check) || empty ($data['reviews'])) {
          $data['cantreview'] = false;
        } elseif (!empty ($check)){
          $data['cantreview'] = true;
        }
      } elseif (session ('logged') == false) {
        $data['cantreview'] = true;
      }
      //We have to be sure if there are Reviews
      if (!empty ($data['reviews'])) {
        $total = count ($data['reviews']);
        //Convert Review to HTML
        if ($total == 1) {
          if (!empty ($data['reviews'][0]['about'])) {
            $conversion = $convert->convertToHtml ($data['reviews'][0]['about']);
            if ($data['reviews'][0]['user_id'] == session ('user_id')) {
              $data['reviews'][0]['edit'] = $data['reviews'][0]['about'];
            }
            if (!empty ($conversion)) {
              $data['reviews'][0]['about'] = $conversion;
              if (!empty ($data['reviews'][0]['url'])) {
                $expresion = '/[\s\S]*\K(<\/p>)/';
                $string = $data['reviews'][0]['about'];
                $substitution = ' [<a href="'.$data['reviews'][0]['url'].'" target="_blank">Read Full Review Here...</a>]</p>';
                $data['reviews'][0]['about'] = preg_replace ($expresion, $substitution, $string, 1);
              }
            }
          }
          return view ('reviews/gamereviews', $data);
        } else {
          $i = 0;
          while ($i <= $total) {
            if (!empty ($data['reviews'][$i]['about'])){
              $conversion = $convert->convertToHtml ($data['reviews'][$i]['about']);
              if ($data['reviews'][$i]['user_id'] == session ('user_id')) {
                $data['reviews'][$i]['edit'] = $data['reviews'][$i]['about'];
              }
              if (!empty ($conversion)) {
                $data['reviews'][$i]['about'] = $convert->convertToHtml ($data['reviews'][$i]['about']);
                if (!empty ($data['reviews'][$i]['url'])) {
                  $expresion = '/[\s\S]*\K(<\/p>)/';
                  $string = $data['reviews'][$i]['about'];
                  $substitution = ' [<a href="'.$data['reviews'][$i]['url'].'" target="_blank">Read Full Review Here...</a>]</p>';
                  $data['reviews'][$i]['about'] = preg_replace($expresion, $substitution, $string, 1);
                }
              } else {
                if (!empty ($data['reviews'][$i]['url'])) {
                  $expresion = '/[\s\S]*\K(<\/p>)/';
                  $string = $data['reviews'][$i]['about'];
                  $substitution = ' [<a href="'.$data['reviews'][$i]['url'].'" target="_blank">Read Full Review Here...</a>]</p>';
                  $data['reviews'][$i]['about'] = preg_replace ($expresion, $substitution, $string, 1);
                }
              }
            }
            $i++;
          }
          return view ('reviews/gamereviews', $data);
        }
      } else {
        return view ('reviews/gamereviews', $data);
      }
    }

    public function addReview () {

      $model = new ReviewsModel();

      if (!empty ($this->request->getVar ('review_id'))) {
        $data ['id'] = $this->request->getVar ('review_id');
      }
      $data['game_id'] = $this->request->getVar('game_id');
      $data['user_id'] = session ( 'user_id' );
      if (!empty ($this->request->getVar ('review_edit'))){
        $data['about'] = $this->request->getVar ('review_edit');
      } else {
        $data['about'] = $this->request->getVar('about');
      }
      if ( ! empty ( $this->request->getVar('url' ) ) ) {

        $data['url'] = $this->request->getVar('url');

      }

      $model->save( $data );
      require ( ROOTPATH.'twitter.php' );

      if ( session( 'role' ) == 1 ) {

        $name = 'Our Staff';

      } else {

        $name = 'Our user '.session( 'username' );

      }

      $statusmessage = $name.' wrote a review for '.$this->request->getVar('game_name').' on #Stadia. You agree? Want to say your own? '.previous_url().'#game_reviews';
      $connection = new TwitterOAuth ( $consumerkey, $consumersecret, $token, $tokensecret );
      $connection->post ( 'statuses/update', [ 'status' => $statusmessage ] );

      return redirect()->to( previous_url() );

    }

    public function reviewsLike (int $review_id) {
      $model = new ReviewsModel ();
      $data['reviewslike'] = $model->select ('games.slug, reviews.id, reviews.like, reviews.dislike')
                                    ->where ('reviews.id', $review_id)
                                    ->join ('games', 'games.id = reviews.game_id')
                                    ->first ();
      if (session ('logged') == false) {
        return view('reviews/parts/reviewlikesnologged', $data);
      } else {
        $data['cantreviewlike'] = false;
        $data['cantreviewdislike'] = false;
        $check = $model->checkReviewLikeDislike ($review_id, session ('user_id'));
        if (!empty ($check['like'])) {
          $data['cantreviewlike'] = true;
        }
        if (!empty ($check ['dislike'])) {
          $data['cantreviewdislike'] = true;
        }
        return view ('reviews/parts/reviewlikeslogged', $data);
      }
    }

    public function reviewlikedislike (int $review_id, string $type, string $slug) {
      $model = new ReviewsModel ();
      if ($type == 'like') {
        $data = [
          'review_id'=>$review_id,
          'user_id'=>session ('user_id'),
          'like'=>1
        ];
        $check = $model->checkReviewLikeDislike ($review_id, session ('user_id'));
        if (!empty ($check) && $check['dislike'] == 1) {
          $model->removeReviewLikeDislike ($review_id, session ('user_id'));
          if ($model->select ('dislike')->where ('id', $review_id)->first () > 0) {
            $model->where ('id', $review_id)
                  ->set ('dislike', 'dislike-1', false)
                  ->update ();
          }
        }
        $model->where('id', $review_id)
              ->set ('like', 'like+1', false)
              ->update ();
        $model->addReviewLikeDislike ($data);
        return redirect ()->to ('/game/'.$slug);
      } elseif ($type = 'dislike'){
        $data = [
          'review_id'=>$review_id,
          'user_id'=>session ('user_id'),
          'dislike'=>1
        ];
        $check = $model->checkReviewLikeDislike ($review_id, session ('user_id'));
        if (!empty ($check) && $check['like'] == 1) {
          $model->removeReviewLikeDislike ($review_id, session ('user_id'));
          if ($model->select ('like')->where ('id', $review_id)->first () > 0) {
            $model->where ('id', $review_id)
                  ->set ('like', 'like-1', false)
                  ->update ();
          }
        }
        $model->where ('id', $review_id)
              ->set ('dislike', 'dislike+1', false)
              ->update ();
        $model->addReviewLikeDislike ($data);
        return redirect ()->to ('/game/'.$slug);
      }
    }

  }

 ?>
