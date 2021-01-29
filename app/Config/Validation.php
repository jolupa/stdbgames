<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
		'my_list'=> 'App\Views\_errors_list',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
    public $userSignup = [
        'name' => [
            'label' => 'Name',
            'rules' => 'required|is_unique[users.name]',
            'errors'=>  [
                'required' => 'You need a username',
                'is_unique' => 'Your username exists'
            ],
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required|min_length[6]|max_length[20]',
            'errors'=> [
                'required' => 'Set a Password',
                'min_length' => 'A minimum of six(6) characters',
                'max_length' => 'A maximum of twenty(20) characters'
            ],
        ],
        'accept' => [
            'label' => 'Accept',
            'rules' => 'required',
            'errors'=> [
                'required' => 'You have to accept that we are not going to sell your data to anyone.',
            ],
        ],
    ];

    public $userLogin = [
        'user' => [
            'label' => 'Name',
            'rules' => 'required',
            'errors'=>  [
                'required' => 'Username is required',
            ],
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required',
            'errors'=> [
                'required' => 'Password is required',
            ],
        ],
    ];
}
