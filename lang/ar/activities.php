<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/ar/activities.php
return [
    'breadcrumb' => 'سجل عمليات',
    'title' => 'سجل عمليات :record',
    'default_datetime_format' => 'Y-m-d, H:i:s',
    'table' => [
        'field' => 'الحقل',
        'old' => 'سابقاً',
        'new' => 'حالياً',
        'restore' => 'أسترجاع',
    ],
    'events' => [
        'updated' => 'تحديث',
        'created' => 'إنشاء',
        'deleted' => 'حذف',
        'restored' => 'استعادة',
        'restore_successful' => 'تم الاسترجاع بنجاح',
        'restore_failed' => 'فشل الاستراجع',
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
