---
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
  - ../../app/Actions/Log/DownloadLogFileAction.php
  - ../../tests/Unit/Actions/Log/DownloadLogFileActionTest.php
---

# DownloadLogFileAction

Risposta HTTP di download per un file di log scelto dall'utente. Il percorso passa da `GetLogFilePathAction`.

## Input

- `string $file`: percorso relativo alla cartella dei log (`storage/logs`).

## Output

- `BinaryFileResponse`: nome file = percorso relativo con `/` sostituito da `_` (`reports/daily.log` diventa `reports_daily.log`), `Content-Type: text/plain; charset=UTF-8`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
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

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/Log/DownloadLogFileAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
