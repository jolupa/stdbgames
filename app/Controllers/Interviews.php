<?php

  namespace App\Controllers;
  use App\Models\InterviewsModel;
  use League\CommonMark\CommonMarkConverter;

  class Interviews extends BaseController {

    protected $helpers = ['text'];

    public function interviewsfront () {

      $model = new InterviewsModel();
      $data['interviewslist'] = $model->select('interviews.body, developers.name AS dev_name, games.name AS name, games.slug AS slug, games.image AS image')
                                      ->join('games', 'games.id = interviews.game_id')
                                      ->join('developers', 'developers.id = games.developer_id')
                                      ->orderBy('interviews.id', 'DESC')
                                      ->findAll(4);
      return view('interviews/parts/interviewsfront', $data);

    }

    public function gameinterview ( int $id ) {

      $model = new InterviewsModel();
      $convert = new CommonMarkConverter([

        'allow_unsafe_links' => false,

      ]);

      $data['gameinterview'] = $model->select('body')
                                    ->where('game_id', $id)
                                    ->first();

      if ( ! empty ( $data['gameinterview'] ) ) {

        $conversion = $convert->convertToHtml( $data['gameinterview']['body'] );

        if ( ! empty ( $conversion ) ) {

          $data['gameinterview']['body'] = $conversion;

        }

        return view ( 'interviews/parts/gameinterview', $data );

      } else {

        return '';

      }

    }

    public function list () {

      $pager = \Config\Services::pager();
      $model = new InterviewsModel();
      $data['list'] = $model->select('interviews.id AS int_id, games.name, games.image, games.slug, developers.name AS dev_name')
                            ->join('games', 'games.id = interviews.game_id')
                            ->join('developers', 'developers.id = games.developer_id')
                            ->orderBy('interviews.id', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'All the Small Interviews - Stadia GamesDB!';
      $data['page_description'] = 'All the small interviews we made to developers';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, interviews";
      $data['page_image'] = base_url ( '/img/games'.$data['list'][rand( 1, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/interviews/list' );
      $data['page_twitterimagealt'] = 'Small Interviews on Stadia GamesDB!';
      $data['page_header'] = 'Small interviews list';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer');

    }

    public function interviewforms ( int $id ) {

      $model = new InterviewsModel();
      $data['interview'] = $model->where('game_id', $id )
                                  ->first();

      if ( ! empty ( $data['interview'] ) ) {

        return view ( 'interviews/updateforminterview', $data );

      } else {

        return view ( 'interviews/addforminterview' );

      }

    }

    public function saveinterviewdb () {

      $model = new InterviewsModel();

      if ( ! empty ( $this->request->getVar('id') ) ) {

        $data['id'] = $this->request->getVar('id');

      }


      $data['game_id'] = $this->request->getVar('game_id');
      $data['body'] = $this->request->getVar('body');

      $model->save($data);

      return redirect()->to('/games/'.$this->request->getVar('slug'));
    }

  }

 ?>
