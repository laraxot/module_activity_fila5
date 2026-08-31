<?php

return [
    'breadcrumb' => 'History',
    'title' => 'History :record',
    'default_datetime_format' => 'Y-m-d, H:i:s',
    'table' => [
        'field' => 'Field',
        'old' => 'Old',
        'new' => 'New',
        'restore' => 'Restore',
    ],
    'events' => [
        'updated' => 'Updated',
        'created' => 'Created',
        'deleted' => 'Deleted',
        'restored' => 'Restored',
        'restore_successful' => 'Restored successfully',
        'restore_failed' => 'Restore failed',
    ],
    'modified' => 'Modified',
    'fields_modified' => ':count field modified|:count fields modified',
    'anonymous' => 'Anonymous User',
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => '100',
        'name' => 'Activities',
        'plural' => 'Activities',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'fields' => [
        'id' => [
            'label' => 'Identificativo',
            'tooltip' => 'Identificativo univoco del record',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Ultima Modifica',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'log_name' => [
            'label' => 'log_name',
        ],
        'description' => [
            'label' => 'description',
        ],
        'event' => [
            'label' => 'event',
        ],
        'subject_type' => [
            'label' => 'subject_type',
        ],
        'subject_id' => [
            'label' => 'subject_id',
        ],
        'causer_type' => [
            'label' => 'causer_type',
        ],
        'causer_id' => [
            'label' => 'causer_id',
        ],
        'properties' => [
            'label' => 'properties',
        ],
        'batch_uuid' => [
            'label' => 'batch_uuid',
        ],
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Activities',
        ],
        'edit' => [
            'label' => 'Modifica Activities',
        ],
        'delete' => [
            'label' => 'Elimina Activities',
        ],
    ],
    'subject' => [
        'type' => 'Tipo',
        'id' => 'ID',
        'unknown' => 'Sconosciuto',
    ],
    'metadata' => [
        'log_name' => 'Log',
        'batch_uuid' => 'Batch UUID',
        'properties' => 'Proprietà',
    ],
    'no_changes' => 'Nessuna modifica registrata',
    'no_description' => 'Nessuna descrizione disponibile',
];
