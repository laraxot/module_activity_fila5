<?php

return [
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Unique identifier of the activity',
            'helper_text' => '',
            'description' => '',
        ],
        'description' => [
            'label' => 'Description',
            'tooltip' => 'Description of the activity',
            'helper_text' => '',
            'description' => '',
        ],
        'subject_type' => [
            'label' => 'Subject Type',
            'tooltip' => 'Type of entity subject to the activity',
            'helper_text' => '',
            'description' => '',
        ],
        'subject_id' => [
            'label' => 'Subject ID',
            'tooltip' => 'Identifier of the entity subject to the activity',
            'helper_text' => '',
            'description' => '',
        ],
        'causer_type' => [
            'label' => 'Causer Type',
            'tooltip' => 'Type of entity that caused the activity',
            'helper_text' => '',
            'description' => '',
        ],
        'causer_id' => [
            'label' => 'Causer ID',
            'tooltip' => 'Identifier of the entity that caused the activity',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Created At',
            'tooltip' => 'Date and time when the activity was created',
            'helper_text' => '',
            'description' => '',
        ],
        'resource_type' => [
            'label' => 'Tipo Risorsa',
            'help' => 'Tipo di risorsa attività',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'resource_id' => [
            'label' => 'ID Risorsa',
            'help' => 'Identificativo della risorsa',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'activity_count' => [
            'label' => 'Numero Attività',
            'help' => 'Numero di attività associate',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'last_activity' => [
            'label' => 'Ultima Attività',
            'help' => 'Data e ora dell\'ultima attività',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'view' => [
            'label' => 'View',
            'tooltip' => 'View activity details',
        ],
        'delete' => [
            'label' => 'Delete',
            'tooltip' => 'Delete this activity',
            'confirmation' => 'Are you sure you want to delete this activity?',
        ],
        'view_activities' => [
            'label' => 'Visualizza Attività',
            'tooltip' => 'Visualizza tutte le attività della risorsa',
        ],
        'export' => [
            'label' => 'Esporta',
            'tooltip' => 'Esporta dati della risorsa',
        ],
    ],
    'filters' => [
        'date' => [
            'label' => 'Date',
            'tooltip' => 'Filter by creation date',
        ],
        'type' => [
            'label' => 'Type',
            'tooltip' => 'Filter by activity type',
        ],
    ],
    'snapshots' => [
        'fields' => [
            'id' => [
                'label' => 'ID',
                'help' => 'Unique identifier of the snapshot',
            ],
            'aggregate_uuid' => [
                'label' => 'Aggregate UUID',
                'help' => 'UUID of the aggregate',
            ],
            'aggregate_version' => [
                'label' => 'Aggregate Version',
                'help' => 'Version of the aggregate',
            ],
            'state' => [
                'label' => 'State',
                'help' => 'State of the snapshot',
            ],
            'created_at' => [
                'label' => 'Creation Date',
                'help' => 'Creation date of the snapshot',
            ],
            'updated_at' => [
                'label' => 'Last Update',
                'help' => 'Last update date of the snapshot',
            ],
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => [
            'name' => 'Monitoraggio',
            'description' => 'Gestione delle risorse di attività',
        ],
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => '100',
        'name' => 'Risorse Attività',
        'plural' => 'Risorse Attività',
    ],
    'label' => 'Missing Label',
    'plural_label' => 'Missing Plural label',
    'messages' => [
        'no_resources' => 'Nessuna risorsa trovata',
        'resource_exported' => 'Risorsa esportata con successo',
    ],
];
