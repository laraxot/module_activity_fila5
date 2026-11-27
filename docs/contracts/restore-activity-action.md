---
<<<<<<< .merge_file_VBoToW
title: "Contratto — RestoreActivityAction"
type: contract
action: "Modules\Activity\Actions\RestoreActivityAction"
tags: [contract, action, activity-log, restore]
created: 2026-11-24
updated: 2026-11-24
=======
title: "Contratto: RestoreActivityAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\RestoreActivityAction"
qmd: "contract RestoreActivityAction activity ripristino record valori precedenti update fillable pagina log"
>>>>>>> .merge_file_c0GHFd
related:
  - ../../app/Actions/RestoreActivityAction.php
  - ../../app/Filament/Pages/ListLogActivities.php
  - ../../tests/Unit/Actions/RestoreActivityActionExecuteTest.php
---

# RestoreActivityAction

<<<<<<< .merge_file_VBoToW
Riporta un record ai valori che aveva prima di una modifica, presi dalle `properties.old` di un'attività registrata.
Chiamante: la pagina `app/Filament/Pages/ListLogActivities.php` (azione «ripristina» sulla cronologia di un record).
Sorgente: `app/Actions/RestoreActivityAction.php`.

Test: `cd laravel && vendor/bin/pest Modules/Activity/tests/Unit/Actions/RestoreActivityActionExecuteTest.php`.

## Input

- `Model $record`: il record da ripristinare.
- `array<string, mixed> $oldProperties`: i valori precedenti, così come stanno nell'attività.
=======
Riporta un record ai valori che aveva prima di una modifica, presi dalle `properties.old` di un'attivita'. Chiamata dalla pagina `ListLogActivities` (azione di ripristino sulla cronologia di un record).

## Input

- `Model $record`: il record da aggiornare.
- `array<string, mixed> $oldProperties`: i valori da riportare, non vuoto.
>>>>>>> .merge_file_c0GHFd

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< .merge_file_VBoToW
| ACTIVITY-RESTORE-INV-1 | Il record riceve un solo `update()` con esattamente i valori passati. | `ACTIVITY-RESTORE-INV-1` |
| ACTIVITY-RESTORE-INV-2 | Valori vuoti = eccezione prima di toccare il record (`Assert::notEmpty`). | `ACTIVITY-RESTORE-INV-2` |
| ACTIVITY-RESTORE-INV-3 | Un errore dell'update esce come `Exception('Restore failed: …')` con l'eccezione originale come `previous`. | `ACTIVITY-RESTORE-INV-3` |

## Effetti collaterali

- `Model::update($oldProperties)`: scrive nel DB del record ed esegue eventi, observer e (se il modello usa
  `LogsActivity`) una nuova attività.
=======
| ACTIVITY-RESTORE-INV-1 | Il record riceve un solo `update()` con esattamente i valori passati: valgono `$fillable` e `$guarded` del modello. | ACTIVITY-RESTORE-INV-1 |
| ACTIVITY-RESTORE-INV-2 | Valori vuoti: eccezione prima di toccare il record (`Assert::notEmpty`). | ACTIVITY-RESTORE-INV-2 |
| ACTIVITY-RESTORE-INV-3 | Un errore dell'update esce come `Exception('Restore failed: <messaggio>')`, con codice `(int) getCode()` e l'eccezione originale come `previous`. | ACTIVITY-RESTORE-INV-3 |

## Effetti collaterali

- `UPDATE` del record di dominio: scattano eventi Eloquent, observer e, se il modello usa `LogsActivity`, una nuova attivita'. Nessuna transazione.
>>>>>>> .merge_file_c0GHFd

## Errori

- `Webmozart\Assert\InvalidArgumentException` per valori vuoti.
<<<<<<< .merge_file_VBoToW
- `Exception('Restore failed: …')` per qualunque errore dell'update.

## Non fa

- Non filtra i campi: l'`update` rispetta solo `$fillable`/`$guarded` del modello; campi sensibili presenti nelle
  `properties` (password, token) verrebbero riscritti. La pulizia è del chiamante.
- Non apre transazioni né controlla i permessi (lo fa la pagina).
- Non ripristina record cancellati (`restore()` di SoftDeletes): aggiorna solo record esistenti.
=======
- `Exception('Restore failed: ...')` per errori di update (un codice SQL stringa diventa `0`).

## Non fa

- Non controlla i permessi: li controlla la pagina (`canRestoreActivity()`).
- Non filtra i campi: segreti presenti nelle `properties` verrebbero riscritti.
- Non ripristina record cancellati con SoftDeletes: aggiorna solo record esistenti.
>>>>>>> .merge_file_c0GHFd
