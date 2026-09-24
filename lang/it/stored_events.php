<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/it/stored_events.php
return [
    'fields' => [
        'id' => [
            'label' => 'id',
        ],
        'event_class' => [
            'label' => 'event_class',
        ],
        'properties' => [
            'label' => 'properties',
        ],
        'created_at' => [
            'label' => 'created_at',
        ],
        'updated_at' => [
            'label' => 'updated_at',
        ],
    ],
];
