<?php

declare(strict_types=1);

return [
    'breadcrumb' => 'Cronologia',
    'title' => 'Cronologia :record',
    'default_datetime_format' => 'd/m/Y, H:i:s',
<<<<<<< HEAD
=======
<<<<<<< HEAD
    'table' => ['field' => 'Campo', 'old' => 'Vecchio', 'new' => 'Nuovo', 'restore' => 'Ripristina'],
    'events' => ['updated' => 'Aggiornato', 'created' => 'Creato', 'deleted' => 'Eliminato', 'restored' => 'Ripristinato', 'restore_successful' => 'Ripristinato con successo', 'restore_failed' => 'Ripristino fallito'],
    'subject' => ['type' => 'Tipo', 'id' => 'ID', 'unknown' => 'Sconosciuto'],
    'metadata' => ['log_name' => 'Log', 'batch_uuid' => 'Batch UUID', 'properties' => 'Proprietà'],
=======
>>>>>>> a95e8f36 (.)
    'table' => [
        'field' => 'Campo',
        'old' => 'Vecchio',
        'new' => 'Nuovo',
        'restore' => 'Ripristina',
    ],
    'events' => [
        'updated' => 'Aggiornato',
        'created' => 'Creato',
        'deleted' => 'Eliminato',
        'restored' => 'Ripristinato',
        'restore_successful' => 'Ripristinato con successo',
        'restore_failed' => 'Ripristino fallito',
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
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> a95e8f36 (.)
    'no_changes' => 'Nessuna modifica registrata',
    'no_description' => 'Nessuna descrizione disponibile',
    'modified' => 'Modificato',
    'fields_modified' => ':count campo modificato|:count campi modificati',
    'anonymous' => 'Utente Anonimo',
    'label' => 'Activities',
    'plural_label' => 'Activities (Plurale)',
    'navigation' => [
        'name' => 'Activities',
        'plural' => 'Activities',
<<<<<<< HEAD
=======
<<<<<<< HEAD
        'group' => ['name' => 'General', 'description' => 'General Settings'],
=======
>>>>>>> a95e8f36 (.)
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> a95e8f36 (.)
        'label' => 'Activities',
        'sort' => 1,
        'icon' => 'heroicon-o-collection',
    ],
    'fields' => [
<<<<<<< HEAD
=======
<<<<<<< HEAD
        'id' => ['label' => 'Identificativo', 'tooltip' => 'Identificativo univoco del record', 'helper_text' => '', 'description' => ''],
        'created_at' => ['label' => 'Data Creazione', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'updated_at' => ['label' => 'Ultima Modifica', 'tooltip' => '', 'helper_text' => '', 'description' => ''],
        'log_name' => ['label' => 'log_name'],
        'description' => ['label' => 'description'],
        'event' => ['label' => 'event'],
        'subject_type' => ['label' => 'subject_type'],
        'subject_id' => ['label' => 'subject_id'],
        'causer_type' => ['label' => 'causer_type'],
        'causer_id' => ['label' => 'causer_id'],
        'batch_uuid' => ['label' => 'batch_uuid'],
        'properties' => ['label' => 'properties'],
    ],
    'actions' => [
        'create' => ['label' => 'Crea Activities'],
        'edit' => ['label' => 'Modifica Activities'],
        'delete' => ['label' => 'Elimina Activities'],
=======
>>>>>>> a95e8f36 (.)
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
        'batch_uuid' => [
            'label' => 'batch_uuid',
        ],
        'properties' => [
            'label' => 'properties',
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
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
>>>>>>> a95e8f36 (.)
    ],
];
