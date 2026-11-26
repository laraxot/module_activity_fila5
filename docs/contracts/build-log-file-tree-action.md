---
title: "Contratto — BuildLogFileTreeAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\Log\\BuildLogFileTreeAction"
qmd: "contract BuildLogFileTreeAction activity log albero cartelle file ordinamento naturale ACT-LOGTREE"
---

# BuildLogFileTreeAction

Trasforma l'elenco piatto dei file di log in un albero di cartelle per la pagina Log. Funzione pura.

## Input

- `list<LogFileData> $files`: file prodotti da `ListLogFilesAction`, con `path` relativo a `storage/logs` e separatori `/`.

## Output

- `LogTreeData`: nodo radice (`name=''`, `path=''`) con `count`, `folders` (sottonodi ricorsivi) e `files` (file diretti).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACT-LOGTREE-INV-1 | Ogni file compare solo nel nodo della sua cartella: i file diretti in `files`, gli altri nel sottoalbero. | ACT-LOGTREE-INV-1 |
| ACT-LOGTREE-INV-2 | Le cartelle sono in ordine naturale senza distinguere maiuscole (`9` prima di `10`, `252` prima di `1000`). Limite noto: che il confronto ignori le maiuscole non è asserito da nessun test. | ACT-LOGTREE-INV-2 |
| ACT-LOGTREE-INV-3 | I file di ogni cartella sono dal più recente al più vecchio (`modifiedAt` decrescente, poi nome). Limite noto: l'ordine per nome a parità di data non è asserito da nessun test. | ACT-LOGTREE-INV-3 |
| ACT-LOGTREE-INV-4 | `count` di un nodo = numero di file della cartella, sottocartelle incluse. | ACT-LOGTREE-INV-4 |
| ACT-LOGTREE-INV-5 | Il prefisso del percorso termina con `/`: la cartella `a` non cattura i file di `ab`. | ACT-LOGTREE-INV-5 |

## Effetti collaterali

Nessuno. Non legge il disco, non scrive, non dispatcha eventi.

## Errori

- Nessuno. Input vuoto produce una radice con `count=0`.

## Non fa

- Non filtra e non limita i file: il limite è di `ListLogFilesAction`.
- Non verifica che i percorsi esistano.

