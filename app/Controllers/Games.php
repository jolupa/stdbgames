<?php
  namespace App\Controllers;
  use App\Models\GamesModel;
  use Abraham\TwitterOAuth\TwitterOAuth;
  use CodeIgniter\Controller;
  helper(['text']);

  class Games extends Controller{
    //Index function
    //getProGames List all Pro Games
    //getSoonGames all the games coming
    //getLastsGames the last games added to DB
    //getLastsUpdatedGames the last games updated on DB
    //getMonthRelease the games releasing the actual month
    public function index(){
      $gamemodel = new GamesModel();
      $data['pro'] = $gamemodel->getProGames();
      $data['soon'] = $gamemodel->getSoonGames();
      $data['last'] = $gamemodel->getLastsGames();
      $data['lastupdated'] = $gamemodel->getLastsUpdatedGames();
      $data['month'] = $gamemodel->getMonthRelease();
      echo view('templates/header', $data);
      echo view('games/index', $data);
      echo view('templates/footer');
    }
    /*
    //getMonthRelease list the games releasing the same day the game we have in overview
    public function getmonthrelease(){
      $gamemodel = new GamesModel();
      $data['month'] = $gamemodel->getMonthRelease();
      return view('games/thismonth', $data);
    }
    */
    //overview is the main game view page all the game information
    public function overview($slug, $wrong = false){
      $gamemodel = new GamesModel();
      $data['game'] = $gamemodel->gameOverview($slug);
      $data['wrong'] = $wrong;
      $data['editor'] = true;
      echo view('templates/header', $data);
      echo view('games/overview', $data);
      echo view('templates/footer', $data);
    }
    //list all the games and we can filter by:
    //all -> All games
    //soon -> Games coming
    //launched -> Games already on Store
    //firstonstadia -> Games with that feature
    //stadiaexclusive -> Exclusives for the platform
    //earlyaccess -> Games on early access
    //pro -> All the Games that hit the Pro
    //rumors -> Games not confirmed for the platform
    public function list($type = 'all'){
      $gamemodel = new GamesModel();
      $data['list'] = $gamemodel->listAllGames($type);
      $data['type'] = $type;
      echo view('templates/header');
      echo view('games/list', $data);
      echo view('templates/footer');
    }
    //Games launched the same day that the game we are watching
    public function releasebydate($id, $date){
      $gamemodel = new GamesModel();
      $data['released_day'] = $gamemodel->releaseByDate($id, $date);
      return view('games/releasebydate', $data);
    }
    //Form for adding new games
    public function insertform(){
      if(session('role') == 1){
        $data['editor'] = true;
        echo view('templates/header');
        echo view('games/insert');
        echo view('templates/footer', $data);
      } else {
        $data['error'] = "You don't have permissions to see this page";
        echo view('templates/header');
        echo view('games/insert', $data);
        echo view('templates/footer');
      }
    }
    //Insert the game on DB!
    //Verufications: Name -> not empty and not on DB!
    public function creategamedb(){
      $gamemodel = new GamesModel();
      $session = \Config\Services::session();
      $error = array();
      if(is_array($gamemodel->getGameByName($this->request->getVar('name')))){
        array_push($error, "The Game exists on DB!");
      }
      if($this->request->getVar('name') === ''){
        array_push($error, "You have to put a name for the Game.");
      }
      if(!empty($error)){
        $session->setFlashdata(['error'=>$error]);
        $data['editor'] = true;
        echo view('templates/header');
        echo view('games/insert');
        echo view('templates/footer', $data);
      } else {
        $data['name'] = $this->request->getVar('name');
        $data['slug'] = strtolower(url_title($data['name']));
        $data['release'] = $this->request->getVar('release');
        $data['price'] = $this->request->getVar('price');
        $data['first_on_stadia'] = $this->request->getVar('first_on_stadia');
        $data['stadia_exclusive'] = $this->request->getVar('stadia_exclusive');
        $data['early_access'] = $this->request->getVar('early_access');
        $data['pro'] = $this->request->getVar('pro');
        $data['pro_from'] = $this->request->getVar('pro_from');
        $data['pro_till'] = $this->request->getVar('pro_till');
        $data['appid'] = $this->request->getVar('appid');
        $data['sku'] = $this->request->getVar('sku');
        $data['developer_id'] = $this->request->getVar('developer_id');
        $data['publisher_id'] = $this->request->getVar('publisher_id');
        $data['about'] = $this->request->getVar('about');
        if($this->request->getVar('rumor') !== null){
          $data['rumor'] = 1;
        } else {
          $data['rumor'] = 0;
        }
        $data['cross_play'] = $this->request->getVar('cross_play');
        $data['crowd_play'] = $this->request->getVar('crowd_choice');
        $data['cross_save'] = $this->request->getVar('cross_save');
        $data['stream_connect'] = $this->request->getVar('stream_connect');
        $data['crowd_play'] = $this->request->getVar('crowd_play');
        $data['cross_progression'] = $this->request->getVar('cross_progression');
        $data['state_share'] = $this->request->getVar('state_share');
        $data['created_at'] = date('Y-m-d H:m:s');
        if($_FILES['image']['error'] !== 4){
          if(is_dir(ROOTPATH.'/public/images') == FALSE){
            mkdir(ROOTPATH.'/public/images', 0777, true);
          }
          $newname = $data['slug'];
          $data['image'] = $newname;
          $file = $this->request->getFile('image')
                                ->move(WRITEPATH.'uploads/', $newname);
          $image = \Config\Services::image('imagick')
                    ->withFile(WRITEPATH.'uploads/'.$newname)
                    ->resize(1370, 728, true, 'width')
                    ->convert(IMAGETYPE_JPEG)
                    ->save(ROOTPATH.'public/images/'.$newname.'.jpeg');
          $imagethumb = \Config\Services::image('imagick')
                        ->withFile(WRITEPATH.'uploads/'.$newname)
                        ->fit(256, 256, 'center')
                        ->convert(IMAGETYPE_JPEG)
                        ->save(ROOTPATH.'public/images/'.$newname.'-thumb.jpeg');
          unlink(WRITEPATH.'uploads/'.$newname);
        }
        $gamemodel->createGameDb($data);
        //If the game is inserted correctly we send a Tweet
        require(ROOTPATH.'twitter.php');
        if($data['rumor'] == 1){
          $statusmessage = "RUMOR!! Game Added to DB! ".$data['name']." https://stdb.games/game/".$data['slug'];
        } else {
          $statusmessage = "Game Added to DB! ".$data['name']." https://stdb.games/game/".$data['slug'];
        }
        $connection = new TwitterOAuth($consumerkey, $consumersecret, $token, $tokensecret);
        $connection->post("statuses/update", ["status" => $statusmessage]);
        return redirect()->to('/game/'.$data['slug']);
      }
    }
    //Form to update the game on DB!
    public function updateform($slug){
      if(session('role') == 1){
        $gamemodel = new GamesModel();
        $data['game'] = $gamemodel->getGameBySlug($slug);
        $data['editor'] = true;
        echo view('templates/header');
        echo view('games/update', $data);
        echo view('templates/footer', $data);
      } else {
        $data['error'] = "You don't have permissions to see this page.";
        echo view('templates/header');
        echo view('games/update', $data);
        echo view('templates/footer');
      }
    }
    //Updating the game on DB!
    public function updategamedb(){
      $gamemodel = new GamesModel();
      $data['id'] = $this->request->getVar('id');
      $data['name'] = $this->request->getVar('name');
      $data['slug'] = $this->request->getVar('slug');
      $data['release'] = $this->request->getVar('release');
      $data['price'] = $this->request->getVar('price');
      $data['first_on_stadia'] = $this->request->getVar('first_on_stadia');
      $data['stadia_exclusive'] = $this->request->getVar('stadia_exclusive');
      $data['early_access'] = $this->request->getVar('early_access');
      $data['pro'] = $this->request->getVar('pro');
      $data['pro_from'] = $this->request->getVar('pro_from');
      $data['pro_till'] = $this->request->getVar('pro_till');
      $data['appid'] = $this->request->getVar('appid');
      $data['sku'] = $this->request->getVar('sku');
      $data['developer_id'] = $this->request->getVar('developer_id');
      $data['publisher_id'] = $this->request->getVar('publisher_id');
      $data['about'] = $this->request->getVar('about');
      if($this->request->getVar('rumor') !== null){
        $data['rumor'] = 1;
      } else {
        $data['rumor'] = 0;
      }
      $data['cross_play'] = $this->request->getVar('cross_play');
      $data['crowd_choice'] = $this->request->getVar('crowd_choice');
      $data['cross_save'] = $this->request->getVar('cross_save');
      $data['stream_connect'] = $this->request->getVar('stream_connect');
      $data['crowd_play'] = $this->request->getVar('crowd_play');
      $data['cross_progression'] = $this->request->getVar('cross_progression');
      $data['state_share'] = $this->request->getVar('state_share');
      $data['updated_at'] = date('Y-m-d H:m:s');
      if($_FILES['image']['error'] !== 4){
        if(file_exists(ROOTPATH.'public/images/'.$this->request->getVar('oldimage').'.jpeg') == TRUE){
          unlink(ROOTPATH.'public/images/'.$this->request->getVar('oldimage').'.jpeg');
        }
        if(file_exists(ROOTPATH.'public/images/'.$this->request->getVar('oldimage').'.-thumb-jpeg') == TRUE){
          unlink(ROOTPATH.'public/images/'.$this->request->getVar('oldimage').'-thumb.jpeg');
        }
        $newname = $this->request->getVar('oldimage');
        $file = $this->request->getFile('image')
                              ->move(WRITEPATH.'uploads/', $newname);
        $image = \Config\Services::image('imagick')
                  ->withFile(WRITEPATH.'uploads/'.$newname)
                  ->resize(1370, 728, true, 'width')
                  ->convert(IMAGETYPE_JPEG)
                  ->save(ROOTPATH.'public/images/'.$data['slug'].'.jpeg');
        $imagethumb = \Config\Services::image('imagick')
                      ->withFile(WRITEPATH.'uploads/'.$newname)
                      ->fit(256, 256, 'center')
                      ->convert(IMAGETYPE_JPEG)
                      ->save(ROOTPATH.'public/images/'.$data['slug'].'-thumb.jpeg');
        unlink(WRITEPATH.'uploads/'.$newname);
        $data['image'] = $this->request->getVar('oldimage');
      } else {
        $data['image'] = $this->request->getVar('oldimage');
      }
      $gamemodel->updateGameDb($data);
      //If we update the game correctly we send a tweet
      require(ROOTPATH.'twitter.php');
      //Check the update changes to compose the tweet
      if($data['rumor'] == 1){
        $statusmessage = "RUMOR!! Game Updated on DB! ".$data['name'].": https://stdb.games/game/".$data['slug'];
      } else {
        $statusmessage = "Game Updated on DB! ".$data['name'].": https://stdb.games/game/".$data['slug'];
      }
      if ($data['name'] !== $this->request->getVar('oldname')){
        $statusmessage .= ' Name updated';
      }
      if ($data['release'] !== $this->request->getVar('oldrelease')){
        $statusmessage .=' Release date updated';
      }
      if ($data['price'] !== $this->request->getVar('oldprice')){
        $statusmessage .= ' Price updated';
      }
      if ($data['first_on_stadia'] !== $this->request->getVar('oldfirst_on_stadia')){
        $statusmessage .= ' Updated First on Stadia info';
      }
      if ($data['stadia_exclusive'] !== $this->request->getVar('oldstadia_exclusive')){
        $statusmessage .= ' Updated Stadia Exclusive info';
      }
      if ($data['early_access'] !== $this->request->getVar('oldearly_access')){
        $statusmessage .= ' Updated Early Access info';
      }
      if ($data['pro'] !== $this->request->getVar('oldpro')){
        $statusmessage .= ' Updated Pro info';
      }
      if ($this->request->getVar('oldpro_from') == '' && $data['pro_from'] !== ''){
        $statusmessage .= ' Added Pro date';
      } elseif ($this->request->getVar('oldpro_from') !== '' && $data['pro_from'] !== $this->request->getVar('oldpro_from')){
        $statusmessage .= ' Updated Pro date';
      }
      if ($this->request->getVar('oldpro_till') == '' && $data['pro_till'] !== ''){
        $statusmessage .= ' Added expiring Pro date';
      } elseif ($this->request->getVar('oldpro_till') !== '' && $data['pro_till'] !== $this->request->getVar('oldpro_till')){
        $statusmessage .= ' Updated expiring Pro date';
      }
      if ($this->request->getVar('oldappid') == '' && $this->request->getVar('oldsku') == '' && $data['appid'] !== '' && $data['sku'] !== ''){
        $statusmessage .= ' Added links to Stadia Store and Direct play button';
      } elseif ($this->request->getVar('oldappid') !== '' && $this->request->getVar('oldsku') !== '' && $data['appid'] !== $this->request->getVar('oldappid') || $data['sku'] !== $this->request->getVar('oldsku')){
        $statusmessage .= ' Updated links to Stadia Store and Direct play button';
      }
      if ($data['developer_id'] !== $this->request->getVar('olddeveloper_id')){
        $statusmessage .= ' Updated Developer';
      }
      if ($data['publisher_id'] !== $this->request->getVar('oldpublisher_id')){
        $statusmessage .= ' Updated Publisher';
      }
      if ($data['cross_play'] !== $this->request->getVar('oldcross_play') || $data['cross_save'] !== $this->request->getVar('oldcross_save') || $data['crowd_play'] !== $this->request->getVar('oldcrowd_play') || $data['stream_connect'] !== $this->request->getVar('oldstream_connect') || $data['crowd_choice'] !== $this->request->getVar('oldcrowd_choice') || $data['cross_progression'] !== $this->request->getVar('oldcross_progression') || $data['state_share'] !== $this->request->getVar('oldstate_share')){
        $statusmessage .= ' Updated Game Features';
      }
      $connection = new TwitterOAuth($consumerkey, $consumersecret, $token, $tokensecret);
      $connection->post("statuses/update", ["status" => $statusmessage]);
      return redirect()->to('/game/'.$data['slug']);
    }
    //About the site page
    public function about(){
      echo view('templates/header');
      echo view('templates/about');
      echo view('templates/footer');
    }
    //A select form field for some forms
    public function allgames(){
      $gamemodel = new GamesModel();
      $data['game'] = $gamemodel->getAllGames();
      return view('games/gameselection', $data);
    }
    //In case we want to delete some game
    public function deletegame($id){
      $gamemodel = new GamesModel();
      $data[] = $gamemodel->getGameById($id);
      unlink(ROOTPATH.'public/images/'.$data[0]['image'].'.jpeg');
      unlink(ROOTPATH.'public/images/'.$data[0]['image'].'-thumb.jpeg');
      $gamemodel->deleteGame($id);
      return redirect()->to('/games');
    }
  }

?>
