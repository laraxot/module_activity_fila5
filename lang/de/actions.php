<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/de/actions.php
return [
    'list_log_activities' => [
        'label' => 'Verlauf',
        'tooltip' => 'Änderungsverlauf anzeigen',
        'icon' => 'heroicon-o-clock',
        'color' => 'gray',
        'modal' => [
            'heading' => 'Änderungsverlauf',
            'description' => 'Alle Änderungen an diesem Datensatz anzeigen',
        ],
        'messages' => [
            'no_activities' => 'Keine Änderungen für diesen Datensatz aufgezeichnet',
            'loading' => 'Verlauf wird geladen...',
        ],
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
