<?php

  namespace App\Controllers;
  use App\Models\CompaniesModel;
  use League\CommonMark\CommonMarkConverter;

  class Companies extends BaseController {

    protected $helpers = ['text'];

    public function convertpubtocompanies () {
      $model = new CompaniesModel ();
      $publishers = $model->selectAll ();
      if (!empty ($publishers)) {
        foreach ($publishers as $publisher) {
          $company = $model->select ('id')
                            ->where ('name', $publisher ['name'])
                            ->first ();
          if (!empty ($company)) {
            $model->where ('id', $company ['id'])
                  ->set ('is_publisher', 1, false)
                  ->update ();
          } else {
            $model->save ($company);
          }
        }
      }
    }

    public function convertdevtocompanies () {
      $model = new CompaniesModel ();
      $developers = $model->selectAll ();
      if (!empty ($developers)) {
        foreach ($developers as $developer) {
          $company = $model->select ('id')
                            ->where ('name', $developer ['name'])
                            ->first ();
          if (empty ($company)) {
            $data ['name'] = $developer ['name'];
            $data ['slug'] = $developer ['slug'];
            $data ['url'] = $developer ['url'];
            $data ['about'] = $developer ['about'];
            $data ['image'] = $developer ['image'];
            $data ['is_developer'] = 1;
            $data ['is_publisher'] = 0;
            $model->save ($data);
          }
        }
      }
    }

    public function devpubgame ($dev_id, $pub_id) {
      $model = new CompaniesModel ();
      $data ['developer'] = $model->select ('name, slug, id')
                                  ->where ('id', $dev_id)
                                  ->first ();
      $data ['publisher'] = $model->select ('name, slug, id')
                                  ->where ('id', $pub_id)
                                  ->first ();
      $uri = current_url (true);
      if (empty ($uri->getSegment (1))) {
        //$data [$call] = true;
        return view ('companies/parts/devpubgame', $data);
      } else if ($uri->getSegment (1) == 'game') {
        $data ['outthismonth'] = false;
        $data ['discover'] = false;
        return view ('companies/parts/devpubgame.php', $data);
      }
    }

    public function overview (string $slug) {
      $model = new CompaniesModel ();
      $data['company'] = $model->select ('id, name, about, url, twitter_account')
                                ->where ('slug', $slug)
                                ->first ();
      $convert = new CommonMarkConverter([
        'html_input'=>'strip',
        'allow_unsafe_links'=>false,
      ]);
      if (!empty ($data ['company']['about'])) {
        $conversion = $convert->convertToHtml ($data ['company']['about']);
        if (!empty ($conversion)) {
          $data['company']['about'] = $conversion;
        }
      }
      $data['image'] = $model->select ('games.image')
                              ->where ('games.publisher_id', $data ['company']['id'])
                              ->orWhere ('games.developer_id', $data ['company']['id'])
                              ->join ('games', 'games.publisher_id=companies.id')
                              ->first ();
      $data ['page_title'] = $data ['company']['name'].' - On Stadia GamesDB!';
      if (!empty ($data ['company']['about'])) {
        $data['page_description'] = ellipsize( $data['company']['about'], 80, 1, '...' );
      } else {
        $data['page_description'] = "";
      }
      $data['page_keywords'] = $data['company']['name'].', stadia, google, stream, games, cloud, online, streaming, fun, party';
      $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
      $data['page_url'] = base_url( '/company/'.$slug );
      $data['page_twitterimagealt'] = $data['company']['name'].' - Stadia GamesDB!';
      echo view ('templates/header', $data);
      echo view ('companies/overview', $data);
      echo view ('templates/footer');
    }

    public function developedgames (int $developer_id) {
      $model = new CompaniesModel ();
      $data ['games_developed'] = $model->select ('games.name, games.slug, games.image, games.rumor')
                                        ->where ('games.release <', date ('Y-m-d'))
                                        ->where ('companies.id', $developer_id)
                                        ->join ('games', 'games.developer_id = companies.id')
                                        ->findAll (6);
      if (!empty ($data ['games_developed'])) {
        $data ['how_many_developed'] = $model->select ('games.developer_id')
                                              ->where ('games.release <', date ('Y-m-d'))
                                              ->where ('companies.id', $developer_id)
                                              ->join ('games', 'games.developer_id = companies.id')
                                              ->countAllResults ();
        return view ('companies/parts/developedgames', $data);
      } else {
        return '';
      }
    }

    public function publishedgames (int $publisher_id) {
      $model = new CompaniesModel ();
      $data ['games_published'] = $model->select ('games.name, games.slug, games.image, games.rumor')
                                        ->where ('games.release <', date ('Y-m-d'))
                                        ->where ('companies.id', $publisher_id)
                                        ->join ('games', 'games.publisher_id = companies.id')
                                        ->findAll (6);
      if (!empty ($data ['games_published'])) {
        $data ['how_many_published'] = $model->select ('games.publisher_id')
                                              ->where ('games.release <', date ('Y-m-d'))
                                              ->where ('companies.id', $publisher_id)
                                              ->join ('games', 'games.publisher_id = companies.id')
                                              ->countAllResults ();
        return view ('companies/parts/publishedgames', $data);
      } else {
        return '';
      }
    }

    public function futuregames (int $company_id) {
      $model = new CompaniesModel ();
      $published = $model->select ('games.name, games.slug, games.image, games.rumor')
                          ->where ('games.release >', date('Y-m-d'))
                          ->where ('companies.id', $company_id)
                          ->join ('games', 'games.publisher_id = companies.id')
                          ->findAll ();
      $developed = $model->select ('games.name, games.slug, games.image, games.rumor')
                          ->where ('games.release >', date('Y-m-d'))
                          ->where ('companies.id', $company_id)
                          ->join ('games', 'games.developer_id = companies.id')
                          ->findAll ();
      if (!empty ($published) && !empty ($developed)) {
        $i = 0;
        $tot_pub = count ($published);
        $tot_dev = count ($developed);
        while ( $i < $tot_pub) {
          if (in_array ($published [$i]['name'], $developed) == true) {
            unset ($published [$i]);
          }
          $i++;
        }
        while ($i < $tot_dev) {
          if (in_array ($developed [$i]['name'], $published) == true) {
            unset ($developed [$i]);
          }
          $i++;
        }
        if (!empty ($published) && count ($published) > 1) {
          $data ['games_future'] = array_merge ($published, $developed);
        } else {
          $data ['games_future'] = $developed;
        }
        $data ['how_many_future'] = count ($data ['games_future']);
        return view ('companies/parts/futuregames', $data);
      } elseif (!empty ($published)) {
        $data ['games_future'] = $published;
        $data ['how_many_future'] = count ($data['games_future']);
        return view ('companies/parts/futuregames', $data);
      } elseif (!empty ($developed)) {
        $data ['games_future'] =$developed;
        $data ['how_many_future'] = count ($data['games_future']);
        return view ('companies/parts/futuregames', $data);
      } else {
        return '';
      }
    }

    public function addformcompanies () {

      if ( session ( 'logged' ) == false || session ( 'role' ) != 1 ) {

        return redirect()->to( '/' );

      } else {
        $uri = current_url (true);
        $model = new CompaniesModel ();
        if ($uri->getSegment(1) == 'update') {
          $data ['company'] = $model->where ('slug', $uri->getSegment(3))
                                    ->first ();
        }
        $data['page_title'] = 'Add Company to DB!';
        $data['page_description'] = 'Page only to insert companies on DB! - Staff only';
        $data['page_keywords'] = '';
        $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
        $data['page_url'] = base_url( '/companies/add' );
        $data['page_twitterimagealt'] = 'Company add form - Stadia GamesDB!';

        echo view ( 'templates/header', $data );
        echo view ( 'companies/addformcompanies', $data );
        echo view ( 'templates/footer' );

      }

    }

    public function createdeveloperdb () {

      $data['page_title'] = 'Add Developer to DB!';
      $data['page_description'] = 'Page only to insert companies on DB! - Staff only';
      $data['page_keywords'] = '';
      $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
      $data['page_url'] = base_url( '/companies/add' );
      $data['page_twitterimagealt'] = 'Developer add form - Stadia GamesDB!';
      $model = new CompaniesModel();
      $validation = $this->validate('addDeveloper');

      if ( ! $validation ) {

        echo view ( 'templates/header', $data );
        echo view ( 'companies/addformcompanies', [ 'validation' => $this->validator ] );
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

    public function developers () {
      $model = new companiesModel();
      $data ['developers'] = $model->select('name, id')
                                    ->where ('is_developer', 1)
                                    ->orderBy('name', 'ASC')
                                    ->findAll();
      return view ( 'companies/parts/developers', $data );
    }
    public function publishers () {
      $model = new CompaniesModel ();
      $data ['publishers'] = $model->select ('name, id')
                                    ->where ('is_publisher', 1)
                                    ->orderBy ('name', 'ASC')
                                    ->findAll ();
      return view ('/companies/parts/publishers', $data);
    }

    public function updateformdeveloper ( string $slug ) {

      if ( session ( 'logged' ) == false || session ( 'role' ) != 1 ) {

        return redirect()->to( '/' )->with( 'error_adup', 'You can\'t Edit or Add content without being a DB! staff' );

      } else {

        $data['page_title'] = 'Update Developer on DB!';
        $data['page_description'] = 'Page only to update companies on DB! - Staff only';
        $data['page_keywords'] = '';
        $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
        $data['page_url'] = base_url( '/companies/update/'.$slug );
        $data['page_twitterimagealt'] = 'Developer update form - Stadia GamesDB!';
        $model = new CompaniesModel();
        $data['developer'] = $model->where('slug', $slug)
                                    ->first();

        echo view ( 'templates/header', $data );
        echo view ( 'companies/updateformcompanies', $data );
        echo view ( 'templates/footer' );

      }

    }

    public function updatedeveloperdb () {

      $model = new CompaniesModel();
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

          unlink(ROOTPATH.'public/img/companies/'.$this->request->getVar('old_image').'.jpeg' );
          unlink(ROOTPATH.'public/img/companies/'.$this->request->getVar('old_image').'-thumb.jpeg' );

        }

        $file = $this->request->getFile('image')
                              ->move(WRITEPATH.'uploads/', $this->request->getVar('slug'));

        $image = \Config\Services::image('gd')->withFile(WRITEPATH.'uploads/'.$this->request->getVar('slug'))
                                                  ->resize(1370, 728, true, 'width')
                                                  ->convert(IMAGETYPE_JPEG)
                                                  ->save(ROOTPATH.'public/img/companies/'.$this->request->getVar('slug').'.jpeg');

        $imagethumb = \Config\Services::image('gd')->withFile(WRITEPATH.'uploads/'.$this->request->getVar('slug'))
                                                        ->fit(256, 256, 'center')
                                                        ->convert(IMAGETYPE_JPEG)
                                                        ->save(ROOTPATH.'public/img/companies/'.$this->request->getVar('slug').'-thumb.jpeg');

        unlink(WRITEPATH.'uploads/'.$this->request->getVar('slug'));
        $data['image'] = $this->request->getVar('slug');

      }

      $model->save( $data );
      return redirect()->to( base_url( '/developer/'.$this->request->getVar('slug') ) );

    }

    public function numberofdevs () {

      $model = new CompaniesModel();
      $totalcompanies = $model->findAll();

      if ( ! empty ( $totalcompanies ) ) {

        $data['numdevs'] = count ( $totalcompanies );
        return view ('companies/parts/numberofdevs', $data );

      } else {

        return '';

      }

    }
    public function savecompany () {
      $model = new CompaniesModel ();
      if (session ('logged') != true && session ('role') != 1) {
        return redirect ()->to (base_url ());
      } else {
        if (!empty ($this->request->getVar ('id'))) {
          $data ['id'] = $this->request->getVar ('id');
        }
        if (!empty ($this->request->getVar ('is_developer'))) {
          $data ['is_developer'] = 1;
        } else {
          $data ['is_developer'] = 0;
        }
        if (!empty ($this->request->getVar ('is_publisher'))) {
          $data ['is_publisher'] = 1;
        } else {
          $data ['is_publisher'] = 0;
        }
        $data ['name'] = $this->request->getVar ('name');
        if (!empty ($this->request->getVar ('old_slug')) && $this->request->getVar ('old_slug') != mb_url_title ($data ['name'], '-', true)) {
          $data ['slug'] = mb_url_title ($data ['name'], '-', true);
        } else {
          $data ['slug'] = mb_url_title ($data ['name'], '-', true);
        }
        if (!empty ($this->request->getVar ('url'))) {
          $data ['url'] = $this->request->getVar ('url');
        }
        if (!empty ($this->request->getVar ('twitter_account'))) {
          $data ['twitter_account'] = $this->request->getVar ('twitter_account');
        }
        if (!empty ($this->request->getVar ('about'))) {
          $data ['about'] = $this->request->getVar ('about');
        }
        if ($_FILES['image']['error'] != 4) {
          //library for image company
        }
        $model->save ($data);
        return redirect ()->back ();
      }
    }

  }

 ?>
