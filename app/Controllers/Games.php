<?php
  namespace App\Controllers;
  use App\Models\GamesModel;
  use CodeIgniter\Controller;
  helper(['text']);

  class Games extends Controller{
    public function index(){
      $gamemodel = new GamesModel();
      $data['pro'] = $gamemodel->getProGames();
      $data['soon'] = $gamemodel->getSoonGames();
      $data['launched'] = $gamemodel->getLaunchedGames();
      $data['last'] = $gamemodel->getLastsGames();
      $data['lastupdated'] = $gamemodel->getLastsUpdatedGames();
      echo view('templates/header');
      echo view('games/index', $data);
      echo view('templates/footer');
    }
    public function overview($slug){
      $gamemodel = new GamesModel();
      $data['game'] = $gamemodel->gameOverview($slug);
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
      $val = $this->validate([
        'name'=>[
          'label'=>'Name',
          'rules'=>'required|is_unique[games.name]',
          'errors'=>[
            'required'=>'We need a name for the game',
            'is_unique'=>'The game already exists',
          ],
        ],
      ]);
      if(!$val){
        $data['editor'] = true;
        echo view('templates/header');
        echo view('games/insert',['validations'=>$this->validator]);
        echo view('templates/footer', $data);
      } else {
        $gamemodel = new GamesModel();
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
      return redirect()->to('/game/'.$data['slug']);
    }
    public function about(){
      echo view('templates/header');
      echo view('templates/about');
      echo view('templates/footer');
    }
  }

?>
