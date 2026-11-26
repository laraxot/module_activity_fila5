---
title: "ADR — L'audit delle attività è append-oriented"
type: decision
status: accepted
module: Activity
tags: [adr, activity, audit]
created: 2026-11-23
updated: 2026-11-26
qmd: "activity adr audit attività append-oriented contesto decisione driver alternative scartate conseguenze conferma verifica activity-audit-is-append-oriented"
decision-makers: [team back office]
---

# L'audit delle attività è append-oriented

## Contesto

Activity conserva attività, snapshot ed eventi (`activity_log`, `snapshots`, `stored_events`) per ricostruire cosa è accaduto a un soggetto. Le righe nascono con un `INSERT` (`LogActivityAction`, `Activity::typedQuery()->create()`) dalle Action `LogModel*` e `LogUser*` e dai recorder `Adapters/ActivityLogger` e `Adapters/ActivityRecorder`.

La conservazione è per età: `config/local/fixcity/activitylog.php` ha `clean_after_days = 365` (il commento rimanda alla policy privacy, «Periodo di conservazione») e `routes/console.php` pianifica `activitylog:clean --force` ogni giorno; `ActivityMaintenanceAction` fa lo stesso a blocchi di 1000.

Domanda: una riga già scritta si corregge quando cambia una label o un formato, oppure la fonte resta com'è e le viste la interpretano?

## Driver della decisione

- Le righe di `activity_log` sono la prova di cosa è successo: riscriverle toglie la prova.
- Le uniche scritture su una riga esistente nel modulo sono due, entrambe note (`LogoutListener.php:64`, `RestoreActivityAction.php:33`).
- Un'etichetta o un formato cambiano nelle viste, non nella fonte.
- La conservazione è un obbligo di privacy (365 giorni nella config del tenant) e passa da una sola via, la retention per età.

## Alternative scartate

- Usare il log applicativo come unica fonte.
- Aggiornare gli eventi storici quando cambia una label.

## Decisione

Le registrazioni di audit si producono tramite le Actions e i recorder del modulo; la cronologia non viene riscritta per correggere una visualizzazione.

## Conseguenze

- La cronologia resta affidabile e interrogabile; le viste devono interpretare gli eventi senza mutare la fonte storica.
- Eccezioni note, verificate con `rg` il 2026-11-26: `Listeners/LogoutListener.php:64` fa un `save()` su un `Activity` appena creato (è un inserimento); `Actions/RestoreActivityAction.php:33` aggiorna il record del soggetto con `properties.old`, non la riga del log.
- La retention per età (`activitylog:clean`, `ActivityMaintenanceAction`) cancella fisicamente righe vecchie (nessun `SoftDeletes`): è scadenza dichiarata, non riscrittura.
- Debito: `ActivityPolicy` espone `update`, `delete` e `restore` (permessi `activity.update`, `activity.delete`, `activity.restore`) e la risorsa Filament ha `EditActivity` con `DeleteAction` nell'header (`Filament/Resources/ActivityResource/Pages/EditActivity.php`): chi ha quei permessi può modificare o cancellare una riga del log. Nessun test copre i permessi.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Activity/tests/Unit/Actions/LogActivityActionTest.php` e i gemelli `LogModelCreatedActionTest.php`, `LogModelUpdatedActionTest.php`, `LogModelDeletedActionTest.php`, `LogUserLoginActionTest.php` (stessa cartella): coprono la registrazione tramite le Action. `--group=ACTIVITY-LOG-INV-1` e `--group=ACTIVITY-LOG-INV-2` provano gli errori di `LogActivityAction`.
- `Modules/Activity/tests/Unit/ActivityPolicyTest.php` copre solo `view`: i permessi `update`, `delete` e `restore` non sono provati.
- Nessuna conferma automatica che le righe non vengano riscritte; proposta: un test che scandisce il sorgente di `Modules/Activity/app` cercando `(->|::)(update|upsert|save)\(` con allowlist delle due eccezioni note.
- Review oggi: `cd laravel && rg -n '(->|::)(update|upsert|save)\(' Modules/Activity/app --glob '*.php'` deve trovare solo `Listeners/LogoutListener.php` e `Actions/RestoreActivityAction.php`; ogni nuovo punto va giustificato qui.
