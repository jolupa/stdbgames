<?php
  namespace App\Controllers;
  use App\Models\GamesModel;
  use Abraham\TwitterOAuth\TwitterOAuth;
  use CodeIgniter\Controller;
  helper(['text']);

  class Games extends Controller{
    public function index(){
      $gamemodel = new GamesModel();
      $data['pro'] = $gamemodel->getProGames();
      $data['soon'] = $gamemodel->getSoonGames();
      $data['last'] = $gamemodel->getLastsGames();
      $data['lastupdated'] = $gamemodel->getLastsUpdatedGames();
      $data['month'] = $gamemodel->getMonthRelease();
      echo view('templates/header');
      echo view('games/index', $data);
      echo view('templates/footer');
    }
    public function overview($slug, $wrong = false){
      $gamemodel = new GamesModel();
      $data['game'] = $gamemodel->gameOverview($slug);
      $data['wrong'] = $wrong;
      $data['editor'] = true;
      echo view('templates/header', $data);
      echo view('games/overview', $data);
      echo view('templates/footer', $data);
    }
    public function list($type = 'all'){
      $gamemodel = new GamesModel();
      $data['list'] = $gamemodel->listAllGames($type);
      $data['type'] = $type;
      echo view('templates/header');
      echo view('games/list', $data);
      echo view('templates/footer');
    }
    public function releasebydate($id, $date){
      $gamemodel = new GamesModel();
      $data['released_day'] = $gamemodel->releaseByDate($id, $date);
      return view('games/releasebydate', $data);
    }
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
        require(ROOTPATH.'twitter.php');
        if($data['rumor'] == 1){
          $statusmessage = "RUMOR!! Game Updated on DB! ".$data['name']." https://stdb.games/game/".$data['slug'];
        } else {
          $statusmessage = "Game Updated on DB! ".$data['name']." https://stdb.games/game/".$data['slug'];
        }
        $connection = new TwitterOAuth($consumerkey, $consumersecret, $token, $tokensecret);
        $connection->post("statuses/update", ["status" => $statusmessage]);
        $gamemodel->createGameDb($data);
        return redirect()->to('/game/'.$data['slug']);
      }
    }
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
      require(ROOTPATH.'twitter.php');
      if($data['rumor'] == 1){
        $statusmessage = "RUMOR!! Game Updated on DB! ".$data['name']." https://stdb.games/game/".$data['slug'];
      } else {
        $statusmessage = "Game Updated on DB! ".$data['name']." https://stdb.games/game/".$data['slug'];
      }
      $connection = new TwitterOAuth($consumerkey, $consumersecret, $token, $tokensecret);
      $connection->post("statuses/update", ["status" => $statusmessage]);
      $gamemodel->updateGameDb($data);
      return redirect()->to('/game/'.$data['slug']);
    }
    public function about(){
      echo view('templates/header');
      echo view('templates/about');
      echo view('templates/footer');
    }
    public function allgames(){
      $gamemodel = new GamesModel();
      $data['game'] = $gamemodel->getAllGames();
      return view('games/gameselection', $data);
    }
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
