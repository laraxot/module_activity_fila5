<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/cs/activities.php
return [
    'breadcrumb' => 'Log',
    'title' => 'Log entity ":record"',
    'default_datetime_format' => 'j.n.Y H:i:s',
    'table' => [
        'field' => 'Pole',
        'old' => 'Původní',
        'new' => 'Nové',
        'restore' => 'Obnovit',
    ],
    'events' => [
        'updated' => 'Upraveno',
        'created' => 'Vytvořeno',
        'deleted' => 'Smazáno',
        'restored' => 'Obnoveno',
        'restore_successful' => 'Úspěšně obnoveno',
        'restore_failed' => 'Obnovení selhalo',
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
