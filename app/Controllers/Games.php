<?php

  namespace App\Controllers;
  use App\Models\GamesModel;
  use League\CommonMark\CommonMarkConverter;
  use Abraham\TwitterOAuth\TwitterOAuth;

  class Games extends BaseController {

    protected $helpers = ['text'];

    public function discover () {

      $model = new GamesModel();
      $data['discover'] = $model->select('games.id, games.name, games.slug, games.image, games.rumor, developers.name AS dev_name, games.like, games.dislike, developers.slug AS dev_slug, publishers.name AS pub_name, publishers.slug AS pub_slug')
                                ->where('release !=', '2099-01-01')
                                ->join('developers', 'developers.id = games.developer_id')
                                ->join('publishers', 'publishers.id = games.publisher_id')
                                ->orderBy('games.id', 'RANDOM')
                                ->findAll(2);
      return view('games/parts/discover', $data);

    }

    public function proslider () {

      $model = new GamesModel();
      $data['proslider'] = $model->select('games.id, games.name, games.slug, games.image, games.pro_from, games.pro_till, games.like, games.dislike')
                                ->where('pro', 1)
                                ->where('pro_from !=', '')
                                ->where('release !=', '2099-01-01')
                                ->where('pro_from <=', date('Y-m-d'))
                                ->orderBy('pro_from', 'DESC')
                                ->findAll();
      return view('games/parts/proslider', $data);

    }

    public function outthismonth ( $nextmonth = false ) {

      $model = new GamesModel();
      $data['thismonth'] = $model->select('games.id, games.name, games.slug, games.image, games.release, games.like, games.dislike, developers.name AS dev_name, developers.slug AS dev_slug, publishers.name AS pub_name, publishers.slug AS pub_slug')
                                ->where('strftime("%Y-%m", release)', date('Y-m'))
                                ->join('developers', 'developers.id = games.developer_id')
                                ->join('publishers', 'publishers.id = games.publisher_id')
                                ->orderBy('games.release', 'ASC')
                                ->findAll();
      return view('games/parts/outthismonth', $data);

    }

    public function gamesaddedupdated () {

      $model = new GamesModel();
      $data['added'] = $model->where('created_at !=', '')
                            ->orderBy('created_at', 'DESC')
                            ->findAll(3);
      $data['updated'] = $model->where('updated_at !=', '')
                              ->orderBy('updated_at', 'DESC')
                              ->findAll(3);
      return view('games/parts/gamesaddedupdated', $data);

    }

    public function overview ( string $slug ) {

      $model = new GamesModel();
      $convert = new CommonMarkConverter([
        'html_input' => 'strip',
        'allow_unsafe_links' => false,
      ]);
      $data['game'] = $model->select('games.id, games.name, games.slug, games.image, games.about, games.price, games.release, games.pro, games.pro_from, games.pro_till, games.appid, games.sku, games.rumor, games.is_f2p, games.first_on_stadia, games.stadia_exclusive, games.early_access, games.cross_play, games.cross_progression, games.multi_couch, games.multi_online, games.crowd_choice, games.cross_save, games.state_share, games.stream_connect, games.crowd_play, games.max_resolution, games.is_pxc, games.fps, games.hdr_sdr, games.like, games.dislike, games.url, games.twitter_account, games.demo_appid, games.demo_sku, games.preorder_appid, games.preorder_sku, developers.name AS dev_name, developers.slug AS dev_slug, publishers.name AS pub_name, publishers.slug AS pub_slug')
                            ->where('games.slug', $slug)
                            ->join('developers', 'developers.id = games.developer_id')
                            ->join('publishers', 'publishers.id = games.publisher_id')
                            ->first();

      if ( ! empty ( $data['game']['about'] ) ) {

        $conversion = $convert->convertToHtml($data['game']['about']);

        if ( ! empty ( $conversion) ) {

          $data['game']['about'] = $conversion;

        }

      }

      $data['page_title'] = $data['game']['name'].' - On Stadia GamesDB!';
      $data['page_description'] = ellipsize($data['game']['about'], 80, 1, '...');
      $data['page_keywords'] = $data['game']['name'].', '.$data['game']['dev_name'].', '.$data['game']['pub_name'].', stadia, google, stream, games, cloud, online, streaming, fun, party';
      $data['page_image'] = base_url('/img/games/'.$data['game']['image'].'.jpeg');
      $data['page_url'] = base_url('/game/'.$slug);
      $data['page_twitterimagealt'] = $data['game']['name'].' - Stadia GamesDB!';

      echo view('templates/header', $data);
      echo view('games/overview', $data);
      echo view('templates/footer');

    }

    public function samedayreleases ( int $id, string $release ) {

      $model = new GamesModel();
      $data['sameday'] = $model->select('games.image, games.name, games.slug')
                                ->where('release', $release)
                                ->where('release !=', '2099-01-01')
                                ->Where('id !=', $id)
                                ->findAll();
      if ( ! empty ( $data['sameday'] ) ) {

        return view ( 'games/parts/samedayreleases', $data );

      } else {

        return '';

      }

    }

    public function list () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->orderBy('games.name', 'ASC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'All the Games on DB! - Stadia GamesDB!';
      $data['page_description'] = 'All the games we have on DB!';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg');
      $data['page_url'] = base_url ( '/db/list');
      $data['page_twitterimagealt'] = 'All the Games on DB!';
      $data['page_header'] = 'All the games on DB!';

      echo view( 'templates/header', $data);
      echo view( 'templates/list', $data );
      echo view( 'templates/footer');

    }

    public function listcoming () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('release >', date('Y-m-d'))
                            ->where('release !=', '2099-01-01')
                            ->where('release !=', 'TBA')
                            ->orderBy('release', 'ASC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games Coming - Stadia GamesDB!';
      $data['page_description'] = 'All the games with a release date on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, releases";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg');
      $data['page_url'] = base_url ( '/games/coming' );
      $data['page_twitterimagealt'] = 'All the games coming to Stadia';
      $data['page_header'] = 'All the games coming to Stadia';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listnodate () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('rumor', 0)
                            ->where('release', '2099-01-01')
                            ->orWhere('release', 'TBA')
                            ->orderBy('created_at', 'ASC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games Without Date - Stadia GamesDB!';
      $data['page_description'] = 'All the games without a clear release date on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, without date";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/nodate' );
      $data['page_twitterimagealt'] = 'Games without release date on Stadia';
      $data['page_header'] = 'Games without release date';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listcouch () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('games.multi_couch', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games With Local Multiplayer - Stadia GamesDB!';
      $data['page_description'] = 'All the games with Local Multiplayer on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, local multiplayer";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/couch' );
      $data['page_twitterimagealt'] = 'Games with local multiplayer on Stadia';
      $data['page_header'] = 'Games with Couch Multiplayer';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listcrossplay () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('games.cross_play', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games With Cross Play - Stadia GamesDB!';
      $data['page_description'] = 'All the games with Cross Play on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, cross play";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/crossplay' );
      $data['page_twitterimagealt'] = 'Games with cross play on Stadia';
      $data['page_header'] = 'Games with Cross Play';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listcrossprogression () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('games.cross_progression', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games With Cross Progression - Stadia GamesDB!';
      $data['page_description'] = 'All the games with Cross Progression on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, cross progression";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/crossprogression' );
      $data['page_twitterimagealt'] = 'Games with cross progression on Stadia';
      $data['page_header'] = 'Games with Cross Progression';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listcrowdchoice () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('games.crowd_choice', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games With Crowd Choiceº - Stadia GamesDB!';
      $data['page_description'] = 'All the games with Crowd Choice on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, crowd choice";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/crowdchoice' );
      $data['page_twitterimagealt'] = 'Games with crowd choice on Stadia';
      $data['page_header'] = 'Games with Crowd Choice';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listcrowdplay () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('games.crowd_play', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games With Crowd Play - Stadia GamesDB!';
      $data['page_description'] = 'All the games with Crowd Play on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, crowd play";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/crowdplay' );
      $data['page_twitterimagealt'] = 'Games with crowd play on Stadia';
      $data['page_header'] = 'Games with Crowd Play';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listearlyaccess () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('games.early_access', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games in Early Access - Stadia GamesDB!';
      $data['page_description'] = 'All the games in Early Access on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, early access";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/earlyaccess' );
      $data['page_twitterimagealt'] = 'Games in early access on Stadia';
      $data['page_header'] = 'Games in Early Access';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listfirstonstadia () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('games.first_on_stadia', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games First on Stadia - Stadia GamesDB!';
      $data['page_description'] = 'All the games first on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, first on stadia, staida first, timed exclusives";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/firstonstadia' );
      $data['page_twitterimagealt'] = 'Games First on Stadia';
      $data['page_header'] = 'Games First on Stadia';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listfreetoplay () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('games.is_f2p', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games Free to Play - Stadia GamesDB!';
      $data['page_description'] = 'All the games free to play on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, free to play, f2p";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/freetoplay' );
      $data['page_twitterimagealt'] = 'Games free to play on Stadia';
      $data['page_header'] = 'Games Free to Play';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listlaunched () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('games.release <=', date('Y-m-d'))
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games Released - Stadia GamesDB!';
      $data['page_description'] = 'All the games released on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, catalogue, released, launched";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/launched' );
      $data['page_twitterimagealt'] = 'Games release on Stadia';
      $data['page_header'] = 'Games Released';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listonline () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor')
                            ->where('games.multi_online', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games with Online Multiplayer - Stadia GamesDB!';
      $data['page_description'] = 'All the with online multiplayer on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, online multiplayer";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/online' );
      $data['page_twitterimagealt'] = 'Games with online multiplayer on Stadia';
      $data['page_header'] = 'Games with Online Multiplayer';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listpro () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor, games.pro_from, games.pro_till')
                            ->where('games.pro_from !=', '')
                            ->where('games.pro_from <=', date('Y-m-d'))
                            ->where('release !=', '2099-01-01')
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Pro Games - Stadia GamesDB!';
      $data['page_description'] = 'All pro games on Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, pro games, pro, free, subscription";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/pro' );
      $data['page_twitterimagealt'] = 'Pro games on Stadia';
      $data['page_header'] = 'Pro Games Released';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listrumours () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor, games.pro_from, games.pro_till')
                            ->where('games.rumor', 1)
                            ->Where('games.pro_till !=', null)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Rumoured Games - Stadia GamesDB!';
      $data['page_description'] = 'All rumoured games maybe coming to Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, dates, rumours, leaks, possible";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/rumours' );
      $data['page_twitterimagealt'] = 'Rumoured games coming to Stadia';
      $data['page_header'] = 'Rumoured Games Coming to Stadia';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function listexclusives () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor, games.pro_from, games.pro_till')
                            ->where('games.stadia_exclusive', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Exclusive Games - Stadia GamesDB!';
      $data['page_description'] = 'All games exclusive for Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, exclusives";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/exclusives' );
      $data['page_twitterimagealt'] = 'Exclusives games for Stadia';
      $data['page_header'] = 'All Exclusive Games for Stadia';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function liststateshare () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor, games.pro_from, games.pro_till')
                            ->where('games.state_share', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games with State Share - Stadia GamesDB!';
      $data['page_description'] = 'All games with State Share for Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, features, state share";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/stateshare' );
      $data['page_twitterimagealt'] = 'Games with State Share for Stadia';
      $data['page_header'] = 'All Games with State Share for Stadia';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function liststreamconnect () {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['list'] = $model->select('games.name, games.image, games.slug, games.release, games.rumor, games.pro_from, games.pro_till')
                            ->where('games.stream_connect', 1)
                            ->orderBy('release', 'DESC')
                            ->paginate(44);
      $data['pager'] = $model->pager;

      $data['page_title'] = 'Games with Stream Connect - Stadia GamesDB!';
      $data['page_description'] = 'All games with stream connect for Stadia';
      $total = count ( $data['list'] );
      $data['page_keywords'] = "db, database, games, stadia, google stadia, fun, cloud gaming, gaming, gamepads, features, stream connect";
      $data['page_image'] = base_url ( '/img/games/'.$data['list'][rand( 0, $total )]['image'].'.jpeg' );
      $data['page_url'] = base_url ( '/games/streamconnect' );
      $data['page_twitterimagealt'] = 'Games with stream connect for Stadia';
      $data['page_header'] = 'All Games with Stream Connect for Stadia';

      echo view ( 'templates/header', $data );
      echo view ( 'templates/list', $data );
      echo view ( 'templates/footer' );

    }

    public function developergames ( int $id ) {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['dev_games'] = $model->select('games.id, games.rumor, games.name AS game_name, games.image AS game_image, games.slug AS game_slug, games.like, games.dislike, publishers.name AS pub_name, publishers.slug AS pub_slug')
                                  ->where('developer_id', $id)
                                  ->join('publishers', 'publishers.id = games.publisher_id')
                                  ->orderBy('games.release', 'ASC')
                                  ->paginate(44);
      $data['pager'] = $model->pager;

      return view ( 'games/parts/developergames', $data );

    }

    public function publishergames ( int $id ) {

      $pager = \Config\Services::pager();
      $model = new GamesModel();
      $data['pub_games'] = $model->select('games.id, games.rumor, games.name AS game_name, games.image AS game_image, games.slug AS game_slug, games.like, games.dislike, developers.name AS dev_name, developers.slug AS dev_slug')
                                  ->where('publisher_id', $id)
                                  ->join('developers', 'developers.id = games.developer_id')
                                  ->orderBy('games.release', 'ASC')
                                  ->paginate(44);
      $data['pager'] = $model->pager;

      return view ( 'games/parts/publishergames', $data );

    }

    public function like ( int $id ) {

      if ( session ( 'logged' ) == true ) {

        $model = new GamesModel();
        $session = \Config\Services::session();
        $total = count ( session ('likes') );
        $session->push ( 'likes', [ $total => $id ] );
        $model->where('id', $id)
              ->set('like', 'like+1', false)
              ->update();
        $data = [

          'user_id' => session ( 'user_id' ),
          'game_id' => $id,
          'like' => 1,

        ];
        $model->updatelikedislike( $data );

        return redirect()->to( previous_url () );

      } else {

        return redirect()->back()->with('error_lidi', 'You have to Sign Up or Log In to Like or Dislike');

      }

    }

    public function dislike ( int $id ) {

      if ( session ( 'logged' ) == true ) {

        $model = new GamesModel();
        $session = \Config\Services::session();
        $total = count ( session ( 'dislikes') );
        $session->push ( 'dislikes', [ $total => $id ] );
        $model->where('id', $id)
              ->set('dislike', 'dislike+1', false)
              ->update();
        $data = [

          'user_id' => session ( 'user_id' ),
          'game_id' => $id,
          'dislike' => 1,

        ];
        $model->updatelikedislike( $data );

        return redirect()->to( previous_url () );

      } else {

        return redirect()->to( previous_url () )->with( 'error_lidi', 'You have to Sign Up or Log In to Like or Dislike' );

      }

    }

    public function mostliked () {

      $model = new GamesModel();
      $data['mostliked'] = $model->select('name, image, slug, like as total')
                                  ->orderBy('total', 'DESC')
                                  ->findAll(6);

      return view ( 'games/parts/mostliked', $data );

    }

    public function addformgames () {

      if ( session( 'logged') == false || session ( 'role') != 1 ) {

        return redirect()->to( '/' )->with( 'error_usun', 'You can\'t create games on DB! if you are not a DB! Staff' );

      } else {

        $data['page_title'] = 'Add Game to DB!';
        $data['page_description'] = 'Page only to insert games on DB! - Staff only';
        $data['page_keywords'] = '';
        $data['page_image'] = base_url( '/img/games/stdb_logo_big.png' );
        $data['page_url'] = base_url( '/games/add' );
        $data['page_twitterimagealt'] = 'Games add form - Stadia GamesDB!';

        echo view ( 'templates/header', $data );
        echo view ( 'games/addformgames' );
        echo view ( 'templates/footer' );

      }

    }

    public function creategamedb () {

      $data['page_title'] = 'Add Game to DB!';
      $data['page_description'] = "Page only to insert games on DB! - Staff only";
      $data['page_keywords'] = '';
      $data['page_image'] = base_url( '/img/games/stdb_logo_big.png' );
      $data['page_url'] = base_url( '/games/add' );
      $data['page_twitterimagealt'] = 'Game add form - Stadia GamesDB!';
      $model = new GamesModel();
      $validation = $this->validate('addGame');

      if ( ! $validation ) {

        echo view ( 'templates/header', $data );
        echo view ( 'games/addformgames', [ 'validation' => $this->validator ] );
        echo view ( 'templates/footer' );

      } else {

        if ( ! empty ( $this->request->getVar('rumor') ) ) {

          $data['rumor'] = 1;

        }

        $data['name'] = $this->request->getVar('name');
        $data['slug'] = strtolower( url_title ( $data['name'] ) );

        if ( ! empty ( $this->request->getVar('url') ) ) {

          $data['url'] = $this->request->getVar('url');

        }

        if ( ! empty ( $this->request->getVar('twitter_account') ) ) {

          $data['twitter_account'] = $this->request->getVar('twitter_account');

        }

        $data['release'] = $this->request->getVar('release');

        if ( ! empty ( $this->request->getVar('price') ) ) {

          $data['price'] = $this->request->getVar('price');

        }

        if ( ! empty ($this->request->getVar('is_f2p') ) ) {

          $data['is_f2p'] = 1;

        }

        if ( ! empty ( $this->request->getVar('about') ) ) {

          $data['about'] = $this->request->getVar('about');

        }

        if ( $_FILES['image']['error'] == 4 ){

          return redirect()->back()->withInput()->with('validation', 'You have to upload an image for the game');

        } else {

          $file = $this->request->getFile('image')
                                ->move(WRITEPATH.'uploads', $data['slug']);

          $image = \Config\Services::image('imagick')->withFile(WRITEPATH.'uploads/'.$data['slug'])
                                        ->resize(1370, 728, true, 'width')
                                        ->convert(IMAGETYPE_JPEG)
                                        ->save(ROOTPATH.'public/img/games/'.$data['slug'].'.jpeg');

          $imagethumb = \Config\Services::image('imagick')->withFile(WRITEPATH.'uploads/'.$data['slug'])
                                              ->fit(256, 256, 'center')
                                              ->convert(IMAGETYPE_JPEG)
                                              ->save(ROOTPATH.'public/img/games/'.$data['slug'].'-thumb.jpeg');

          unlink(WRITEPATH.'uploads/'.$data['slug']);
          $data['image'] = $data['slug'];

        }

        if ( ! empty ( $this->request->getVar('developer') ) ) {

          $data['developer_id'] = $this->request->getVar('developer');

        }

        if ( ! empty ( $this->request->getVar('publisher') ) ) {

          $data['publisher_id'] = $this->request->getVar('publisher');

        }

        if ( ! empty ( $this->request->getVar('first_on_stadia') ) ) {

          $data['first_on_stadia'] = 1;

        }

        if ( ! empty ( $this->request->getVar('stadia_exclusive') ) ) {

          $data['stadia_exclusive'] = 1;

        }

        if ( ! empty ( $this->request->getVar('early_access') ) ) {

          $data['early_access'] = 1;

        }

        if ( ! empty ( $this->request->getVar('pro') ) ) {

          $data['pro'] = 1;
          $data['pro_from'] = $this->request->getVar('pro_from');

        }

        if ( ! empty ( $this->request->getVar('pro_till') ) ) {

          $data['pro_till'] = $this->request->getVar('pro_till');

        }

        if ( ! empty ( $this->request->getVar('cross_play') ) ) {

          $data['cross_play'] = 1;

        }

        if ( ! empty ( $this->request->getVar('cross_progression') ) ) {

          $data['cross_progression'] = 1;

        }

        if ( ! empty ( $this->request->getVar('stream_connect') ) ) {

          $data['stream_connect'] = 1;

        }

        if ( ! empty ( $this->request->getVar('crowd_choice') ) ) {

          $data['crowd_choice'] = 1;

        }

        if ( ! empty ( $this->request->getVar('crowd_play') ) ) {

          $data['crowd_play'] = 1;

        }

        if ( ! empty ( $this->request->getVar('state_share') ) ) {

          $data['state_share'] = 1;

        }

        if ( ! empty ( $this->request->getVar('multi_couch') ) ) {

          $data['multi_couch'] = 1;

        }

        if ( ! empty ( $this->request->getVar('multi_online') ) ) {

          $data['multi_online'] = 1;

        }

        if ( ! empty ( $this->request->getVar('is_pxc') ) ) {

          $data['is_pxc'] = 1;
          $data['max_resolution'] = $this->request->getVar('max_resolution');
          $data['fps'] = $this->request->getVar('fps');
          $data['hdr_sdr'] = $this->request->getVar('hdr_sdr');

        }

        if ( ! empty ( $this->request->getVar('appid') ) ) {

          $data['appid'] = $this->request->getVar('appid');
          $data['sku'] = $this->request->getVar('sku');

        }

        if ( ! empty ( $this->request->getVar('demo_appid') ) ) {

          $data['demo_appid'] = $this->request->getVar('demo_appid');
          $data['demo_sku'] = $this->request->getVar('demo_sku');

        }

        if ( ! empty ( $this->request->getVar('preorder_appid') ) ) {

          $data['preorder_appid'] = $this->request->getVar('preorder_appid');
          $data['preorder_sku'] = $this->request->getVar('preorder_sku');

        }

        $model->save($data);

        if ( ! empty ( $this->request->getVar('tweet') ) ) {

          require ( ROOTPATH.'twitter.php' );

          if ( $data['rumor'] == 1 ) {

            $statusmessage = 'A new '.$data['name'].' on DB! Be careful is a RUMOR! but you can like, dislike or add it to your library or wishlist! https://stdb.games/game/'.$data['slug'];

          } else {

            $statusmessage = 'A new '.$data['name'].' on DB! Like, dislike add it to your wishlist or library and tell us what you think! https://stdb.games/game/'.$data['slug'];

          }

          $connection = new TwitterOAuth ( $consumerkey, $consumersecret, $token, $tokensecret );
          $connection->post ( 'statuses/update', [ 'status' => $statusmessage ] );

        }

        return redirect()->to('/game/'.$data['slug']);

      }

    }

    public function updateformgames ( string $slug ) {

      if ( session ( 'logged' ) == false && session ( 'role' ) != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You can\'t edit internal page data without being a DB! staff');

      } else {

        $model = new GamesModel();
        $data['game'] = $model->where('slug', $slug)
                              ->first();

        $data['page_title'] = 'Update Game on DB!';
        $data['page_description'] = 'Page only to update game on DB! - Staff only';
        $data['page_keywords'] = '';
        $data['page_image'] = base_url( '/img/games/stdb_logo_big.png' );
        $data['page_url'] = base_url( '/games/update/'.$slug );
        $data['page_twitterimagealt'] = 'Games update form - Stadia GamesDB!';

        echo view ( 'templates/header', $data );
        echo view ( 'games/updateformgames', $data );
        echo view ( 'templates/footer' );

      }

    }

    public function updategamedb () {

      $model = new GamesModel();

      if ( ! empty ( $this->request->getVar('rumor') ) ) {

        $data['rumor'] = 1;

      } else {

        $data['rumor'] = 0;

      }

      $data['id'] = $this->request->getVar('id');
      $data['name'] = $this->request->getVar('name');

      if ( ! empty ( $this->request->getVar('url') ) ) {

        $data['url'] = $this->request->getVar('url');

      }

      if ( ! empty ( $this->request->getVar('twitter_account') ) ) {

        $data['twitter_account'] = $this->request->getVar('twitter_account');

      }

      $data['release'] = $this->request->getVar('release');
      $data['price'] = $this->request->getVar('price');

      if ( ! empty ( $this->request->getVar('is_f2p') ) ) {

        $data['is_f2p'] = 1;

      } else {

        $data['is_f2p'] = 0;

      }

      if ( ! empty ( $this->request->getVar('about') ) ) {

        $data['about'] = $this->request->getVar('about');

      }

      if ( $_FILES['image']['error'] != 4 ) {

        if ( ! empty ( $this->request->getVar('oldimage') ) ) {

          unlink(ROOTPATH.'public/img/games/'.$this->request->getVar('oldimage').'.jpeg' );
          unlink(ROOTPATH.'public/img/games/'.$this->request->getVar('oldimage').'-thumb.jpeg' );

        }

        $file = $this->request->getFile('image')
                              ->move(WRITEPATH.'uploads/', $data['slug']);

        $image = \Config\Services::image('imagick')->withFile(WRITEPATH.'uploads/'.$this->request->getVar('slug'))
                                                  ->resize(1370, 728, true, 'width')
                                                  ->convert(IMAGETYPE_JPEG)
                                                  ->save(ROOTPATH.'public/img/games/'.$this->request->getVar('slug').'.jpeg');

        $imagethumb = \Config\Services::image('imagick')->withFile(WRITEPATH.'uploads/'.$this->request->getVar('slug'))
                                                        ->fit(256, 256, 'center')
                                                        ->convert(IMAGETYPE_JPEG)
                                                        ->save(ROOTPATH.'public/img/games/'.$this->request->getVar('slug').'-thumb.jpeg');

        unlink(WRITEPATH.'uploads/'.$this->request->getVar('slug'));
        $data['image'] = $this->request->getVar('slug');

      }

      $data['developer_id'] = $this->request->getVar('developer');
      $data['publisher_id'] = $this->request->getVar('publisher');

      if ( ! empty ( $this->request->getVar('first_on_stadia') ) ) {

        $data['first_on_stadia'] = 1;

      } else {

        $data['first_on_stadia'] = 0;

      }

      if ( ! empty ( $this->request->getVar('stadia_exclusive') ) ) {

        $data['stadia_exclusive'] = 1;

      } else {

        $data['stadia_exclusive'] = 0;

      }

      if ( ! empty ( $this->request->getVar('early_access') ) ) {

        $data['early_access'] = 1;

      } else {

        $data['early_access'] = 0;

      }

      if ( ! empty ( $this->request->getVar('pro') ) ) {

        $data['pro'] = 1;
        $data['pro_from'] = $this->request->getVar('pro_from');

      } else {

        $data['pro'] = 0;

      }

      if ( ! empty ( $this->request->getVar('pro_till') ) ) {

        $data['pro_till'] = $this->request->getVar('pro_till');

      }

      if ( ! empty ( $this->request->getVar('cross_play') ) ) {

        $data['cross_play'] = 1;

      } else {

        $data['cross_play'] = 0;

      }

      if ( ! empty ( $this->request->getVar('cross_progression') ) ) {

        $data['cross_progression'] = 1;

      } else {

        $data['cross_progression'] = 0;

      }

      if ( ! empty ( $this->request->getVar('stream_connect') ) ) {

        $data['stream_connect'] = 1;

      } else {

        $data['stream_connect'] = 0;

      }

      if ( ! empty ( $this->request->getVar('crowd_choice') ) ) {

        $data['crowd_choice'] = 1;

      } else {

        $data['crowd_choince'] = 0;

      }

      if ( ! empty ( $this->request->getVar('crowd_play') ) ) {

        $data['crowd_play'] = 1;

      } else {

        $data['crowd_play'] = 0;

      }

      if ( ! empty ( $this->request->getVar('state_share') ) ) {

        $data['state_share'] = 1;

      } else {

        $data['state_share'] = 0;

      }

      if ( ! empty ( $this->request->getVar('multi_couch') ) ) {

        $data['multi_couch'] = 1;

      } else {

        $data['multi_couch'] = 0;

      }

      if ( ! empty ( $this->request->getVar('multi_online') ) ) {

        $data['multi_online'] = 1;

      } else {

        $data['multi_online'] = 0;

      }

      if ( ! empty ( $this->request->getVar('is_pxc') ) ) {

        $data['is_pxc'] = 1;
        $data['max_resolution'] = $this->request->getVar('max_resolution');
        $data['fps'] = $this->request->getVar('fps');
        $data['hdr_sdr'] = $this->request->getVar('hdr_sdr');

      } else {

        $data['is_pxc'] = 0;

        if ( ! empty ( $this->request->getVar('max_resolution') ) ) {

          $data['max_resolution'] = $this->request->getVar('max_resolution');

        }

        if ( ! empty ( $this->request->getVar('fps') ) ) {

          $data['fps'] = $this->request->getVar('fps');

        }

        if ( ! empty ( $this->request->getVar('hdr_sdr') ) ) {

          $data['hdr_sdr'] = $this->request->getVar('hdr_sdr');

        }

      }

      if ( ! empty ( $this->request->getVar('appid') ) ) {

        $data['appid'] = $this->request->getVar('appid');
        $data['sku'] = $this->request->getVar('sku');

      }

      if ( ! empty ( $this->request->getVar('preorder_appid') ) ) {

        $data['demo_appid'] = $this->request->getVar('demo_appid');
        $data['demo_sku'] = $this->request->getVar('demo_sku');

      }

      if ( ! empty ( $this->request->getVar('demo_appid') ) ) {

        $data['preorder_appid'] = $this->request->getVar('preorder_appid');
        $data['preorder_sku'] = $this->request->getVar('preorder_sku');

      }

      $model->save( $data );

      if ( ! empty ( $this->request->getVar('tweet') ) ) {

        require ( ROOTPATH.'twitter.php' );

        if ( $data['rumor'] == 1 ) {

          $statusmessage = 'Updated '.$data['name'].' on DB! Is still a rumor, so be carefull with espectations. But like it, dislike it or add to wishlist or library https://stdb.games/game/'.$data['slug'];

        } else {

          $statusmessage = 'Updated '.$data['name'].' on DB!. Like it dislike it or add it to your wishlist or library! https://stdb.games/game/'.$data['slug'];

        }

        $connection = new TwitterOAuth ( $consumerkey, $consumersecret, $token, $tokensecret );
        $connection->post ( 'statuses/update', [ 'status' => $statusmessage ] );

      }

      return redirect()->to('/game/'.$this->request->getVar('slug'));

    }

    public function deletegame ( int $id ) {

      $model = new GamesModel();
      $model->delete( $id );

      return redirect()->to( '/')->with( 'error_del', 'Deleted succesfully');

    }

    public function stats () {

      $model = new GamesModel();
      $totalgames = $model->findAll();
      $gameslaunched = $model->where('release <', date('Y-m-d'))
                              ->findAll();
      $waitinglaunch = $model->where('release >', date('Y-m-d'))
                              ->where('release !=', '2099-01-01')
                              ->where('rumor', 0)
                              ->findAll();
      $allprogames = $model->where('pro_till !=', '')
                            ->findAll();
      $rumors = $model->where('rumor', 1)
                      ->findAll();
      $nodate = $model->where('release', '2099-01-01')
                      ->where('rumor', 0)
                      ->findAll();

      $data['total'] = count ( $totalgames );
      $data['launched'] = count ( $gameslaunched );
      $data['waiting'] = count ( $waitinglaunch );
      $data['totalpro'] = count ( $allprogames );
      $data['rumors'] = count ( $rumors );
      $data['nodate'] = count ( $nodate );

      return view ( 'games/parts/stats', $data );

    }

  }

 ?>
