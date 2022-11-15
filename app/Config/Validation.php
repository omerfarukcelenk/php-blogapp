<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

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
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $user_new = [
        'name' => [
            'rules' => 'alpha_space|max_length[100]|min_length[5]',
            'errors' => [
                'alpha_space' => 'İsim soyisim alfabetik karakter olabilir',
                'max_length' => 'İsim Soyisim en fazla 100 karakter olabilir',
                'min_length' => 'İsim Soyisim en az 5 karakter olabilir'
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email boş geçmeyiniz',
                'valid_email' => 'Eposta kuralarına uygun değil',

            ]
        ],
        'username' => [
            'rules' => 'required|alpha|max_length[25]|min_length[3]',
            'errors' => [
                'required' => "username'i boş geçmeyiniz",
                'alpha' => 'alfabetik karaktere uyumlu değil',
                'max_length' => 'Kullanıcı adı en fazla 25 karakter olabilir',
                'min_length' => 'Kullanıcı adı en az 3 karakter olabilir',
            ]
        ],
        'phone' => [
            'rules' => 'numeric|max_length[11]|min_length[10]',
            'errors' => [
                'numeric' => "telefon numarası numara ile yazılır aga",
                'max_length' => 'Telefon numarası en fazla 11 karakter olabilir',
                'min_length' => 'Telefon numarası  en az 3 karakter olabilir',
            ]
        ],
    ];
    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
