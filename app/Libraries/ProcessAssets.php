<?php

namespace App\Libraries;

class ProcessAssets {

  public function game ( string $name ) {

    $file = $this->request->getFile('image')
                          ->move(WRITEPATH.'uploads/', $name);

    $image = \Config\Services::image('imagick')->withFile(WRITEPATH.'uploads/'.$name)
                                              ->resize(1370, 728, true, 'width')
                                              ->convert(IMAGETYPE_JPEG)
                                              ->save(ROOTPATH.'public/img/games/'.$name.'.jpeg');

    $imagethumb = \Config\Services::image('imagick')->withFile(WRITEPATH.'uploads/'.$name)
                                                    ->fit(256, 256, 'center')
                                                    ->convert(IMAGETYPE_JPEG)
                                                    ->save(ROOTPATH.'public/img/games/'.$name.'-thumb.jpeg');

    unlink(WRITEPATH.'uploads/'.$name);

    return $name;

  }
}

 ?>
