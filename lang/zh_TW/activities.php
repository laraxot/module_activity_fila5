<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/zh_TW/activities.php
return [
    'breadcrumb' => '歷史記錄',
    'title' => '歷史記錄：:record',
    'default_datetime_format' => 'Y-m-d H:i:s',
    'table' => [
        'field' => '欄位',
        'old' => '舊值',
        'new' => '新值',
        'restore' => '還原',
    ],
    'events' => [
        'updated' => '已更新',
        'created' => '已建立',
        'deleted' => '已刪除',
        'restored' => '已還原',
        'restore_successful' => '還原成功',
        'restore_failed' => '還原失敗',
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
