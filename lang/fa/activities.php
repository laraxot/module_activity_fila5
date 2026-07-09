<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/fa/activities.php
return [
    'breadcrumb' => 'تاریخچه',
    'title' => 'تاریخچه :record',
    'default_datetime_format' => 'Y-m-d، H:i:s',
    'table' => [
        'field' => 'فیلد',
        'old' => 'قدیمی',
        'new' => 'جدید',
        'restore' => 'بازیابی',
    ],
    'events' => [
        'updated' => 'به‌روزرسانی شد',
        'created' => 'ایجاد شد',
        'deleted' => 'حذف شد',
        'restored' => 'بازیابی شد',
        'restore_successful' => 'با موفقیت بازیابی شد',
        'restore_failed' => 'بازیابی ناموفق بود',
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
