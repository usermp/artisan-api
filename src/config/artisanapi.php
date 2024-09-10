<?php

return [
    'with_key' => env('ARTISAN_WITH_KEY', false),
    'api_key'  => env('ARTISAN_API_KEY', 'YOUR KEY'),
    'allowed_commands' => [
        // General commands
        'list',
        'help',

        // Make commands
        'make:controller',
        'make:model',
        'make:migration',
        'make:seeder',
        'make:factory',
        'make:middleware',
        'make:request',
        'make:resource',
        'make:command',
        'make:event',
        'make:listener',
        'make:policy',
        'make:provider',
        'make:test',
        'make:job',
        'make:rule',
        'make:mail',
        'make:notification',

        // Migrations
        'migrate',
        'migrate:rollback',
        'migrate:refresh',
        'migrate:reset',
        'migrate:status',

        // Seeder
        'db:seed',
        'db:wipe',

        // Cache
        'cache:clear',
        'cache:forget',
        'config:clear',
        'config:cache',
        'route:cache',
        'route:clear',
        'view:cache',
        'view:clear',

        // Queue
        'queue:work',
        'queue:listen',
        'queue:restart',
        'queue:table',
        'queue:flush',

        // Maintenance
        'down',
        'up',

        // Others
        'optimize',
        'serve',
        'schedule:run',
        'schedule:work',

        // Add other commands as needed
    ],
];
