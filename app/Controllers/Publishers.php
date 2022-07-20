<?php

  namespace App\Controllers;
  use App\Models\PublishersModel;
  use League\CommonMark\CommonMarkConverter;

  class Publishers extends BaseController {

    protected $helpers = ['text'];

    public function overview ( string $slug ){

      $model = new PublishersModel();
      $data['publisher'] = $model->where('slug', $slug)
                                  ->first();
      $convert = new CommonMarkConverter([

        'html_input' => 'string',
        'allow_unsafe_links' => false,

      ]);

      if ( ! empty ( $data['publisher']['about'] ) ) {

        $conversion = $convert->convertToHtml( $data['publisher']['about'] );

        if ( ! empty ( $conversion ) ) {

          $data['publisher']['about'] = $conversion;

        }

      }

      $data['page_title'] = 'Publisher '.$data['publisher']['name'].' - On Stadia GamesDB!';

      if ( ! empty ( $data['publisher']['about'] ) ) {

        $data['page_description'] = ellipsize( $data['publisher']['about'], 80, 1, '...' );

      } else {

        $data['page_description'] = "";

      }

      $data['page_keywords'] = $data['publisher']['name'].', stadia, google, stream, games, cloud, online, streaming, fun, party';
      $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
      $data['page_url'] = base_url( '/publisher/'.$slug );
      $data['page_twitterimagealt'] = $data['publisher']['name'].' - Stadia GamesDB!';

      echo view ( 'templates/header', $data );
      echo view ( 'publishers/overview', $data );
      echo view ( 'templates/footer' );

    }

    public function addformpublishers () {

      $data['page_title'] = 'Add Publisher to DB!';
      $data['page_description'] = "Page only to insert publishers on DB! - Staff only";
      $data['page_keywords'] = '';
      $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
      $data['page_url'] = base_url( '/publishers/add' );
      $data['page_twitterimagealt'] = 'Publisher add form - Stadia GamesDB!';

      echo view ( 'templates/header', $data );
      echo view ( 'publishers/addformpublishers' );
      echo view ( 'templates/footer' );

    }

    public function updateformpublisher ( string $slug ) {

      if ( session ( 'logged' ) == false || session ( 'role' ) != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You can\'t Edit or Add content without being a DB! staff' );

      } else {

        $data['page_title'] = 'Update Publisher on DB!';
        $data['page_description'] = 'Page only to update publishers on DB! - Staff only';
        $data['page_keywords'] = '';
        $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
        $data['page_url'] = base_url( '/publishers/update/'.$slug );
        $data['page_twitterimagealt'] = 'Publisher update form - Stadia GamesDB!';
        $model = new PublishersModel();
        $data['publisher'] = $model->where('slug', $slug)
                                    ->first();

        echo view ( 'templates/header', $data );
        echo view ( 'publishers/updateformpublishers', $data );
        echo view ( 'templates/footer' );

      }

    }

    public function createpublisherdb () {

      if ( session ( 'logged' ) == false || session ( 'role' ) != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You can\'t Edit or Add content without being a DB! staff' );

      } else {

        $data['page_title'] = 'Add Publisher to DB!';
        $data['page_description'] = "Page only to insert publishers on DB! - Staff only";
        $data['page_keywords'] = '';
        $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
        $data['page_url'] = base_url( '/publishers/add' );
        $data['page_twitterimagealt'] = 'Publisher add form - Stadia GamesDB!';
        $model = new PublishersModel();
        $validation = $this->validate('addPublisher');

        if ( ! $validation ) {

          echo view ( 'templates/header', $data );
          echo view ( 'publishers/addformpublishers', [ 'validation' => $this->validator ] );
          echo view ( 'templates/footer' );

        } else {

          $model = new PublishersModel();
          $data['name'] = $this->request->getVar('name');
          $data['slug'] = strtolower( url_title ( $data['name'] ) );

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
            $image = \Config\Services\image('gd')->withFile(WRITEPATH.'uploads/'.$data['slug'])
                                                      ->resize(1370, 728, 'width')
                                                      ->convert(IMAGETYPE_JPEG)
                                                      ->save(ROOTPATH.'publi/img/publishers/'.$data['slug'].'.jpeg');
            $imagethumb = \Config\Services\image('gd')->withFile(WRITEPATH.'uploads/'.$data['slug'])
                                                            ->fit(256, 256, 'center')
                                                            ->convert(IMAGETYPE_JPEG)
                                                            ->save(ROOTPATH.'public/img/publishers/'.$data['slug'].'-thumb.jpeg');
            unlink (WRITEPATH.'uploads/'.$data['slug']);
            $data['image'] = $data['slug'];

          }

          $model->save( $data );
          return redirect()->to( '/publisher/'.$data['slug'] );

        }

      }

    }

    public function updatepublisherdb () {

      if ( session ( 'logged' ) == false || session ( 'role' ) != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You can\'t Edit or Add content without being a DB! staff' );

      } else {

        $model = new PublishersModel();
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

            unlink(ROOTPATH.'public/img/publishers/'.$this->request->getVar('old_image').'.jpeg' );
            unlink(ROOTPATH.'public/img/publishers/'.$this->request->getVar('old_image').'-thumb.jpeg' );

          }

          $file = $this->request->getFile('image')
                                ->move(WRITEPATH.'uploads/', $this->request->getVar('slug'));

          $image = \Config\Services::image('gd')->withFile(WRITEPATH.'uploads/'.$this->request->getVar('slug'))
                                                    ->resize(1370, 728, true, 'width')
                                                    ->convert(IMAGETYPE_JPEG)
                                                    ->save(ROOTPATH.'public/img/publishers/'.$this->request->getVar('slug').'.jpeg');

          $imagethumb = \Config\Services::image('gd')->withFile(WRITEPATH.'uploads/'.$this->request->getVar('slug'))
                                                          ->fit(256, 256, 'center')
                                                          ->convert(IMAGETYPE_JPEG)
                                                          ->save(ROOTPATH.'public/img/publishers/'.$this->request->getVar('slug').'-thumb.jpeg');

          unlink(WRITEPATH.'uploads/'.$this->request->getVar('slug'));
          $data['image'] = $this->request->getVar('slug');

        }

        $model->save( $data );
        return redirect()->to( base_url( '/publisher/'.$this->request->getVar('slug') ) );

      }

    }

    public function allpublishers () {

      $model = new PublishersModel();
      $data['pub_all'] = $model->select('publishers.name, publishers.id')
                                ->orderBy('publishers.name', 'ASC')
                                ->findAll();

      return view ( 'publishers/parts/allpublishers', $data );

    }

    public function numberofpubs () {

      $model = new PublishersModel();
      $totalpublishers = $model->findAll();

      if ( ! empty ( $totalpublishers ) ) {

        $data['numpubs'] = count ( $totalpublishers );
        return view ( 'publishers/parts/numberofpubs', $data );

      } else {

        return '';

      }

    }

  }

 ?>
