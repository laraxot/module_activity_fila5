---
title: "Contratti del modulo Activity"
type: index
module: Activity
status: active
created: 2026-11-18
updated: 2026-11-26
qmd: "activity contracts readme formato contratto di comportamento azioni invarianti marker contract docblock"
---

# Contratti del modulo Activity

Un contratto descrive il comportamento promesso da una Action con effetti collaterali o invarianti di dominio: cosa riceve, cosa restituisce, cosa garantisce, cosa tocca, quando fallisce e cosa **non** fa. Regola e governance: `Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Formato

Un file per Action, nome in kebab-case della classe (`log-activity-action.md`), frontmatter con `type: contract` e `action: "Modules\\Activity\\Actions\\..."`, e queste sei sezioni nell'ordine:

```markdown
## Input
## Output
## Invarianti
## Effetti collaterali
## Errori
## Non fa
```

Gli invarianti hanno ID stabili `<SCOPE>-INV-<N>` (oggi con due sigle, `ACT-…` e `ACTIVITY-…`: non si rinominano, gli ID sono già citati nei test) e il test Pest che li verifica usa lo stesso ID come `->group('<ID>')`. Il docblock dell'Action rimanda al file con `@contract docs/contracts/<file>.md`; chi cambia il comportamento aggiorna contratto, codice e test nello stesso commit. Il test `Modules/Xot/tests/Unit/Docs/ActionContractsAreCompleteTest.php` controlla che ogni file `type: contract` abbia le sei sezioni, un'`action:` esistente e il `@contract` nel docblock di quella classe.

## Quali Action hanno un file

Ogni Action del modulo che scrive il registro, legge i file di log o ha invarianti di dominio ha un file proprio:
l'inventario completo e' in [index.md](./index.md) (indice machine-readable in [INDEX.md](INDEX.md)). Se una Action
acquisisce effetti collaterali rilevanti (dati personali, servizi esterni), si estrae in un file qui e si aggiorna
il docblock con `@contract docs/contracts/<file>.md`.

Le decisioni dietro i contratti stanno in [../adr/](../adr/README.md).

## Contratti

- [activity-logger](activity-logger.md) — Facciata di scrittura e lettura del log attività: registra eventi generici e del modello e offre le query e la pulizia.
- [activity-maintenance-action](activity-maintenance-action.md) — Cancella le attivita' piu' vecchie di N giorni, a blocchi.
- [apply-activity-config-action](apply-activity-config-action.md) — Copia nella configurazione runtime `activitylog.*` le impostazioni salvate dal tenant.
- [authorize-log-access-action](authorize-log-access-action.md) — Chi puo' consultare e scaricare i file di log.
- [build-log-file-tree-action](build-log-file-tree-action.md) — Trasforma l'elenco piatto dei file di log in un albero di cartelle per la pagina Log.
- [build-log-viewer-state-action](build-log-viewer-state-action.md) — Compone lo stato completo della pagina Log per un render: elenco e albero dei file e, per il file scelto, le voci della coda filtrate.
- [check-activity-log-writable-action](check-activity-log-writable-action.md) — Dice se la tabella del log attività esiste ed è nello schema atteso (colonna `attribute_changes`).
- [download-log-file-action](download-log-file-action.md) — Risposta HTTP di download per un file di log scelto dall'utente.
- [filter-log-entries-action](filter-log-entries-action.md) — Filtra le voci di un log per livello e testo e le restituisce dalla più recente alla più vecchia, con un tetto.
- [get-activities-by-type-action](get-activities-by-type-action.md) — Restituisce le attività recenti con un dato `event`, con causer e soggetto caricati.
- [get-activity-statistics-action](get-activity-statistics-action.md) — Statistiche del log attività (totale, per tipo, oggi, settimana, mese) per la dashboard, con cache di 5 minuti per utente.
- [get-log-directory-action](get-log-directory-action.md) — Restituisce il percorso reale della cartella dei log, `storage/logs` salvo indicazione diversa.
- [get-log-file-path-action](get-log-file-path-action.md) — Unico punto in cui l'input dell'utente del visualizzatore di log (`LogViewer`) diventa un percorso su disco; lettura (`BuildLogViewerStateAction`) e download (`DownloadLogFileAction`) passano da qui.
- [get-model-activities-action](get-model-activities-action.md) — Restituisce le attività recenti il cui soggetto è un dato modello Eloquent.
- [get-recent-activities-action](get-recent-activities-action.md) — Restituisce le ultime attività registrate, senza filtri.
- [get-subject-activity-log-action](get-subject-activity-log-action.md) — Restituisce il log di un soggetto identificato da classe e id, come array, senza bisogno di un'istanza del modello.
- [get-user-activities-action](get-user-activities-action.md) — Restituisce le attività causate da un utente.
- [is-activity-log-schema-writable-action](is-activity-log-schema-writable-action.md) — Verifica che la tabella `activity_log` esista e abbia la colonna `attribute_changes`, richiesta da Spatie activitylog v4+.
- [list-log-files-action](list-log-files-action.md) — Elenca in modo ricorsivo i file `*.log` sotto la cartella dei log, dal più recente al più vecchio.
- [log-activity-action](log-activity-action.md) — Scrive una riga in `activity_log` (modello `Modules\Activity\Models\Activity`, connessione `activity`).
- [log-model-created-action](log-model-created-action.md) — Registra l'evento `created` di un modello Eloquent con i suoi attributi.
- [log-model-deleted-action](log-model-deleted-action.md) — Registra l'evento `deleted` di un modello Eloquent con i suoi attributi.
- [log-model-updated-action](log-model-updated-action.md) — Registra l'evento `updated` di un modello Eloquent con valori precedenti, nuovi e modificati.
- [log-user-login-action](log-user-login-action.md) — Registra il login di un utente.
- [log-user-logout-action](log-user-logout-action.md) — Registra il logout di un utente.
- [parse-log-entries-action](parse-log-entries-action.md) — Divide il testo di un log nel formato Monolog di Laravel in voci.
- [read-log-tail-action](read-log-tail-action.md) — Legge solo gli ultimi N byte di un file di log, senza caricarlo intero in memoria.
- [record-subject-activity-action](record-subject-activity-action.md) — Registra un evento su un soggetto identificato da classe e id, senza bisogno di un'istanza del modello.
- [redact-model-attributes-action](redact-model-attributes-action.md) — Rimuove dagli attributi di un modello le chiavi sensibili prima della persistenza nel log attività.
- [restore-activity-action](restore-activity-action.md) — Riporta un record ai valori che aveva prima di una modifica, presi dalle `properties.old` di un'attivita'.

## Stato di copertura

Contratti: 30 (uno per Action in `app/Actions`, tutte con `@contract` nel docblock). Invarianti: 96, dimostrate da un test `->group('<ID>')`: 51 (conteggio del 2026-11-26 con `rg "group\(" tests`). Le altre portano «— (non dimostrato)» nella colonna Group.

## Backlog contract

Nessuna Action di `app/Actions` è senza contratto. Fuori dalla regola (non sono Action) ma scrivono righe di `activity_log`; candidate a contratto se si decide di estenderlo oltre le Action:

- `app/Adapters/ActivityLogger.php` e `app/Adapters/ActivityRecorder.php`: facciate che delegano alle Action `LogModel*`, `LogUser*`, `RecordSubjectActivityAction` (scrittura di righe di audit).
- `app/Listeners/LoginListener.php` e `app/Listeners/LogoutListener.php`: scrivono le attività di accesso; `LogoutListener` fa un `save()` su un `Activity` appena creato (`LogoutListener.php:64`, vedi ADR 0001).

## Backlog test

Invarianti senza test con group (da scrivere o da annotare quando un test esistente le prova davvero). Dopo l'ID, la nota del contratto precedente sul test più vicino, dove c'era:

- `ACT-LOGGER-INV-3` (activity-logger)
- `ACT-LOGGER-INV-4` (activity-logger) — `ActivityLoggerTest.php` (~riga 174)
- `ACT-LOGGER-INV-5` (activity-logger) — `ActivityLoggerTest.php` (~righe 179, 190)
- `ACT-LOGGER-INV-6` (activity-logger)
- `ACT-CLEAN-INV-1` (activity-maintenance-action)
- `ACT-CLEAN-INV-2` (activity-maintenance-action)
- `ACT-CFG-INV-1` (apply-activity-config-action)
- `ACT-CFG-INV-2` (apply-activity-config-action) — `ActivityConfigDataTest.php` (chiamate a `execute()`, non verificate riga per riga)
- `ACT-SCHEMA-CHK-INV-1` (check-activity-log-writable-action)
- `ACT-SCHEMA-CHK-INV-2` (check-activity-log-writable-action)
- `ACT-SCHEMA-CHK-INV-3` (check-activity-log-writable-action)
- `ACT-QTYPE-INV-1` (get-activities-by-type-action)
- `ACT-QTYPE-INV-2` (get-activities-by-type-action)
- `ACT-QTYPE-INV-3` (get-activities-by-type-action) — `CoverageHundredActionsTest.php` (percorso positivo, non verificato riga per riga)
- `ACT-QSTATS-INV-1` (get-activity-statistics-action)
- `ACT-QSTATS-INV-2` (get-activity-statistics-action)
- `ACT-QSTATS-INV-3` (get-activity-statistics-action) — `AdapterActivityLoggerDelegationTest.php` (verifica la chiave `total`)
- `ACT-QSTATS-INV-4` (get-activity-statistics-action)
- `ACT-QMODEL-INV-1` (get-model-activities-action) — `CoverageHundredActionsTest.php` (percorso positivo, non verificato riga per riga)
- `ACT-QRECENT-INV-1` (get-recent-activities-action)
- `ACT-QRECENT-INV-2` (get-recent-activities-action) — `QueryAndValidationTest.php` (richiama l'Action, non verificato)
- `ACT-QSUBJECT-INV-1` (get-subject-activity-log-action) — `CoverageHundredActionsTest.php`, `QueryAndValidationTest.php`, `AdapterActivityRecorderTest.php` (percorsi, non verificati riga per riga)
- `ACT-QSUBJECT-INV-2` (get-subject-activity-log-action)
- `ACT-QUSER-INV-1` (get-user-activities-action)
- `ACT-QUSER-INV-2` (get-user-activities-action)
- `ACT-QUSER-INV-3` (get-user-activities-action)
- `ACT-SCHEMA-IS-INV-2` (is-activity-log-schema-writable-action)
- `ACT-SCHEMA-IS-INV-3` (is-activity-log-schema-writable-action)
- `ACTIVITY-LOG-INV-3` (log-activity-action)
- `ACTIVITY-LOG-INV-4` (log-activity-action)
- `ACT-MCREATE-INV-1` (log-model-created-action)
- `ACT-MCREATE-INV-2` (log-model-created-action) — `CoverageHundredActionsTest.php` (~riga 177, `event = 'created'`)
- `ACT-MCREATE-INV-3` (log-model-created-action)
- `ACT-MDELETE-INV-1` (log-model-deleted-action)
- `ACT-MDELETE-INV-2` (log-model-deleted-action) — `ActivityActionsUnitTest.php`, `CoverageHundredActionsTest.php` (percorso, non verificato nel dettaglio)
- `ACT-MDELETE-INV-3` (log-model-deleted-action)
- `ACTIVITY-MODEL-LOG-INV-2` (log-model-updated-action) — `LogModelUpdatedActionTest.php`, senza group
- `ACTIVITY-MODEL-LOG-INV-3` (log-model-updated-action)
- `ACT-LOGIN-INV-1` (log-user-login-action) — `ActivityActionsUnitTest.php`, `LogActionsTest.php` (percorsi, non verificati nel dettaglio)
- `ACT-LOGIN-INV-2` (log-user-login-action)
- `ACT-LOGOUT-INV-1` (log-user-logout-action) — `LogUserLogoutActionTest.php`, `ActivityActionsUnitTest.php` (percorsi, non verificati nel dettaglio)
- `ACT-LOGOUT-INV-2` (log-user-logout-action)
- `ACT-RECSUBJ-INV-1` (record-subject-activity-action) — `CoverageHundredActionsTest.php`, `QueryAndValidationTest.php`, `AdapterActivityRecorderTest.php` (percorsi, non verificati nel dettaglio)
- `ACT-RECSUBJ-INV-2` (record-subject-activity-action)
- `ACT-REDACT-INV-2` (redact-model-attributes-action)
