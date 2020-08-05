<?php
namespace App\Controllers;
use App\Models\DoodlesModel;
use CodeIgniter\Controller;

class Doodles extends Controller{
  public function index(){
    $doodlemodel = new DoodlesModel();
    if(session('role') == 1){
      $data['insert'] = true;
    }
    if(is_array($doodlemodel->indexDoodle())){
      $data['doodle'] = $doodlemodel->indexDoodle();
    } else {
      $data['error'] = "Theres no Stadia Doodles on DB! At this momment";
    }
    echo view('templates/header', $data);
    echo view('doodles/index', $data);
    echo view('templates/footer');
  }
  public function insertdoodle(){
    $doodlemodel = new DoodlesModel();
    $data['game_id'] = $this->request->getVar('game_id');
    if($_FILES['image']['error'] !== 4){
      if(is_dir(ROOTPATH.'/public/images/doodles') == false){
        mkdir(ROOTPATH.'/public/images/doodles', 0777, true);
      }
      $image = $data['game_id'];
      $file = $this->request->getFile('image')
                            ->move(WRITEPATH.'uploads', $image);
      $image_file = \Config\Services::image('imagick')
                  ->withFile(WRITEPATH.'uploads/'.$image)
                  ->resize(1730, 728, true, 'width')
                  ->convert(IMAGETYPE_JPEG)
                  ->save(ROOTPATH.'public/images/doodles/'.$image.'.jpeg');
      $image_thumb = \Config\Services::image('imagick')
                  ->withFile(WRITEPATH.'uploads/'.$image)
                  ->fit(512, 512, 'center')
                  ->convert(IMAGETYPE_JPEG)
                  ->save(ROOTPATH.'public/images/doodles/'.$image.'-thumb.jpeg');
      unlink(WRITEPATH.'uploads/'.$image);
      $data['image'] = $image;
    }
    $doodlemodel->createDoodleDb($data);
    return redirect()->to('/doodles');
  }
}
?>
