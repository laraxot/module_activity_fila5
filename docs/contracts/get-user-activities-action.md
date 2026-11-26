---
title: "Contratto — GetUserActivitiesAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\Query\\GetUserActivitiesAction"
qmd: "contract GetUserActivitiesAction activity query attivita causate da utente causer_id causer_type ACT-QUSER"
---

# GetUserActivitiesAction

Restituisce le attività causate da un utente.

## Input

- `UserContract $user`: deve essere anche un Eloquent `Model`.
- `int $limit = 50`: numero massimo di righe, positivo.

## Output

- `Collection<int, Activity>`: dalla più recente, con `subject` eager-loaded.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACT-QUSER-INV-1 | Un utente che non è un `Model` lancia `InvalidArgumentException('User must be an Eloquent model')`. | — (non dimostrato) |
| ACT-QUSER-INV-2 | `$limit <= 0` lancia `InvalidArgumentException('Limit must be positive')`. | — (non dimostrato) |
| ACT-QUSER-INV-3 | Un'attività è dell'utente solo se `causer_id` e `causer_type` coincidono entrambi. Attività con solo `causer_id` (fallback su `Auth::id()`, vedi `log-activity-action.md`) sono escluse. | — (non dimostrato) |

## Effetti collaterali

Sola lettura.

## Errori

- `InvalidArgumentException` (INV-1, INV-2).

## Non fa

- Non filtra per tipo evento.
- INV-3 è una conseguenza da segnalare: un'attività scritta con l'utente autenticato ma senza `$user` esplicito non appare qui.

