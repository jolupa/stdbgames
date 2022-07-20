<?php

  namespace App\Controllers;
  use App\Models\GamesModel;

  class Search extends BaseController {

    protected $helpers = ['text'];

    public function search () {
      $model = new GamesModel ();
      $data ['no_search_result'] = false;
      if (empty ($this->request->getVar ('keyword'))) {
        $data['page_title'] = 'Search results for Ooops... - On Stadia GamesDB!';
        $data['page_description'] = 'Search Results page on DB!';
        $data['page_keywords'] = 'stadia, google, stream, games, cloud, online, streaming, fun, party, search';
        $data['page_image'] = base_url('/img/stdb_logo_big.png');
        $data['page_url'] = base_url('');
        $data['page_twitterimagealt'] = 'Search - Stadia GamesDB!';
        $data ['no_search_result'] = true;
        echo view ('templates/header', $data);
        echo view ('search/results', $data);
        echo view ('templates/footer');
      } else {
        $data ['games'] = $model->like('name', $this->request->getVar('keyword'), 'both', true, true)
                                ->where ('is_edition =', 0)
                                ->findAll();
        if (!empty ($data ['games'])) {
          $data['page_title'] = 'Search results for '.$this->request->getVar ('keyword').' - On Stadia GamesDB!';
          $data['page_description'] = 'Search Results page on DB!';
          $data['page_keywords'] = 'stadia, google, stream, games, cloud, online, streaming, fun, party, search';
          $data['page_image'] = base_url('/img/stdb_logo_big.png');
          $data['page_url'] = base_url('');
          $data['page_twitterimagealt'] = 'Search - Stadia GamesDB!';
          echo view ('templates/header', $data);
          echo view ('search/results', $data);
          echo view ('templates/footer');
        } else {
          $data['page_title'] = 'Search results for Ooops... - On Stadia GamesDB!';
          $data['page_description'] = 'Search Results page on DB!';
          $data['page_keywords'] = 'stadia, google, stream, games, cloud, online, streaming, fun, party, search';
          $data['page_image'] = base_url('/img/stdb_logo_big.png');
          $data['page_url'] = base_url('');
          $data['page_twitterimagealt'] = 'Search - Stadia GamesDB!';
          $data ['no_search_result'] = true;
          echo view ('templates/header', $data);
          echo view ('search/results', $data);
          echo view ('templates/footer');
        }
      }
    }
  }

?>
