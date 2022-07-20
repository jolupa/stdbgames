<?php

  namespace App\Controllers;
  use App\Models\InterviewsModel;
  use League\CommonMark\CommonMarkConverter;

  class Interviews extends BaseController {

    protected $helpers = ['text'];

    public function interviewsfront () {

      $model = new InterviewsModel();
      $data['interviewslist'] = $model->select('companies.name AS dev_name, games.name AS name, games.slug AS slug, games.image AS image')
                                      ->join('games', 'games.id = interviews.game_id')
                                      ->join('companies', 'companies.id = interviews.developer_id')
                                      ->orderBy('interviews.id', 'DESC')
                                      ->findAll(4);
      return view('interviews/parts/interviewsfront', $data);

    }
    public function interviewall () {
      $model = new InterviewsModel ();
      $data ['interviews'] = $model->select ('games.name, games.image, games.slug')
                                    ->join ('games', 'games.id = interviews.game_id')
                                    ->orderBy ('interviews.id', 'DESC')
                                    ->findAll ();
      $data['page_title'] = 'All the Small Interviews - Stadia GamesDB!';
      $data['page_description'] = 'All the small interviews we made to developers';
      $total = count ( $data ['interviews'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, interviews";
      $data['page_image'] = base_url ( '/assets/images/games'.$data ['interviews'][rand( 1, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/interviews/interviewall' );
      $data['page_twitterimagealt'] = 'Small Interviews on Stadia GamesDB!';
      $data['page_header'] = 'Small interviews list';
      echo view ('templates/header', $data);
      echo view ('interviews/interviewall', $data);
      echo view ('templates/footer');
    }

    public function gameinterview ( int $id ) {

      $model = new InterviewsModel();
      $convert = new CommonMarkConverter([

        'allow_unsafe_links' => false,

      ]);

      $data['gameinterview'] = $model->select('body, created_at')
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
    public function interviewform ($id = 0) {
      $uri = current_url (true);
      if ($uri->getSegment (1) == 'add') {
        return '';
      } else {
        if ($id == 0) {
          return view ('interviews/parts/interviewform');
        } else {
          $model = new InterviewsModel ();
          $data ['interview'] = $model->where ('game_id', $id)
                                      ->first ();
          if (!empty ($data ['interview'])) {
            return view ('interviews/parts/interviewform', $data);
          } else {
            return view ('interviews/parts/interviewform');
          }
        }
      }
    }
    public function saveinterview () {
      $model = new InterviewsModel ();
      if (!empty ($this->request->getVar ('id'))) {
        $data ['id'] = $this->request->getVar ('id');
      }
      $data ['game_id'] = $this->request->getVar ('edition_game_id');
      $data ['developer_id'] = $this->request->getVar ('developer_id');
      $data ['body'] = $this->request->getVar ('body');
      $model->save ($data);
    }
  }

 ?>
