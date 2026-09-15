<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Identificativo univoco dell'attivit��',
            'helper_text' => '',
            'description' => '',
        ],
        'description' => [
            'label' => 'Descrizione',
            'tooltip' => 'Descrizione dell'attivit��',
            'helper_text' => '',
            'description' => '',
        ],
        'subject_type' => [
            'label' => 'Tipo Soggetto',
            'tooltip' => 'Tipo di entit�� soggetta all'attivit��',
            'helper_text' => '',
            'description' => '',
        ],
        'subject_id' => [
            'label' => 'ID Soggetto',
            'tooltip' => 'Identificativo dell'entit�� soggetta all'attivit��',
            'helper_text' => '',
            'description' => '',
        ],
        'causer_type' => [
            'label' => 'Tipo Autore',
            'tooltip' => 'Tipo di entit�� che ha causato l'attivit��',
            'helper_text' => '',
            'description' => '',
        ],
        'causer_id' => [
            'label' => 'ID Autore',
            'tooltip' => 'Identificativo dell'entit�� che ha causato l'attivit��',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => 'Data e ora di creazione dell'attivit��',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'view' => [
            'label' => 'Visualizza',
            'tooltip' => 'Visualizza i dettagli dell'attivit��',
        ],
        'delete' => [
            'label' => 'Elimina',
            'tooltip' => 'Elimina questa attivit��',
            'confirmation' => 'Sei sicuro di voler eliminare questa attivit��?',
        ],
    ],
    'filters' => [
        'date' => [
            'label' => 'Data',
            'tooltip' => 'Filtra per data di creazione',
        ],
        'type' => [
            'label' => 'Tipo',
            'tooltip' => 'Filtra per tipo di attivit��',
        ],
    ],
    'snapshots' => [
        'fields' => [
            'id' => [
                'label' => 'ID',
                'help' => 'Identificativo univoco dello snapshot',
            ],
            'aggregate_uuid' => [
                'label' => 'UUID Aggregato',
                'help' => 'UUID dell'aggregato',
            ],
            'aggregate_version' => [
                'label' => 'Versione Aggregato',
                'help' => 'Versione dell'aggregato',
            ],
            'state' => [
                'label' => 'Stato',
                'help' => 'Stato dello snapshot',
            ],
            'created_at' => [
                'label' => 'Data Creazione',
                'help' => 'Data di creazione dello snapshot',
            ],
            'updated_at' => [
                'label' => 'Data Aggiornamento',
                'help' => 'Data di ultimo aggiornamento dello snapshot',
            ],
        ],
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
];

