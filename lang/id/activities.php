<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/id/activities.php
return [
    'breadcrumb' => 'Riwayat',
    'title' => 'Riwayat :record',
    'default_datetime_format' => 'd/m/Y H:i:s',
    'table' => [
        'field' => 'Bagian',
        'old' => 'Sebelum',
        'new' => 'Sesudah',
        'restore' => 'Pulihkan',
    ],
    'events' => [
        'updated' => 'Terbarui',
        'created' => 'Terbuat',
        'deleted' => 'Terhapus',
        'restored' => 'Terpulihkan',
        'restore_successful' => 'Sukses memulihkan',
        'restore_failed' => 'Gagal memulihkan',
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
