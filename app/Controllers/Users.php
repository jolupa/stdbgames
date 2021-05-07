<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Users extends BaseController {

  protected $helpers = ['text'];

  public function usersloginform () {

    $data['page_title'] = 'User Login Form - On Stadia GamesDB!';
    $data['page_description'] = 'Form Login for registered Users';
    $data['page_keywords'] = 'users, login, stadia, google, stream, games, cloud, online, streaming, fun, party';
    $data['page_image'] = base_url('/img/games/stdb_logo_big.png');
    $data['page_url'] = base_url('/users/login');
    $data['page_twitterimagealt'] ='User Login Form - Stadia GamesDB!';

    echo view ( 'templates/header', $data );
    echo view ( 'users/usersloginform' );
    echo view ( 'templates/footer' );

  }

  public function createuserdb () {

    $model = new UsersModel();
    $validation = $this->validate('usersignup');

    if ( ! $validation ) {

      $data['page_title'] = 'User Login Form - On Stadia GamesDB!';
      $data['page_description'] = 'Form Login for registered Users';
      $data['page_keywords'] = 'users, login, stadia, google, stream, games, cloud, online, streaming, fun, party';
      $data['page_image'] = base_url('/img/games/stdb_logo_big.png');
      $data['page_url'] = base_url('/users/login');
      $data['page_twitterimagealt'] ='User Login Form - Stadia GamesDB!';

      echo view ( 'templates/header', $data );
      echo view ( 'users/usersloginform', [ 'validation' => $this->validator ] );
      echo view ( 'templates/footer' );

    } else {

      $data['name'] = $this->request->getVar('name_signup');
      $data['slug'] = strtolower ( url_title ( $data['name'] ) );
      $data['email'] = $this->request->getVar('email_signup');
      $data['birth_date'] = $this->request->getVar('birth_date_signup');

      if ( ! empty ( $this->request->getVar('patreon') ) ) {

        $data['patreon_usernam'] = $this->request->getVar('patreon_username');

      }

      $data['role'] = 0;

      if ( ! empty ( $this->request->getVar('patreon_username') ) ) {

        $data['patreon_username'] = $this->request->getVar('patreon_username');

      }

      if ( ! empty ( $this->request->getVar('stadia_profile') ) ) {

        $data['stadia_profile'] = $this->request->getVar('stadia_profile');

      }

      $data['password'] = password_hash ( $this->request->getVar('password'), PASSWORD_DEFAULT );

      if ( $_FILES['image_signup']['error'] == 4 ) {

        return redirect()->back()->with( 'validation_image', 'Please, upload an Avatar to be more friendly!' );

      } else {

        $file = $this->request->getFile('image_signup')
                              ->move(WRITEPATH.'uploads', $data['slug']);
        $image = \Config\Services::image('imagick')->withFile(WRITEPATH.'uploads/'.$data['slug'])
                                                    ->fit(256, 256, 'center')
                                                    ->convert(IMAGETYPE_PNG)
                                                    ->save(ROOTPATH.'public/img/users/'.$data['slug'].'.png');

        unlink (WRITEPATH.'uploads/'.$data['slug']);
        $data['image'] = $data['slug'];

      }

      $model->save( $data );
      return redirect()->to( previous_url() );

    }

  }

  public function userslogin () {

    $model = new UsersModel();
    $validation = $this->validate('userslogin');

    $data['page_title'] = 'User Login Form - On Stadia GamesDB!';
    $data['page_description'] = 'Form Login for registered Users';
    $data['page_keywords'] = 'users, login, stadia, google, stream, games, cloud, online, streaming, fun, party';
    $data['page_image'] = base_url('/img/games/stdb_logo_big.png');
    $data['page_url'] = base_url('/users/login');
    $data['page_twitterimagealt'] ='User Login Form - Stadia GamesDB!';

    if ( ! $validation ) {

      echo view ( 'templates/header', $data );
      echo view ( 'users/usersloginform', [ 'validation' => $this->validator ] );
      echo view ( 'templates/footer' );

    } else {

      $data['name'] = $this->request->getVar('name');
      $data['password'] = $this->request->getVar('password');
      $checkname = $model->where('name', $data['name'])
                          ->first();

      if ( empty ( $checkname ) ) {

        return redirect()->to('/users/login')->with('validation', 'The username is not in DB!');

      } elseif ( password_verify ( $data['password'], $checkname['password'] ) ) {

        $gwishlists = $model->select('wishlists.game_id as w_gameid')
                              ->where('users.id', $checkname['id'])
                              ->join('wishlists', 'wishlists.user_id = users.id')
                              ->findAll();

        $glibrary = $model->select('libraries.game_id as l_gameid')
                            ->where('users.id', $checkname['id'])
                            ->join('libraries', 'libraries.user_id = users.id')
                            ->findAll();
        $glike = $model->select('likedislike.game_id AS li_gameid')
                        ->where('users.id', $checkname['id'])
                        ->where('likedislike.like', 1)
                        ->join('likedislike', 'likedislike.user_id = users.id')
                        ->findAll();
        $gdislike = $model->select('likedislike.game_id AS di_gameid')
                          ->where('users.id', $checkname['id'])
                          ->where('likedislike.dislike', 1)
                          ->join('likedislike', 'likedislike.user_id = users.id')
                          ->findAll();
        $wishlisted = array();
        $library = array();
        $like = array();
        $dislike = array();

        foreach ( $gwishlists as $wishlists ){

          array_push ( $wishlisted, $wishlists['w_gameid'] );

        }

        foreach ( $glibrary as $glibrary ) {

          array_push ( $library, $glibrary['l_gameid'] );

        }

        foreach ( $glike as $glike ) {

          array_push ( $like, $glike['li_gameid'] );

        }

        foreach ( $gdislike as $gdislike ) {

          array_push ( $dislike, $gdislike['di_gameid'] );

        }

        $session = \Config\Services::session();
        $session->set ([

          'username' => $checkname['name'],
          'slug' => $checkname['slug'],
          'user_id' => $checkname['id'],
          'role' => $checkname['role'],
          'wishlisted' => $wishlisted,
          'library' => $library,
          'likes' => $like,
          'dislikes' => $dislike,
          'logged' => true,

        ]);

        return redirect()->to( '/' );

      } else {

        return redirect()->to( '/users/login')->with('validation_pass', 'Your password is wrong');

      }

    }

  }

  public function userslogout () {

    $session = \Config\Services::session();
    $session->destroy();

    return redirect()->to( '/' );

  }

  public function profile () {

    if ( session ( 'logged' ) == false || session ( 'username' ) == null ) {

      return redirect()->to( '/' )->with( 'error_usun', 'You can\'t view your or other user(s) profile without register');

    } else {

      $model = new UsersModel();
      $data['profile'] = $model->where('slug', session('slug'))
                                ->first();

      $data['page_title'] = $data['profile']['name'].' - On Stadia GamesDB!';
      $data['page_description'] = 'Page Profile';
      $data['page_keywords'] = 'users, login, stadia, google, stream, games, cloud, online, streaming, fun, party';

      if ( ! empty ( $data['profile']['image'] ) ) {

        $data['page_image'] = base_url ( '/img/users/'.$data['profile']['image'].'.png' );

      } else {

        $data['page_image'] = base_url ( '/img/users/stdb_logo_big.png' );

      }

      $data['page_url'] = base_url('/users/profile/'.$data['profile']['slug'] );
      $data['page_twitterimagealt'] ='User Login Form - Stadia GamesDB!';

      echo view ( 'templates/header', $data );
      echo view ( 'users/profile', $data );
      echo view ( 'templates/footer' );

    }

  }

  public function resetpasswordform () {

    $data['page_title'] = 'Reset User Password - On Stadia GamesDB!';
    $data['page_description'] = 'Reset Password for registered Users';
    $data['page_keywords'] = 'users, login, reset, stadia, google, stream, games, cloud, online, streaming, fun, party';
    $data['page_image'] = base_url('/img/games/stdb_logo_big.png');
    $data['page_url'] = base_url('/users/reset');
    $data['page_twitterimagealt'] ='Reset User Password - Stadia GamesDB!';

    echo view ( 'templates/header', $data );
    echo view ( 'users/resetpasswordform' );
    echo view ( 'templates/footer' );

  }

  public function resetpassword (string $option = null ) {

    if ( $option == 'logged' ) {

      $model = new UsersModel();

      if ( empty ( $this->request->getVar( 'new_password' ) ) || empty ( $this->request->getVar( 'confirm' ) ) ) {

        return redirect()->back()->with( 'validation', 'The new Password and the Confirmation can\'t be empty' );

      } elseif ( $this->request->getVar('new_password') !== $this->request->getVar( 'confirm' ) ) {

        return redirect()->back()->with( 'validation', 'The new password and the confirmation are not the shame maybe you have to change your keyboard' );

      } elseif ( strlen ( $this->request->getVar( 'new_password' ) ) < 6 || strlen ( $this->request->getVar( 'new_password' ) ) > 20 ) {

        return redirect()->back()->with( 'validation', 'The password needs to be between 6 and 20 characters, if not you see this error' );

      } else {

        $getpass = $model->select('password')
                          ->where('id', $this->request->getVar('id'))
                          ->firts();

        if ( password_verify ( $this->request->getVar('password' ), $getpass['password'] ) ) {

          $data['id'] = $this->request->getVar('id');
          $data['password'] = password_hash ( $this->request->getVar('new_password'), PASSWORD_DEFAULT );
          $model->save( $data );

          return redirect()->back()->with( 'success', 'We changed your password correctly, remember to take note in some place' );

        } else {

          return redirect()->back()->with( 'validation', 'The Current Password is not the same that we have on DB!, you write it well?' );

        }

      }

    } else {

      $model = new UsersModel();
      $validation = $this->validate('resetpassword');

      if ( ! $validation ) {


        $data['page_title'] = 'Reset User Password - On Stadia GamesDB!';
        $data['page_description'] = 'Reset Password for registered Users';
        $data['page_keywords'] = 'users, login, reset, stadia, google, stream, games, cloud, online, streaming, fun, party';
        $data['page_image'] = base_url('/img/games/stdb_logo_big.png');
        $data['page_url'] = base_url('/users/reset');
        $data['page_twitterimagealt'] ='Reset User Password - Stadia GamesDB!';

        echo view ( 'templates/header', $data );
        echo view ( 'users/resetpasswordform', [ 'validation' => $this->validator ] );
        echo view ( 'templates/footer' );

      } else {

        $checkuser = $model->where('name', $this->request->getVar('name'))
                            ->where('email', $this->request->getVar('email'))
                            ->first();

        if ( empty ( $checkuser['name'] ) || empty ( $checkuser['email'] ) ) {

          return redirect()->to( '/users/resetpasswordform' )->with( 'validation', 'Username or Email don\'t exists on DB! Are you sure you are a registered user?');

        } else {

          $mailpass = $model->getMailPass();
          $newpass = random_string ( 'alnum', 16 );
          $newpassencrypt = password_hash ( $newpass, PASSWORD_DEFAULT );
          $data = [

            'id' => $checkuser['id'],
            'password' => $newpassencrypt,

          ];

          $model->save ( $data );
          unset ( $data );

          $email = \Config\Services::email();
          $config['protocol'] = 'smtp';
          $config['SMTPHost'] = 'smtp-relay.gmail.com';
          $config['SMTPUser'] = 'hello@stdb.games';
          $config['SMTPPass'] = $mailpass['pass'];
          $config['SMTPCrypto'] = 'tls';
          $config['SMTPPort'] = 587;
          $config['wordWrap'] = true;
          $config['wrapChars'] = 80;
          $config['mailType'] = 'text';
          $config['priority'] = 3;
          $email->initialize ( $config )
                ->setFrom ( 'hello@stdb.games', 'Stadia GamesDB!' )
                ->setTo ( $checkuser['email'] )
                ->setSubject ( 'Password Reset for Stadia GamesDB!' )
                ->setMessage ( 'Here\'s your automated generated password. \n'.$newpass.'\n Please change it when you log back on DB!.')
                ->send();

          return redirect()->to( '/users/resetpasswordform' )->with( 'success', 'We send you an email with the new password. Please change it when possible' );

        }

      }

    }

  }

  public function updateprofileform ( int $id ) {

    if ( session ( 'logged' ) == false || session ( 'user_id' ) != $id ) {

      return redirect()->to( '/' )->with( 'error_usun', 'You can only edit your user profile when logged and only your user profile');

    } else {

      $model = new UsersModel();
      $data['user'] = $model->where('id', $id )
                            ->first();
      $data['page_title'] = 'Edit User Profile Form - On Stadia GamesDB!';
      $data['page_description'] = 'Form To Edit the Profile of registered Users';
      $data['page_keywords'] = 'users, login, stadia, google, stream, games, cloud, online, streaming, fun, party, edit';
      $data['page_image'] = base_url('/img/games/stdb_logo_big.png');
      $data['page_url'] = base_url('/users/updateprofileform');
      $data['page_twitterimagealt'] ='Edit User Profile Form - Stadia GamesDB!';

      echo view ( 'templates/header', $data );
      echo view ( 'users/updateprofileform', $data );
      echo view ( 'templates/footer' );

    }

  }

  public function updateprofile () {

    $model = new UsersModel();

    $data['id'] = $this->request->getVar('id');
    $data['name'] = $this->request->getVar('name');
    $data['email'] = $this->request->getVar('email');
    $data['birth_date'] = $this->request->getVar('birth_date');

    if ( ! empty ( $this->request->getVar('patreon') ) ) {

      $data['patreon_username'] = $this->request->getVar('patreon_username');

    }

    $data['stadia_profile'] = $this->request->getVar('stadia_profile');

    if ( $_files['image']['error'] != 4 ) {

      if ( ! empty ( $this->request->getVar('old_image') ) ) {

        unlink ( WRITEPATH.'img/users/'.$this->request->getVar('old_image').'.png' );

      }

      $file = $this->request->getFile('image')
                            ->move( WRITEPATH.'uploads', $this->request->getVar('slug') );
      $image = \Config\Services::image('imagick')->withFile( WRITEPATH.'uploads/'.$this->request->getVar('slug') )
                                                  ->fit( 256, 256, 'center' )
                                                  ->convert( IMAGETYPE_PNG )
                                                  ->save( ROOTPATH.'img/users/'.$this->request->getVar('slug') );
      unlink ( WRITEPATH.'uploads/'.$this->request->getVar('slug') );
      $data['image'] = $this->request->getVar('slug');

    }

    $model->save( $data );
    return redirect()->to( '/users/profile/'.$this->request->getVar('slug') );

  }

  public function lastusers () {

    if ( session ( 'logged' ) == false || session ( 'role' ) != 1 ) {

      return '';

    } else {

      $model = new UsersModel();
      $pager = \Config\Services::pager();
      $data['users'] = $model->where('role !=', 1)
                              ->orderBy('id', 'DESC')
                              ->paginate(20, 'users');
      $data['pager'] = $model->pager;
      return view ( 'users/parts/lastusers', $data );

    }

  }

  public function changerole () {

    $model = new UsersModel();
    $data['id'] = $this->request->getVar('id');
    $data['role'] = $this->request->getVar('role');

    $model->save( $data );
    return redirect()->back();

  }

}


 ?>
