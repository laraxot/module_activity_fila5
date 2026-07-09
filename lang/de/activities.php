<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/de/activities.php
return [
    'breadcrumb' => 'Historie',
    'title' => 'Historie :record',
    'default_datetime_format' => 'd.m.Y, H:i:s \\U\\h\\r',
    'table' => [
        'field' => 'Feld',
        'old' => 'Alt',
        'new' => 'Neu',
        'restore' => 'Wiederherstellen',
    ],
    'events' => [
        'updated' => 'Aktualisiert',
        'created' => 'Erstellt',
        'deleted' => 'Gelöscht',
        'restored' => 'Wiederhergestellt',
        'restore_successful' => 'Erfolgreich wiederhergestellt',
        'restore_failed' => 'Wiederherstellung fehlgeschlagen',
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
