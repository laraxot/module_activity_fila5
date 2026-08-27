<?php

return [
    'list_log_activities' => [
        'label' => 'History',
        'tooltip' => 'View modification history',
        'icon' => 'heroicon-o-clock',
        'color' => 'gray',
        'modal' => [
            'heading' => 'Modification History',
            'description' => 'View all modifications made to this record',
        ],
        'view_all' => 'View All',
        'close' => 'Close',
        'messages' => [
            'no_activities' => 'No modifications recorded for this record',
            'loading' => 'Loading history...',
        ],
    ],
    'navigation' => [
        'label' => 'Missing Navigation Label',
        'plural_label' => 'Missing Navigation Plural Label',
        'group' => [
            'name' => 'General',
            'description' => 'General Settings',
        ],
        'icon' => 'heroicon-o-puzzle-piece',
        'sort' => '100',
        'name' => 'Actions',
        'plural' => 'Actions',
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
    ],
    'actions' => [
        'create' => [
            'label' => 'Crea Actions',
        ],
        'edit' => [
            'label' => 'Modifica Actions',
        ],
        'delete' => [
            'label' => 'Elimina Actions',
        ],
    ],
];
