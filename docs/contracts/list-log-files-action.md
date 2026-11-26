---
title: "Contratto — ListLogFilesAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\Log\\ListLogFilesAction"
qmd: "contract ListLogFilesAction activity log elenco file ricorsivo storage logs symlink limite 1000 ACT-LOGLIST"
---

# ListLogFilesAction

Elenca in modo ricorsivo i file `*.log` sotto la cartella dei log, dal più recente al più vecchio.

## Input

- `?string $baseDirectory = null`: cartella da esplorare; `null` usa `storage/logs`.
- `int $limit = 1000`: numero massimo di file; il valore effettivo è `max(1, $limit)`.

## Output

- `list<LogFileData>`: `path` relativo con `/`, `name`, `directory`, `size`, `modifiedAt`; ordinati per `modifiedAt` decrescente, poi per `path`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACT-LOGLIST-INV-1 | Solo file il cui nome corrisponde a `*.log`; file nascosti (dot) ignorati. | ACT-LOGLIST-INV-1 |
| ACT-LOGLIST-INV-2 | Un file il cui percorso reale (link risolti) non inizia con la cartella base è scartato. | ACT-LOGLIST-INV-2 |
| ACT-LOGLIST-INV-3 | Se la cartella base non esiste, l'Action restituisce `[]` senza eccezione. | ACT-LOGLIST-INV-3 |
| ACT-LOGLIST-INV-4 | Sono restituiti al massimo `limit` file. Limite noto: che il taglio tenga i più recenti non è asserito (il test del limite non fissa le date; l'ordine per data è provato a parte, senza limite). | ACT-LOGLIST-INV-4 |

## Effetti collaterali

- Lettura ricorsiva del filesystem. Nessuna scrittura.

## Errori

- Nessuno verso il chiamante: `InvalidLogFileException` diventa `[]`.

## Non fa

- Non filtra per nome o cartella e non pagina (commento `ponytail`).
- Un elenco vuoto non distingue "nessun log" da "cartella mancante".

