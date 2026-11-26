---
title: "Contratto — FilterLogEntriesAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\Log\\FilterLogEntriesAction"
qmd: "contract FilterLogEntriesAction activity log filtro livello ricerca testo voci piu recenti limite ACT-LOGFILTER"
---

# FilterLogEntriesAction

Filtra le voci di un log per livello e testo e le restituisce dalla più recente alla più vecchia, con un tetto. Funzione pura.

## Input

- `list<LogEntryData> $entries`: voci in ordine di file (dalla più vecchia alla più recente).
- `string $level = ''`: livello, normalizzato in maiuscolo e `trim`; `''` non filtra.
- `string $search = ''`: testo, `trim`; cercato senza distinguere maiuscole nel corpo intero della voce.
- `int $limit = 200`: tetto di voci restituite; il valore effettivo è `max(1, $limit)`.

## Output

- `FilteredLogEntriesData`: `entries` (al massimo `limit`), `total` (voci corrispondenti prima del taglio).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACT-LOGFILTER-INV-1 | Il livello è confronto esatto con `entry->level` dopo il maiuscolo; senza livello non c'è filtro. | ACT-LOGFILTER-INV-1 |
| ACT-LOGFILTER-INV-2 | Il testo è cercato nel corpo intero della voce, stack trace incluso, senza distinguere maiuscole. | ACT-LOGFILTER-INV-2 |
| ACT-LOGFILTER-INV-3 | Le voci sono restituite dalla più recente. | ACT-LOGFILTER-INV-3 |
| ACT-LOGFILTER-INV-4 | `total` conta tutte le voci corrispondenti; `entries` non supera il limite. | ACT-LOGFILTER-INV-4 |
| ACT-LOGFILTER-INV-5 | Livello e testo si combinano in AND. | ACT-LOGFILTER-INV-5 |

## Effetti collaterali

Nessuno.

## Errori

- Nessuno.

## Non fa

- Non pagina per offset: il limite è fisso per richiesta (commento `ponytail` nella classe).
- Non valida il livello: lo fa `BuildLogViewerStateAction`.
- Una voce senza livello (riga grezza) non corrisponde a nessun livello esplicito.

