<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Snapshot',
        'plural' => 'Snapshots',
        'group' => ['name' => 'Monitoraggio', 'description' => 'Gestione degli snapshot di sistema'],
        'label' => 'Snapshot',
        'sort' => 63,
        'icon' => 'activity-snapshot-animated',
    ],
    'fields' => [
        'id' => ['label' => 'id'],
        'aggregate_uuid' => ['label' => 'aggregate_uuid'],
        'aggregate_version' => ['label' => 'aggregate_version'],
        'created_at' => ['label' => 'created_at'],
        'updated_at' => ['label' => 'updated_at'],
        'aggregate_type' => ['label' => 'aggregate_type'],
    ],
    'actions' => [
        'view' => ['label' => 'view', 'icon' => 'view', 'tooltip' => 'view'],
        'edit' => ['label' => 'edit', 'icon' => 'edit', 'tooltip' => 'edit'],
        'delete' => ['label' => 'delete', 'icon' => 'delete', 'tooltip' => 'delete'],
    ],
];
