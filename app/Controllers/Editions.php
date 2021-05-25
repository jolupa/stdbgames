<?php

  namespace App\Controllers;
  use App\Models\EditionsModel;

  class Editions extends BaseController {

    protected $helpers = ['text'];

    public function addeditionform ( int $id ) {

      $model = new EditionsModel();
      $data['editions'] = $model->where('game_id', $id)
                                ->findAll();

      if ( empty ( $data['editions'] ) ) {

        return view ( 'editions/parts/addeditionform' );

      } else {

        return view ( 'editions/parts/addeditionform', $data );

      }

    }

    public function save () {

      $model = new EditionsModel();

      if ( ! empty ( $this->request->getVar('id') ) ) {

        $data['id'] = $this->request->getVar('id');

      }

      $data['game_id'] = $this->request->getVar('game_id');
      $data['name'] = $this->request->getVar('name');
      $data['price'] = $this->request->getVar('price');
      $data['ed_appid'] = $this->request->getVar('ed_appid');
      $data['ed_sku'] = $this->request->getVar('ed_sku');
      $data['ed_preorder_appid'] = $this->request->getVar('ed_preorder_appid');
      $data['ed_preorder_sku'] = $this->request->getVar('ed_preorder_sku');
      $data['ed_demo_appid'] = $this->request->getVar('ed_demo_appid');
      $data['ed_demo_sku'] = $this->request->getVar('ed_demo_sku');
      $model->save( $data );
      return redirect()->to( '/update/game/'.$this->request->getVar('slug') );

    }

    public function editions ( int $id ) {

      $model = new EditionsModel();
      $data['editions'] = $model->where('game_id', $id)
                                ->findAll();

      if ( empty ( $data['editions'] ) ) {

        return '';

      } else {

        return view ( 'editions/parts/editions', $data );

      }

    }

  }


 ?>
