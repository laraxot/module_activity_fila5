---
title: "Contratto — LogActivityAction"
type: contract
action: "Modules\\Activity\\Actions\\LogActivityAction"
module: Activity
status: active
tags: [contract, action, activity, append-only]
created: 2026-11-26
updated: 2026-11-26
---

# LogActivityAction

Contratto di comportamento (regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`).
Sorgente: `app/Actions/LogActivityAction.php`. Punto di scrittura tipizzata del registro (append-only).
ADR correlato: [activity-audit-is-append-oriented](../adr/activity-audit-is-append-oriented.md).
Elencato in `index.md` ma il file mancava.

## Input

- Costruttore: `string $type` (non vuoto), `?Model $user`, `?Model $subject`, `?array $properties`, `?string $description`.
- `$user`, se presente, deve implementare `UserContract`.

## Output

- Una nuova riga `Activity` creata via `Activity::typedQuery()->create(...)`.

## Invarianti

| ID | Regola | Verifica |
|---|---|---|
| ACTIVITY-LOG-INV-1 | Solo INSERT: non aggiorna né cancella righe esistenti. | — (non dimostrato) |
| ACTIVITY-LOG-INV-2 | `type` vuoto nel costruttore → `InvalidArgumentException` prima di qualsiasi scrittura. | — (non dimostrato) |
| ACTIVITY-LOG-INV-3 | Se `$user` non è `UserContract` → `InvalidArgumentException`. | — (non dimostrato) |
| ACTIVITY-LOG-INV-4 | `causer_id` viene da `$user->id` oppure, se assente, da `Auth::id()` (solo `int|string`). | — (non dimostrato) |

## Effetti collaterali

- INSERT su tabella activity log (`log_name`/`event` = `$type`, subject morph opzionale, `properties`).

## Errori

- `InvalidArgumentException` su type vuoto o user non conforme.
- Errori DB risalgono.

## Non fa

- Non ripristina record (`RestoreActivityAction`).
- Non redige attributi sensibili (`RedactModelAttributesAction`).
- Non autorizza la lettura dei file di log.
