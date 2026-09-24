<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/nl/activities.php
return [
    'breadcrumb' => 'Geschiedenis',
    'title' => 'Geschiedenis :record',
    'default_datetime_format' => 'Y-m-d, H:i:s',
    'table' => [
        'field' => 'Veld',
        'old' => 'Oud',
        'new' => 'Nieuw',
        'restore' => 'Herstellen',
    ],
    'events' => [
        'updated' => 'Bewerkt',
        'created' => 'Aangemaakt',
        'deleted' => 'Verwijderd',
        'restored' => 'Hersteld',
        'restore_successful' => 'Succesvol hersteld',
        'restore_failed' => 'Herstellen mislukt',
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
