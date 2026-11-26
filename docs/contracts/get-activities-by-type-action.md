---
title: "Contratto — GetActivitiesByTypeAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\Query\\GetActivitiesByTypeAction"
qmd: "contract GetActivitiesByTypeAction activity query attivita per tipo evento limite recenti ACT-QTYPE"
---

# GetActivitiesByTypeAction

Restituisce le attività recenti con un dato `event`, con causer e soggetto caricati.

## Input

- `string $type`: tipo evento, non vuoto.
- `int $limit = 50`: numero massimo di righe, positivo.

## Output

- `Collection<int, Activity>`: dalla più recente, con `causer` e `subject` eager-loaded.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACT-QTYPE-INV-1 | `$type === ''` lancia `InvalidArgumentException('Type cannot be empty')` prima di interrogare il database. | — (non dimostrato) |
| ACT-QTYPE-INV-2 | `$limit <= 0` lancia `InvalidArgumentException('Limit must be positive')`. | — (non dimostrato) |
| ACT-QTYPE-INV-3 | Filtro `event = $type`, ordine `created_at` decrescente, massimo `$limit` righe. | — (non dimostrato) |

## Effetti collaterali

Sola lettura: una query con eager loading di `causer` e `subject`. Nessuna scrittura.

## Errori

- `InvalidArgumentException` per tipo vuoto (INV-1) o limite non positivo (INV-2).

## Non fa

- Non filtra per causer o soggetto.
- Non pagina.

