<?php

declare(strict_types=1);

// Activity translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: ≥5% comment lines on files >100 LOC.
// Canon: Modules/Activity/docs/wiki — domain i18n only.
// File: lang/it/edit_activity.php
return [
    'navigation' => [
        'name' => 'Modifica Attività',
        'plural' => 'Modifica Attività',
        'group' => [
            'name' => 'Monitoraggio',
            'description' => 'Modifica delle attività di sistema',
        ],
        'label' => 'Modifica Attività',
        'sort' => 65,
        'icon' => 'activity-edit-animated',
    ],
    'form' => [
        'title' => 'Modifica Attività',
        'description' => 'Modifica i dettagli dell\'attività',
        'save' => 'Salva Modifiche',
        'cancel' => 'Annulla',
    ],
    'fields' => [
        'description' => [
            'label' => 'Descrizione',
            'placeholder' => 'Inserisci descrizione',
            'help' => 'Descrizione dettagliata dell\'attività',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'properties' => [
            'label' => 'Proprietà',
            'placeholder' => 'Inserisci proprietà',
            'help' => 'Proprietà aggiuntive in formato JSON',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
        'metadata' => [
            'label' => 'Metadata',
            'placeholder' => 'Inserisci metadata',
            'help' => 'Informazioni metadata aggiuntive',
            'tooltip' => '',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'messages' => [
        'success' => 'Attività modificata con successo',
        'error' => 'Errore durante la modifica dell\'attività',
        'validation_error' => 'Errore di validazione: controlla i campi inseriti',
    ],
    'validation' => [
        'description.required' => 'La descrizione è obbligatoria',
        'description.max' => 'La descrizione non può superare :max caratteri',
        'properties.json' => 'Le proprietà devono essere un JSON valido',
    ],
    'label' => 'Edit Activity',
    'plural_label' => 'Edit Activity (Plurale)',
    'actions' => [
        'create' => [
            'label' => 'Crea Edit Activity',
        ],
        'edit' => [
            'label' => 'Modifica Edit Activity',
        ],
        'delete' => [
            'label' => 'Elimina Edit Activity',
        ],
    ],
];
