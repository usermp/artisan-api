<?php

return [
    'with_key' => env('ARTISAN_WITH_KEY',false),
    'api_key'  => env('ARTISAN_API_KEY', 'YOUR KEY'),
    'allowed_commands' => [
        'list',
        'help',
        'make:controller',
        'make:model',
        'make:migration',
        'migrate'
        //add other command
    ],
];
