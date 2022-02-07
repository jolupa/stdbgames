<?php

  namespace App\Controllers;
  use App\Models\DevelopersModel;
  use League\CommonMark\CommonMarkConverter;

  class Developers extends BaseController {

    protected $helpers = ['text'];

    public function overview ( string $slug ){

      $model = new DevelopersModel();
      $convert = new CommonMarkConverter([

        'html_input' => 'string',
        'allow_unsafe_links' => false,

      ]);

      $data['developer'] = $model->select('id, name, url, about, twitter_account')
                                  ->where('slug', $slug)
                                  ->first();

      if ( ! empty ( $data['developer']['about'] ) ) {

        $conversion = $convert->convertToHtml( $data['developer']['about'] );

        if ( ! empty ( $conversion ) ) {

          $data['developer']['about'] = $conversion;

        }

      }

      $data['page_title'] = 'Developer '.$data['developer']['name'].' - On Stadia GamesDB!';

      if ( ! empty ( $data['developer']['about'] ) ) {

        $data['page_description'] = ellipsize( $data['developer']['about'], 80, 1, '...' );

      } else {

        $data['page_description'] = "";

      }

      $data['page_keywords'] = $data['developer']['name'].', stadia, google, stream, games, cloud, online, streaming, fun, party';
      $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
      $data['page_url'] = base_url( '/developer/'.$slug );
      $data['page_twitterimagealt'] = $data['developer']['name'].' - Stadia GamesDB!';

      echo view ( 'templates/header', $data );
      echo view ( 'developers/overview', $data );
      echo view ( 'templates/footer' );

    }

    public function addformdevelopers () {

      if ( session ( 'logged' ) == false || session ( 'role' ) != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You can\'t Edit or Add content wthout being a DB! Staff' );

      } else {

        $data['page_title'] = 'Add Developer to DB!';
        $data['page_description'] = 'Page only to insert developers on DB! - Staff only';
        $data['page_keywords'] = '';
        $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
        $data['page_url'] = base_url( '/developers/add' );
        $data['page_twitterimagealt'] = 'Developer add form - Stadia GamesDB!';

        echo view ( 'templates/header', $data );
        echo view ( 'developers/addformdevelopers' );
        echo view ( 'templates/footer' );

      }

    }

    public function createdeveloperdb () {

      $data['page_title'] = 'Add Developer to DB!';
      $data['page_description'] = 'Page only to insert developers on DB! - Staff only';
      $data['page_keywords'] = '';
      $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
      $data['page_url'] = base_url( '/developers/add' );
      $data['page_twitterimagealt'] = 'Developer add form - Stadia GamesDB!';
      $model = new DevelopersModel();
      $validation = $this->validate('addDeveloper');

      if ( ! $validation ) {

        echo view ( 'templates/header', $data );
        echo view ( 'developers/addformdevelopers', [ 'validation' => $this->validator ] );
        echo view ( 'templates/footer' );

      } else {

        $data['name'] = $this->request->getVar('name');
        $data['slug'] = strtolower ( url_title ( $data['name'] ) );

        if ( ! empty ( $this->request->getVar('url') ) ) {

          $data['url'] = $this->request->getVar('url');

        }

        if ( ! empty ( $this->request->getVar('twitter_account') ) ) {

          $data['twitter_account'] = $this->request->getVar('twitter_account');

        }

        if ( ! empty ( $this->request->getVar('about') ) ) {

          $data['about'] = $this->request->getVar('about');

        }

        if ( $_FILES['image']['error'] != 4 ) {

          $file = $this->request->getFile('image')
                                ->move(WRITEPATH.'uploads', $data['slug']);

          $image = \Config\Services::image('gd')->withFile(WRITEPATH.'uploads/'.$data['slug'])
                                        ->resize(1370, 728, true, 'width')
                                        ->convert(IMAGETYPE_JPEG)
                                        ->save(ROOTPATH.'public/img/publishers/'.$data['slug'].'.jpeg');

          $imagethumb = \Config\Services::image('gd')->withFile(WRITEPATH.'uploads/'.$data['slug'])
                                              ->fit(256, 256, 'center')
                                              ->convert(IMAGETYPE_JPEG)
                                              ->save(ROOTPATH.'public/img/publishers/'.$data['slug'].'-thumb.jpeg');

          unlink(WRITEPATH.'uploads/'.$data['slug']);
          $data['image'] = $data['slug'];

        }

        $model->save( $data );
        return redirect()->to( '/developer/'.$data['slug'] );

      }

    }

    public function alldevelopers () {

      $model = new DevelopersModel();
      $data['dev_all'] = $model->select('developers.name, developers.id')
                                ->orderBy('developers.name', 'ASC')
                                ->findAll();

      return view ( 'developers/parts/alldevelopers', $data );

    }

    public function updateformdeveloper ( string $slug ) {

      if ( session ( 'logged' ) == false || session ( 'role' ) != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You can\'t Edit or Add content without being a DB! staff' );

      } else {

        $data['page_title'] = 'Update Developer on DB!';
        $data['page_description'] = 'Page only to update developers on DB! - Staff only';
        $data['page_keywords'] = '';
        $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
        $data['page_url'] = base_url( '/developers/update/'.$slug );
        $data['page_twitterimagealt'] = 'Developer update form - Stadia GamesDB!';
        $model = new DevelopersModel();
        $data['developer'] = $model->where('slug', $slug)
                                    ->first();

        echo view ( 'templates/header', $data );
        echo view ( 'developers/updateformdevelopers', $data );
        echo view ( 'templates/footer' );

      }

    }

    public function updatedeveloperdb () {

      $model = new DevelopersModel();
      $data['id'] = $this->request->getVar('id');
      $data['name'] = $this->request->getVar('name');

      if ( ! empty ( $this->request->getVar('url') ) ) {

        $data['url'] = $this->request->getVar('url');

      }

      if ( ! empty ( $this->request->getVar('twitter_account') ) ) {

        $data['twitter_account'] = $this->request->getVar('twitter_account');

      }

      if ( ! empty ( $this->request->getVar('about') ) ) {

        $data['about'] = $this->request->getVar('about');

      }

      if ( $_FILES['image']['error'] != 4 ) {

        if ( ! empty ( $this->request->getVar('old_image') ) ) {

          unlink(ROOTPATH.'public/img/developers/'.$this->request->getVar('old_image').'.jpeg' );
          unlink(ROOTPATH.'public/img/developers/'.$this->request->getVar('old_image').'-thumb.jpeg' );

        }

        $file = $this->request->getFile('image')
                              ->move(WRITEPATH.'uploads/', $this->request->getVar('slug'));

        $image = \Config\Services::image('gd')->withFile(WRITEPATH.'uploads/'.$this->request->getVar('slug'))
                                                  ->resize(1370, 728, true, 'width')
                                                  ->convert(IMAGETYPE_JPEG)
                                                  ->save(ROOTPATH.'public/img/developers/'.$this->request->getVar('slug').'.jpeg');

        $imagethumb = \Config\Services::image('gd')->withFile(WRITEPATH.'uploads/'.$this->request->getVar('slug'))
                                                        ->fit(256, 256, 'center')
                                                        ->convert(IMAGETYPE_JPEG)
                                                        ->save(ROOTPATH.'public/img/developers/'.$this->request->getVar('slug').'-thumb.jpeg');

        unlink(WRITEPATH.'uploads/'.$this->request->getVar('slug'));
        $data['image'] = $this->request->getVar('slug');

      }

      $model->save( $data );
      return redirect()->to( base_url( '/developer/'.$this->request->getVar('slug') ) );

    }

    public function numberofdevs () {

      $model = new DevelopersModel();
      $totaldevelopers = $model->findAll();

      if ( ! empty ( $totaldevelopers ) ) {

        $data['numdevs'] = count ( $totaldevelopers );
        return view ('developers/parts/numberofdevs', $data );

      } else {

        return '';

      }

    }

  }

 ?>
