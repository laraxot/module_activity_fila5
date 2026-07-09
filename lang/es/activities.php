<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/es/activities.php
return [
    'breadcrumb' => 'Historial',
    'title' => 'Historial :record',
    'default_datetime_format' => 'd/m/Y, H:i:s',
    'table' => [
        'field' => 'Campo',
        'old' => 'Anterior',
        'new' => 'Nuevo',
        'restore' => 'Restaurar',
    ],
    'events' => [
        'updated' => 'Actualizado',
        'created' => 'Creado',
        'deleted' => 'Eliminado',
        'restored' => 'Restaurado',
        'restore_successful' => 'Restauración exitosa',
        'restore_failed' => 'Restauración fallida',
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => 'Missing Group',
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => 100,
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
];
