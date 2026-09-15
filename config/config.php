<?php

declare(strict_types=1);

return [
    'name' => 'Activity',
    'description' => 'Modulo per il tracciamento delle attività degli utenti',
<<<<<<< HEAD
<<<<<<< HEAD
=======
    // 'icon' => 'heroicon-o-clock',
>>>>>>> 0a02158a (.)
=======
    // 'icon' => 'heroicon-o-clock',
>>>>>>> 35d8cf69 (Initial commit)
    'icon' => 'activity-icon',
    'navigation' => [
        'enabled' => true,
        'sort' => 20,
    ],
    'routes' => [
        'enabled' => true,
        'middleware' => ['web', 'auth'],
    ],
    'providers' => [
        'Modules\\Activity\\Providers\\ActivityServiceProvider',
    ],
];
