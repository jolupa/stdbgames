<?php

	namespace App\Controllers;
	use App\Models\MondayModel;
	use League\CommonMark\CommonMarkConverter;

	class Monday extends BaseController {

		protected $helpers = ['text'];

		public function save () {

			$model = new MondayModel();

			if ( ! empty ( $this->request->getVar('id') ) ) {

				$data['id'] = $this->request->getVar('id');

			}

			if ( ! empty ( $this->request->getVar('title') ) ) {

				$data['title'] = $this->request->getVar('title');

			} else {

				return redirect()->back()->withInput()->with('validation', 'You have to provide a Title for the Entry');

			}

			if ( ! empty ( $this->request->getVar('slug') ) ) {

				$data['slug'] = $this->request->getVar('slug');

			} else {

				$data['slug'] = strtolower( url_title  ( $data['title'] ) );

			}

			if ( ! empty ( $this->request->getVar('published') ) ) {

				$data['published'] = 1;

			} else {

				$data['published'] = 0;

			}

			if ( ! empty ( $this->request->getVar('date') ) ) {

					$data['date'] = $this->request->getVar('date');

			} else {

				return redirect()->back()->withInput()->with('validation_date', 'Select a date to Release');

			}

			$model->save( $data );

			}

			public function entryform () {

				if ( session ('logged') == false || session ('role') != 1 ) {

					return redirect()->to('/')->with( 'adup', 'You can\'t Edit or Add content without being a DB! Staff' );

				} else {

					$data['page_title'] = 'Add a new The Monday Reminder';
	        $data['page_description'] = 'The Monday Reminder add form - Staff Only';
	        $data['page_keywords'] ='';
	        $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
	        $data['page_url'] = base_url( '/monday/addform' );
	        $data['page_twitterimagealt'] = 'Add a new The Monday Reminder - Staff Only';

					echo view ( 'templates/header', $data );
					echo view ( 'monday/addform' );
					echo view ( 'templates/footer' );

				}

			}

			public function editform ( string $slug ) {

				if ( session ('logged') == false || session ('role') != 1 ) {

					return redirect()->to('/')->with('adup', 'You can\'t Edit or Add content without being a DB! Staff');

				} else {

					$data['page_title'] = 'Update a The Monday Reminder';
	        $data['page_description'] = 'The Monday Reminder add form - Staff Only';
	        $data['page_keywords'] ='';
	        $data['page_image'] = base_url( '/img/stdb_logo_big.png' );
	        $data['page_url'] = base_url( '/monday/editform' );
	        $data['page_twitterimagealt'] = 'Update The Monday Reminder - Staff Only';

					$model = new MondayModel();
					$data['monday'] = $model->where('slug', $slug)
																	->first();

					echo view ('templates/header', $data);
					echo view ('monday/editform', $data);
					echo view ('templates/footer');

				}

			}

			public function showmonday ( string $slug ) {

				$model = new MondayModel();
				$convert = new CommonMarkConverter();
				$data['monday'] = $model->where('slug', $slug)
																->first();

				$conversion = $convert->convertToHtml($data['monday']['entry']);
				$data['monday']['entry'] = $conversion;

				$data['page_title'] = $data['monday']['title'].' - Stadia GamesDB!';
				$data['page_description'] = 'The Monday Reminder a Stadia news recap';
				$data['page_keywords'] ='stadia, news, games, cloud gaming';
				$data['page_image'] = base_url( '/img/stdb_logo_big.png' );
				$data['page_url'] = base_url( '/monday/'.$data['monday']['slug'] );
				$data['page_twitterimagealt'] = 'The Stadia Reminder a Stadia news recap';

				$data['premonday'] = $model->select('title, slug')
																		->where('id', $data['monday']['id']-1)
																		->first();

				$data['nextmonday'] = $model->select('title,slug')
																		->where('id', $data['monday']['id']+1)
																		->first();

				echo view ( 'templates/header', $data );
				echo view ( 'monday/showmonday', $data );
				echo view ( 'templates/footer' );

			}

		}

 ?>
