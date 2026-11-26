---
title: "Contratto — GetRecentActivitiesAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\Query\\GetRecentActivitiesAction"
qmd: "contract GetRecentActivitiesAction activity query attivita recenti ultime limite ACT-QRECENT"
---

# GetRecentActivitiesAction

Restituisce le ultime attività registrate, senza filtri.

## Input

- `int $limit = 50`: numero massimo di righe, positivo.

## Output

- `Collection<int, Activity>`: dalla più recente, con `causer` e `subject` eager-loaded.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACT-QRECENT-INV-1 | `$limit <= 0` lancia `InvalidArgumentException('Limit must be positive')` prima della query. | — (non dimostrato) |
| ACT-QRECENT-INV-2 | Nessun filtro, ordine `created_at` decrescente, massimo `$limit` righe. | — (non dimostrato) |

## Effetti collaterali

Sola lettura.

## Errori

- `InvalidArgumentException` (INV-1).

## Non fa

- Non filtra per utente, tipo o soggetto.

