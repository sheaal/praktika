<?php
return [
    //Класс аутентификации
    'auth' => \Src\Auth\Auth::class,
    //Клас пользователя
    'identity' => \Model\User::class,
    //Классы для middleware
    'routeMiddleware' => [
        'auth' => \Middlewares\AuthMiddleware::class,
        'admin' => \Middlewares\AdminMiddleware::class,
        'librarian' => \Middlewares\LibrarianMiddleware::class,
    ],
    'routeAppMiddleware' => [
        'csrf' => \Middlewares\CSRFMiddleware::class,
        'trim' => \Middlewares\TrimMiddleware::class,
        'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
    ],
    'validators' => [
        'required' => \Validators\RequireValidator::class,
        'unique' => \Validators\UniqueValidator::class,
        'addbook' => \Validators\AddBookValidator::class,
        'addreader' => \Validators\AddreaderValidator::class,
        'alpha' => \Validators\AddreaderValidator::class,
        'alpha_num' => \Validators\AddreaderValidator::class,
        'regex' => \Validators\AddreaderValidator::class,
        'digits' => \Validators\AddreaderValidator::class,
        'phone_no_letters' => \Validators\AddreaderValidator::class,
    ]

];
