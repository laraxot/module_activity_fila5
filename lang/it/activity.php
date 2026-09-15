<?php

declare(strict_types=1);

return [
    'navigation' => [
        'name' => 'Attività',
        'plural' => 'Attività',
        'group' => [
            'name' => 'Monitoraggio',
            'description' => 'Gestione delle attività di sistema',
        ],
        'label' => 'Attività',
        'sort' => 60,
        'icon' => 'activity-animated',
    ],
    'fields' => [
        'id' => [
            'label' => 'ID',
            'help' => 'Identificativo unico dell\'attività',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'log_name' => [
            'label' => 'Nome Log',
            'help' => 'Nome del log di attività',
            'placeholder' => 'log_name',
<<<<<<< HEAD
<<<<<<< .merge_file_tv6Dhq
<<<<<<< HEAD
=======
>>>>>>> .merge_file_B1YwnX
            'helper_text' => '',
=======
            'helper_text' => 'log_name',
>>>>>>> laraxot/dev
<<<<<<< .merge_file_tv6Dhq
=======
            'helper_text' => '',
>>>>>>> 82abadce (.)
=======
>>>>>>> .merge_file_B1YwnX
            'description' => 'log_name',
            'tooltip' => '',
        ],
        'description' => [
            'label' => 'Descrizione',
            'help' => 'Descrizione dell\'attività',
            'placeholder' => 'description',
<<<<<<< HEAD
<<<<<<< .merge_file_tv6Dhq
<<<<<<< HEAD
            'helper_text' => '',
=======
            'helper_text' => 'description',
>>>>>>> laraxot/dev
=======
            'helper_text' => '',
>>>>>>> 82abadce (.)
=======
            'helper_text' => '',
=======
            'helper_text' => 'description',
>>>>>>> laraxot/dev
>>>>>>> .merge_file_B1YwnX
            'description' => 'description',
            'tooltip' => '',
        ],
        'subject_type' => [
            'label' => 'Tipo Soggetto',
            'help' => 'Tipo di entità coinvolta',
            'placeholder' => 'subject_type',
<<<<<<< HEAD
<<<<<<< .merge_file_tv6Dhq
<<<<<<< HEAD
=======
>>>>>>> .merge_file_B1YwnX
            'helper_text' => '',
=======
            'helper_text' => 'subject_type',
>>>>>>> laraxot/dev
<<<<<<< .merge_file_tv6Dhq
=======
            'helper_text' => '',
>>>>>>> 82abadce (.)
=======
>>>>>>> .merge_file_B1YwnX
            'description' => 'subject_type',
            'tooltip' => '',
        ],
        'subject_id' => [
            'label' => 'ID Soggetto',
            'help' => 'Identificativo dell\'entità coinvolta',
            'placeholder' => 'subject_id',
<<<<<<< HEAD
<<<<<<< .merge_file_tv6Dhq
<<<<<<< HEAD
            'helper_text' => '',
=======
            'helper_text' => 'subject_id',
>>>>>>> laraxot/dev
=======
            'helper_text' => '',
>>>>>>> 82abadce (.)
=======
            'helper_text' => '',
=======
            'helper_text' => 'subject_id',
>>>>>>> laraxot/dev
>>>>>>> .merge_file_B1YwnX
            'description' => 'subject_id',
            'tooltip' => '',
        ],
        'causer_type' => [
            'label' => 'Tipo Causatore',
            'help' => 'Tipo di entità che ha causato l\'attività',
            'placeholder' => 'causer_type',
<<<<<<< HEAD
<<<<<<< .merge_file_tv6Dhq
<<<<<<< HEAD
=======
>>>>>>> .merge_file_B1YwnX
            'helper_text' => '',
=======
            'helper_text' => 'causer_type',
>>>>>>> laraxot/dev
<<<<<<< .merge_file_tv6Dhq
=======
            'helper_text' => '',
>>>>>>> 82abadce (.)
=======
>>>>>>> .merge_file_B1YwnX
            'description' => 'causer_type',
            'tooltip' => '',
        ],
        'causer_id' => [
            'label' => 'ID Causatore',
            'help' => 'Identificativo dell\'entità che ha causato l\'attività',
            'placeholder' => 'causer_id',
<<<<<<< HEAD
<<<<<<< .merge_file_tv6Dhq
<<<<<<< HEAD
            'helper_text' => '',
=======
            'helper_text' => 'causer_id',
>>>>>>> laraxot/dev
=======
            'helper_text' => '',
>>>>>>> 82abadce (.)
=======
            'helper_text' => '',
=======
            'helper_text' => 'causer_id',
>>>>>>> laraxot/dev
>>>>>>> .merge_file_B1YwnX
            'description' => 'causer_id',
            'tooltip' => '',
        ],
        'properties' => [
            'label' => 'Proprietà',
            'help' => 'Proprietà aggiuntive dell\'attività',
            'placeholder' => 'properties',
<<<<<<< HEAD
<<<<<<< .merge_file_tv6Dhq
<<<<<<< HEAD
=======
>>>>>>> .merge_file_B1YwnX
            'helper_text' => '',
=======
            'helper_text' => 'properties',
>>>>>>> laraxot/dev
<<<<<<< .merge_file_tv6Dhq
=======
            'helper_text' => '',
>>>>>>> 82abadce (.)
=======
>>>>>>> .merge_file_B1YwnX
            'description' => 'properties',
            'tooltip' => '',
        ],
        'batch_uuid' => [
            'label' => 'Batch UUID',
            'help' => 'Identificativo del batch di attività',
            'placeholder' => 'batch_uuid',
<<<<<<< HEAD
<<<<<<< .merge_file_tv6Dhq
<<<<<<< HEAD
            'helper_text' => '',
=======
            'helper_text' => 'batch_uuid',
>>>>>>> laraxot/dev
=======
            'helper_text' => '',
>>>>>>> 82abadce (.)
=======
            'helper_text' => '',
=======
            'helper_text' => 'batch_uuid',
>>>>>>> laraxot/dev
>>>>>>> .merge_file_B1YwnX
            'description' => 'batch_uuid',
            'tooltip' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'help' => 'Data e ora di creazione dell\'attività',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'updated_at' => [
            'label' => 'Data Aggiornamento',
            'help' => 'Data e ora di aggiornamento dell\'attività',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'view' => [
            'label' => 'Visualizza',
            'tooltip' => 'Visualizza dettagli attività',
        ],
        'restore' => [
            'label' => 'Ripristina',
            'tooltip' => 'Ripristina stato precedente',
        ],
    ],
    'messages' => [
        'no_activities' => 'Nessuna attività trovata',
        'activity_restored' => 'Attività ripristinata con successo',
    ],
    'label' => 'Activity',
    'plural_label' => 'Activity (Plurale)',
];
