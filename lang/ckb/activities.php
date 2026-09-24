<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/ckb/activities.php
return [
    'breadcrumb' => 'نرخی پێشوو',
    'title' => 'نرخەکانی پێشووی :record',
    'default_datetime_format' => 'Y-m-d, H:i:s',
    'table' => [
        'field' => 'خانە',
        'old' => 'کۆن',
        'new' => 'نوێ',
    ],
    'events' => [
        'updated' => 'نوێکراوەتەوە',
        'Created' => 'دروستکراوە',
        'deleted' => 'سڕایەوە',
        'restored' => 'گەڕاندنەوە',
        'restore_successful' => 'بە سەرکەوتوویی گەڕێنرایەوە',
        'restore_failed' => 'گەڕاندنەوە شکستی هێنا',
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
