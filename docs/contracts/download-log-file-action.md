---
<<<<<<< .merge_file_ReLScB
title: "Contratto — DownloadLogFileAction"
type: contract
action: "Modules\Activity\Actions\Log\DownloadLogFileAction"
tags: [contract, action, log-viewer, download, filesystem]
created: 2026-11-24
updated: 2026-11-24
related:
  - ../adr/log-viewer-single-path-resolver.md
  - resolve-log-file-path-action.md
=======
title: "Contratto: DownloadLogFileAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\Log\\DownloadLogFileAction"
qmd: "contract DownloadLogFileAction activity log download file BinaryFileResponse streaming storage logs"
related:
  - ../adr/0003-log-viewer-single-path-resolver.md
  - get-log-file-path-action.md
>>>>>>> .merge_file_5Y8q1V
  - ../../app/Actions/Log/DownloadLogFileAction.php
  - ../../tests/Unit/Actions/Log/DownloadLogFileActionTest.php
---

# DownloadLogFileAction

<<<<<<< .merge_file_ReLScB
Risposta di download per un file di log scelto dall'utente nella pagina `LogViewer` (azione Filament di download).
Sorgente: `app/Actions/Log/DownloadLogFileAction.php`.

Test: `cd laravel && vendor/bin/pest Modules/Activity/tests/Unit/Actions/Log/DownloadLogFileActionTest.php`.

## Input

- `string $file`: percorso relativo alla cartella dei log, come lo tiene la pagina.

## Output

- `BinaryFileResponse` con `Content-Type: text/plain; charset=UTF-8` e nome file = percorso relativo con `/` sostituiti da
  `_` (`reports/252/daily.log` → `reports_252_daily.log`).
=======
Risposta HTTP di download per un file di log scelto dall'utente. Il percorso passa da `GetLogFilePathAction`.

## Input

- `string $file`: percorso relativo alla cartella dei log (`storage/logs`).

## Output

- `BinaryFileResponse`: nome file = percorso relativo con `/` sostituito da `_` (`reports/daily.log` diventa `reports_daily.log`), `Content-Type: text/plain; charset=UTF-8`.
>>>>>>> .merge_file_5Y8q1V

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< .merge_file_ReLScB
| ACTIVITY-LOGDOWNLOAD-INV-1 | Il file completo arriva come `BinaryFileResponse` (letto a blocchi dal disco), `text/plain`, con nome senza barre. | `ACTIVITY-LOGDOWNLOAD-INV-1` |
| ACTIVITY-LOGDOWNLOAD-INV-2 | Il percorso passa da `ResolveLogFilePathAction`: file fuori dalla cartella dei log, inesistenti, non `.log`, vuoti o assoluti sono rifiutati. | `ACTIVITY-LOGDOWNLOAD-INV-2` |

## Effetti collaterali

- Apre il file in lettura quando la risposta viene inviata; nessuna scrittura.

## Errori

- `InvalidLogFileException` dal risolutore, non catturata: la pagina la trasforma in 404.

## Non fa

- Non controlla i permessi: la pagina chiama `AuthorizeLogAccessAction` in `canAccess()` e di nuovo, con
  `abort_unless(…, 403)`, nel corpo dell'azione di download.
- Non usa il download di Livewire (`response()->streamDownload` dentro un componente): quello legge tutto il file in
  memoria e lo codifica in base64.
- Non comprime e non taglia il file: il download è sempre il file intero (la pagina mostra solo la coda).
=======
| ACTIVITY-LOGDOWNLOAD-INV-1 | Il file completo arriva come `BinaryFileResponse` (letto a blocchi dal disco, non in memoria ne' in base64), `text/plain`, con nome senza barre. | ACTIVITY-LOGDOWNLOAD-INV-1 |
| ACTIVITY-LOGDOWNLOAD-INV-2 | Il percorso passa da `GetLogFilePathAction`: file fuori dalla cartella dei log, inesistenti, non `.log`, vuoti o assoluti sono rifiutati con `InvalidLogFileException`. | ACTIVITY-LOGDOWNLOAD-INV-2 |

## Effetti collaterali

- Nessuna scrittura. Il file viene letto quando la risposta e' inviata, non in questa Action.

## Errori

- `InvalidLogFileException`, propagata da `GetLogFilePathAction` e non catturata: la pagina e la pagina Folio rispondono 404.

## Non fa

- Non verifica l'autorizzazione: la verificano i chiamanti con `AuthorizeLogAccessAction` (la pagina la ripete anche dentro l'azione di download).
- Non comprime e non taglia il file: il download e' sempre il file intero (la pagina ne mostra solo la coda).
- Se il file sparisce tra la risoluzione e l'invio vale il comportamento di Symfony (non verificato).
>>>>>>> .merge_file_5Y8q1V
