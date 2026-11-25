---
title: "Contratto — GetLogDirectoryAction"
type: contract
owner: Activity
status: accepted
updated: 2026-11-24
action: "Modules\\Activity\\Actions\\Log\\GetLogDirectoryAction"
qmd: "contract GetLogDirectoryAction activity log cartella base storage logs realpath ACT-LOGDIR"
---

# GetLogDirectoryAction

Restituisce il percorso reale della cartella dei log, `storage/logs` salvo indicazione diversa.

## Input

- `?string $directory = null`: cartella da risolvere; `null` usa `storage_path('logs')`.

## Output

- `string`: percorso reale (link simbolici risolti) della cartella.

## Invarianti

| ID | Regola | Test |
|---|---|---|
| `ACT-LOGDIR-INV-1` | Il risultato è il percorso reale, con i link simbolici risolti. | `GetLogFilePathActionTest.php` («resolves the log directory to its real path…») |
| `ACT-LOGDIR-INV-2` | Cartella inesistente o non directory: `InvalidLogFileException::baseDirectoryMissing`. | `GetLogFilePathActionTest.php` («fails clearly when the base directory does not exist») |

## Effetti collaterali

Nessuno. Non crea la cartella.

## Errori

- `InvalidLogFileException` se la cartella non esiste o `realpath` fallisce.

## Non fa

- Non verifica i permessi di lettura della cartella.

