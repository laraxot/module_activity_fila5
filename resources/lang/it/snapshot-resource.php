<<<<<<< HEAD
<?php

declare(strict_types=1);

return [
    'fields' => [
        'id' => [
            'label' => 'ID',
            'tooltip' => 'Identificativo univoco dello snapshot',
            'helper_text' => '',
            'description' => '',
        ],
        'aggregate_uuid' => [
            'label' => 'UUID Aggregato',
            'tooltip' => 'Identificativo univoco dell\'aggregato',
            'helper_text' => '',
            'description' => '',
        ],
        'aggregate_version' => [
            'label' => 'Versione Aggregato',
            'tooltip' => 'Numero di versione dell\'aggregato',
            'helper_text' => '',
            'description' => '',
        ],
        'state' => [
            'label' => 'Stato',
            'tooltip' => 'Stato corrente dello snapshot',
            'helper_text' => '',
            'description' => '',
        ],
        'created_at' => [
            'label' => 'Data Creazione',
            'tooltip' => 'Data e ora di creazione dello snapshot',
            'helper_text' => '',
            'description' => '',
        ],
    ],
    'actions' => [
        'view' => [
            'label' => 'Visualizza',
            'tooltip' => 'Visualizza i dettagli dello snapshot',
        ],
        'delete' => [
            'label' => 'Elimina',
            'tooltip' => 'Elimina questo snapshot',
            'confirmation' => 'Sei sicuro di voler eliminare questo snapshot?',
        ],
    ],
    'filters' => [
        'date' => [
            'label' => 'Data',
            'tooltip' => 'Filtra per data di creazione',
        ],
        'state' => [
            'label' => 'Stato',
            'tooltip' => 'Filtra per stato',
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
=======
|<|?|p|h|p|
|
|d|e|c|l|a|r|e|(|s|t|r|i|c|t|_|t|y|p|e|s|=|1|)|;|
|
|r|e|t|u|r|n| |[|
| | | | |'|f|i|e|l|d|s|'| |=|>| |[|
| | | | | | | | |'|i|d|'| |=|>| |[|
| | | | | | | | | | | | |'|l|a|b|e|l|'| |=|>| |'|I|D|'|,|
| | | | | | | | | | | | |'|t|o|o|l|t|i|p|'| |=|>| |'|I|d|e|n|t|i|f|i|c|a|t|i|v|o| |u|n|i|v|o|c|o| |d|e|l|l|o| |s|n|a|p|s|h|o|t|'|,|
| | | | | | | | | | | | |'|h|e|l|p|e|r|_|t|e|x|t|'| |=|>| |'|'|,|
| | | | | | | | | | | | |'|d|e|s|c|r|i|p|t|i|o|n|'| |=|>| |'|'|,|
| | | | | | | | |]|,|
| | | | | | | | |'|a|g|g|r|e|g|a|t|e|_|u|u|i|d|'| |=|>| |[|
| | | | | | | | | | | | |'|l|a|b|e|l|'| |=|>| |'|U|U|I|D| |A|g|g|r|e|g|a|t|o|'|,|
| | | | | | | | | | | | |'|t|o|o|l|t|i|p|'| |=|>| |'|I|d|e|n|t|i|f|i|c|a|t|i|v|o| |u|n|i|v|o|c|o| |d|e|l|l||'|a|g|g|r|e|g|a|t|o|'|,|
| | | | | | | | | | | | |'|h|e|l|p|e|r|_|t|e|x|t|'| |=|>| |'|'|,|
| | | | | | | | | | | | |'|d|e|s|c|r|i|p|t|i|o|n|'| |=|>| |'|'|,|
| | | | | | | | |]|,|
| | | | | | | | |'|a|g|g|r|e|g|a|t|e|_|v|e|r|s|i|o|n|'| |=|>| |[|
| | | | | | | | | | | | |'|l|a|b|e|l|'| |=|>| |'|V|e|r|s|i|o|n|e| |A|g|g|r|e|g|a|t|o|'|,|
| | | | | | | | | | | | |'|t|o|o|l|t|i|p|'| |=|>| |'|N|u|m|e|r|o| |d|i| |v|e|r|s|i|o|n|e| |d|e|l|l||'|a|g|g|r|e|g|a|t|o|'|,|
| | | | | | | | | | | | |'|h|e|l|p|e|r|_|t|e|x|t|'| |=|>| |'|'|,|
| | | | | | | | | | | | |'|d|e|s|c|r|i|p|t|i|o|n|'| |=|>| |'|'|,|
| | | | | | | | |]|,|
| | | | | | | | |'|s|t|a|t|e|'| |=|>| |[|
| | | | | | | | | | | | |'|l|a|b|e|l|'| |=|>| |'|S|t|a|t|o|'|,|
| | | | | | | | | | | | |'|t|o|o|l|t|i|p|'| |=|>| |'|S|t|a|t|o| |c|o|r|r|e|n|t|e| |d|e|l|l|o| |s|n|a|p|s|h|o|t|'|,|
| | | | | | | | | | | | |'|h|e|l|p|e|r|_|t|e|x|t|'| |=|>| |'|'|,|
| | | | | | | | | | | | |'|d|e|s|c|r|i|p|t|i|o|n|'| |=|>| |'|'|,|
| | | | | | | | |]|,|
| | | | | | | | |'|c|r|e|a|t|e|d|_|a|t|'| |=|>| |[|
| | | | | | | | | | | | |'|l|a|b|e|l|'| |=|>| |'|D|a|t|a| |C|r|e|a|z|i|o|n|e|'|,|
| | | | | | | | | | | | |'|t|o|o|l|t|i|p|'| |=|>| |'|D|a|t|a| |e| |o|r|a| |d|i| |c|r|e|a|z|i|o|n|e| |d|e|l|l|o| |s|n|a|p|s|h|o|t|'|,|
| | | | | | | | | | | | |'|h|e|l|p|e|r|_|t|e|x|t|'| |=|>| |'|'|,|
| | | | | | | | | | | | |'|d|e|s|c|r|i|p|t|i|o|n|'| |=|>| |'|'|,|
| | | | | | | | |]|,|
| | | | |]|,|
| | | | |'|a|c|t|i|o|n|s|'| |=|>| |[|
| | | | | | | | |'|v|i|e|w|'| |=|>| |[|
| | | | | | | | | | | | |'|l|a|b|e|l|'| |=|>| |'|V|i|s|u|a|l|i|z|z|a|'|,|
| | | | | | | | | | | | |'|t|o|o|l|t|i|p|'| |=|>| |'|V|i|s|u|a|l|i|z|z|a| |i| |d|e|t|t|a|g|l|i| |d|e|l|l|o| |s|n|a|p|s|h|o|t|'|,|
| | | | | | | | |]|,|
| | | | | | | | |'|d|e|l|e|t|e|'| |=|>| |[|
| | | | | | | | | | | | |'|l|a|b|e|l|'| |=|>| |'|E|l|i|m|i|n|a|'|,|
| | | | | | | | | | | | |'|t|o|o|l|t|i|p|'| |=|>| |'|E|l|i|m|i|n|a| |q|u|e|s|t|o| |s|n|a|p|s|h|o|t|'|,|
| | | | | | | | | | | | |'|c|o|n|f|i|r|m|a|t|i|o|n|'| |=|>| |'|S|e|i| |s|i|c|u|r|o| |d|i| |v|o|l|e|r| |e|l|i|m|i|n|a|r|e| |q|u|e|s|t|o| |s|n|a|p|s|h|o|t|?|'|,|
| | | | | | | | |]|,|
| | | | |]|,|
| | | | |'|f|i|l|t|e|r|s|'| |=|>| |[|
| | | | | | | | |'|d|a|t|e|'| |=|>| |[|
| | | | | | | | | | | | |'|l|a|b|e|l|'| |=|>| |'|D|a|t|a|'|,|
| | | | | | | | | | | | |'|t|o|o|l|t|i|p|'| |=|>| |'|F|i|l|t|r|a| |p|e|r| |d|a|t|a| |d|i| |c|r|e|a|z|i|o|n|e|'|,|
| | | | | | | | |]|,|
| | | | | | | | |'|s|t|a|t|e|'| |=|>| |[|
| | | | | | | | | | | | |'|l|a|b|e|l|'| |=|>| |'|S|t|a|t|o|'|,|
| | | | | | | | | | | | |'|t|o|o|l|t|i|p|'| |=|>| |'|F|i|l|t|r|a| |p|e|r| |s|t|a|t|o|'|,|
| | | | | | | | |]|,|
| | | | |]|,|
| | | | |'|n|a|v|i|g|a|t|i|o|n|'| |=|>| |[|
| | | | | | | | |'|l|a|b|e|l|'| |=|>| |'|M|i|s|s|i|n|g| |N|a|v|i|g|a|t|i|o|n| |L|a|b|e|l|'|,|
| | | | | | | | |'|p|l|u|r|a|l|_|l|a|b|e|l|'| |=|>| |'|M|i|s|s|i|n|g| |N|a|v|i|g|a|t|i|o|n| |P|l|u|r|a|l| |L|a|b|e|l|'|,|
| | | | | | | | |'|g|r|o|u|p|'| |=|>| |'|M|i|s|s|i|n|g| |G|r|o|u|p|'|,|
| | | | | | | | |'|i|c|o|n|'| |=|>| |'|h|e|r|o|i|c|o|n|-|o|-|p|u|z|z|l|e|-|p|i|e|c|e|'|,|
| | | | | | | | |'|s|o|r|t|'| |=|>| |1|0|0|,|
| | | | |]|,|
| | | | |'|l|a|b|e|l|'| |=|>| |'|M|i|s|s|i|n|g| |L|a|b|e|l|'|,|
| | | | |'|p|l|u|r|a|l|_|l|a|b|e|l|'| |=|>| |'|M|i|s|s|i|n|g| |P|l|u|r|a|l| |l|a|b|e|l|'|,|
|]|;|
|
>>>>>>> laraxot/dev
