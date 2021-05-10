<?php

  namespace App\Controllers;
  use App\Models\GamesModel;
  use App\Models\DevelopersModel;
  use App\Models\PublishersModel;

  class Search extends BaseController {

    protected $helpers = ['text'];

    public function search () {

      if ( empty ( $this->request->getVar('keyword') ) ) {

        return redirect()->to( '/' )->with('error_sear', 'If you can\'t tell us what are searching is not easy');

      } else {

        $modelg = new GamesModel();
        $modeld = new DevelopersModel();
        $modelp = new PublishersModel();

        $data['games'] = $modelg->select('id, name, slug, image')
                                ->like('name', $this->request->getVar('keyword'))
                                ->orLike('about', $this->request->getVar('keyword'))
                                ->where('deleted_at', '')
                                ->findAll();
        $data['developers'] = $modeld->select('id, name, slug, image')
                                ->like('name', $this->request->getVar('keyword'))
                                ->orLike('about', $this->request->getVar('keyword'))
                                ->findAll();
        $data['publishers'] = $modelp->select('id, name, slug, image')
                                ->like('name', $this->request->getVar('keyword'))
                                ->orLike('about', $this->request->getVar('keyword'))
                                ->findAll();

        $data['page_title'] = 'Search results for '.$this->request->getVar('keyword').' - On Stadia GamesDB!';
        $data['page_description'] = 'Search Results page on DB!';
        $data['page_keywords'] = 'stadia, google, stream, games, cloud, online, streaming, fun, party, search';
        $data['page_image'] = base_url('/img/stdb_logo_big.png');
        $data['page_url'] = base_url('');
        $data['page_twitterimagealt'] = 'Search - Stadia GamesDB!';

        echo view ( 'templates/header', $data );

        if ( ! empty ( $data['games'] ) ) {

          echo view ( 'search/parts/games', $data );

        }

        if ( ! empty ( $data['developers'] ) ) {

          echo view ( 'search/parts/developers', $data );

        }

        if ( ! empty ( $data['publishers'] ) ) {

          echo view ( 'search/parts/publishers', $data );

        }

        echo view ( 'templates/footer' );

      }

    }

  }

 ?>
