---
title: "Contratto — ActivityMaintenanceAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\ActivityMaintenanceAction"
qmd: "contract ActivityMaintenanceAction activity cleanup cancellazione vecchie attivita ACT-CLEAN-INV"
---

# ActivityMaintenanceAction

Cancella le attivita' piu' vecchie di N giorni, a blocchi. Raggiunta da `Adapters/ActivityLogger::cleanOld()` (`app/Adapters/ActivityLogger.php:124`).
Tensione da notare con l'[ADR append-oriented](../adr/0001-activity-audit-is-append-oriented.md): questa e' l'unica operazione che rimuove righe di audit.


## Input

- `int $days` (default 90): soglia di anzianita' in giorni.

## Output

- `int`: numero di attivita' cancellate.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACT-CLEAN-INV-1 | `$days <= 0` lancia `InvalidArgumentException('Days must be positive')` prima di toccare il database. | — (non dimostrato) |
| ACT-CLEAN-INV-2 | Vengono cancellate solo le attività con `created_at < now() - $days giorni`, a blocchi di 1000 (`chunkById`), per evitare lock lunghi. | — (non dimostrato) |

## Effetti collaterali

- `DELETE` fisico sulle righe selezionate: né `Activity` né il modello Spatie da cui estende usano `SoftDeletes` (`rg SoftDeletes` su `Modules/Activity/app` e sul vendor Spatie, 2026-11-26).
- `Log::debug('Old activities cleaned', ['deleted_count', 'older_than_days'])`.
- Nessuna transazione unica: un errore a meta' lascia cancellati i blocchi precedenti.

## Errori

- `InvalidArgumentException` (INV-1); le eccezioni del database si propagano.

## Non fa

- Non archivia ne' esporta le righe prima di cancellarle.
- Non filtra per `log_name`, soggetto o causer.
- Non tocca `StoredEvent` ne' `Snapshot`.
