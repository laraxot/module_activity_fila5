---
title: "Contratto: RestoreActivityAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\RestoreActivityAction"
qmd: "contract RestoreActivityAction activity ripristino record valori precedenti update fillable pagina log"
related:
  - ../../app/Actions/RestoreActivityAction.php
  - ../../app/Filament/Pages/ListLogActivities.php
  - ../../tests/Unit/Actions/RestoreActivityActionExecuteTest.php
---

# RestoreActivityAction

Riporta un record ai valori che aveva prima di una modifica, presi dalle `properties.old` di un'attivita'. Chiamata dalla pagina `ListLogActivities` (azione di ripristino sulla cronologia di un record).

## Input

- `Model $record`: il record da aggiornare.
- `array<string, mixed> $oldProperties`: i valori da riportare, non vuoto.

## Output

- `void`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACTIVITY-RESTORE-INV-1 | Il record riceve un solo `update()` con esattamente i valori passati: valgono `$fillable` e `$guarded` del modello. | ACTIVITY-RESTORE-INV-1 |
| ACTIVITY-RESTORE-INV-2 | Valori vuoti: eccezione prima di toccare il record (`Assert::notEmpty`). | ACTIVITY-RESTORE-INV-2 |
| ACTIVITY-RESTORE-INV-3 | Un errore dell'update esce come `Exception('Restore failed: <messaggio>')`, con codice `(int) getCode()` e l'eccezione originale come `previous`. | ACTIVITY-RESTORE-INV-3 |

## Effetti collaterali

- `UPDATE` del record di dominio: scattano eventi Eloquent, observer e, se il modello usa `LogsActivity`, una nuova attivita'. Nessuna transazione.

## Errori

- `Webmozart\Assert\InvalidArgumentException` per valori vuoti.
- `Exception('Restore failed: ...')` per errori di update (un codice SQL stringa diventa `0`).

## Non fa

- Non controlla i permessi: li controlla la pagina (`canRestoreActivity()`).
- Non filtra i campi: segreti presenti nelle `properties` verrebbero riscritti.
- Non ripristina record cancellati con SoftDeletes: aggiorna solo record esistenti.

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/RestoreActivityAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
