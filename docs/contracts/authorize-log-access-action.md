---
title: "Contratto: AuthorizeLogAccessAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\Log\\AuthorizeLogAccessAction"
qmd: "contract AuthorizeLogAccessAction activity log viewer permesso log.viewAny super-admin"
related:
  - ../adr/0003-log-viewer-single-path-resolver.md
  - ../../app/Actions/Log/AuthorizeLogAccessAction.php
  - ../../app/Filament/Pages/LogViewer.php
  - ../../tests/Unit/Actions/Log/AuthorizeLogAccessActionTest.php
---

# AuthorizeLogAccessAction

Chi puo' consultare e scaricare i file di log. Regola unica usata da `LogViewer::canAccess()`, dall'azione di download della pagina e dalla pagina Folio `pages/api/log-download`.

## Input

- `?Authenticatable $user`.

## Output

- `bool`: `true` se l'utente ha il ruolo `super-admin` o il permesso `log.viewAny`.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACTIVITY-LOGACCESS-INV-1 | Accesso solo al ruolo `super-admin` o a chi ha il permesso `log.viewAny`. | ACTIVITY-LOGACCESS-INV-1 |
| ACTIVITY-LOGACCESS-INV-2 | Ospiti (`null`), utenti senza ruolo ne' permesso e utenti che non implementano `UserContract` sono respinti. | ACTIVITY-LOGACCESS-INV-2 |
| ACTIVITY-LOGACCESS-INV-3 | Se il permesso `log.viewAny` non esiste nel database l'accesso e' negato senza errore (`PermissionDoesNotExist` catturata). | ACTIVITY-LOGACCESS-INV-3 |

## Effetti collaterali

- Nessuno: legge ruoli e permessi tramite Spatie Permission.

## Errori

- Nessuno verso il chiamante: `PermissionDoesNotExist` diventa `false`; altre eccezioni si propagano.

## Non fa

- Non protegge il percorso dei file: lo fa [GetLogFilePathAction](get-log-file-path-action.md).
- Non crea il permesso mancante (va creato e assegnato dall'amministrazione dei ruoli) e non registra i tentativi negati.
- Non usa una Policy Laravel: la pagina non ha un modello.

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/Log/AuthorizeLogAccessAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
