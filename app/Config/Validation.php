<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $addDeveloper = [

		'name' => [

			'label' => 'name',
			'rules' => 'required|is_unique[developers.name]',
			'errors' => [

				'required' => 'The Developer has no name, please enter one.',
				'is_unique' => 'That developer exists on DB!',

			],

		],

	];

	public $addPublisher = [

		'name' => [

			'label' => 'name',
			'rules' => 'required|is_unique[publishers.name]',
			'errors' => [

				'required' => 'The Publisher has no name, please enter one.',
				'is_unique' => 'That developer exists on DB!',
			],

		],

	];

	public $addGame = [

		'name' => [

			'label' => 'name',
			'rules' => 'required|is_unique[games.name]',
			'errors' => [

				'required' => 'The Game has no name, please enter one',
				'is_unique' => 'The Game exists on DB!',

			],

		],

		'developer' => [

			'label' => 'developer',
			'rules' => 'required',
			'errors' => [

				'required' => 'You have to choose a developer for this game',

			],

		],

		'publisher' => [

			'label' => 'publisher',
			'rules' => 'required',
			'errors' => [

				'required' => 'You have to choose a publisher for this game',

			],

		],

		'pro_from' => [

			'label' => 'pro_from',
			'rules' => 'required_with[pro]',
			'errors' => [

				'required_with' => 'If you choose a game is pro you have to set the date it begins to be pro',

			],

		],

		'image' => [

			'label' => 'image',
			'rules' => 'uploaded[image]|max_size[image,10000]|ext_in[image,jpg,png,webp]',
			'errors' => [

				'uploaded' => 'You have to provide a file image to upload... Or maybe we have a problem on the server... Try again!',
				'max_size' => 'The maximun file size of the image is 10Mb',
				'ext_in' => 'We only admit image files such JPG, PNG or WEBP',

			],

		],

	];

	public $userslogin = [

		'email' => [

			'label' => 'email',
			'rules' => 'required',
			'errors' => [

				'required' => 'Provide your email we are not magicians!',

			],

		],

		'password' => [

			'label' => 'password',
			'rules' => 'required|min_length[6]|max_length[20]',
			'errors' => [

				'required' => 'Always is better if you set a password',
				'min_lenght' => 'Your password is under 6 characters! Put More!',
				'max_lenght' => 'Your password is above 20 characters! Put Less!',

			],

		],

	];

	public $usersignup = [

		'name_signup' => [

			'label' => 'name_signup',
			'rules' => 'required|is_unique[users.name]',
			'errors' => [

				'required' => 'Put yourself a username the random generated is not ready',
				'is_unique' => 'You are registered on DB! We don\'t have family share at this momment',

			],

		],

		'email_signup' => [

			'label' => 'email_signup',
			'rules' => 'required|valid_email',
			'errors' => [

				'required' => 'We need an email address just in case',
				'valid_email' => 'Seems like the email address is not a correct one!',

			],

		],

		'birth_date_signup' => [

			'label' => 'birth_date_signup',
			'label' => 'required',
			'errors' => [

				'required' => 'We want to know your birthdate, imagine we made something special for your birthday... Just imagine',

			],

		],

		'patreon_username' => [

			'label' => 'patreon_username',
			'rules' => 'required_with[patreon]',
			'error' => [

				'required_with' => 'Please, you said you are a Patreon supporter give us your Patreon username',

			],

		],

		'password_signup' => [

			'label' => 'password_signup',
			'rules' => 'required|min_length[6]|max_length[20]',
			'errors' => [

				'required' => 'We need a password that you remember to enter DB!',
				'min_length' => 'Put it a little more difficult, more than 6 characters',
				'max_lenght' => 'Well not too difficult, lesss than 20 characters',

			],

		],

		'confirm_signup' => [

			'label' => 'confirm_signup',
			'rules' => 'required|matches[password_signup]',
			'errors' => [

				'required' => 'You have to confirm your password, Remember it?',
				'matches' => 'Seriously... You forgot the password you put in the field before this one!?',

			],

		],

		'authorize' => [

			'label' => 'authorize',
			'rules' => 'required',
			'errors' => [

				'required' => 'Give us permission to put your username on DB!',

			],

		],

	];

	public $resetpassword = [

		'name' => [

			'label' => 'name',
			'rules' => 'required',
			'errors' => [

				'required' => 'You have to tell us your username to try to find you!',

			],

		],

		'email' => [

			'label' => 'email',
			'rules' => 'required|valid_email',
			'errors' => [

				'required' => 'To be more rigorous we need your email, to match with your name... Genious isn\'t it?',
				'valid_email' => 'Looks like the email you put is not correct',

			],

		],

	];

	public $changepassword = [

		'new_password' => [

			'label' => 'new_password',
			'rules' => 'required|min_length[6]|max_length[20]',
			'errors' => [

				'required' => 'To change the password tell us the new password you want!',
				'min_length' => 'The password length has to be 6 characters minimun',
				'max_length' => 'The password length has to be 20 characters maximun',

			],

		],

		'confirm' => [

			'label' => 'confirm',
			'rules' => 'required|matches[new_password]',
			'errors' => [

				'required' => 'Don\'t want to confirm your reluctant new password?',
				'matches' => 'Yout typed some character wrong in that new and shiny keyboard and the password and confirmation are not the same',

			],

		],

	];

	public $addprices = [

		'date' => [

			'label' => 'date',
			'rules' => 'required',
			'errors' => [

				'required' => 'We need a date to know when the deal starts',

			],

		],

	];

}
