<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/de/snapshot.php
return [
    'navigation' => [
        'name' => 'Snapshot',
        'plural' => 'Snapshots',
        'group' => [
            'name' => 'Monitoraggio',
            'description' => 'Gestione degli snapshot di sistema',
        ],
        'label' => 'Snapshot',
        'sort' => '63',
        'icon' => 'activity-snapshot-animated',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
    ],
    'actions' => [
    ],
];
