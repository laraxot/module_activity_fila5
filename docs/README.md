---
title: "Activity Module - Documentazione tecnica"
type: documentation
tags: [activity, audit-log, event-sourcing, phpstan]
created: 2025-12-13
updated: 2026-09-17
---

# Modulo Activity - Documentazione tecnica

> Mappa tecnica del modulo. Il README a livello di modulo ([../README.md](../README.md)) è
> lo stub "on-demand"; questo file è il punto di ingresso ai docs veri e propri.
> Indice completo, topic-per-topic, di tutti i file sotto `docs/`: [index.md](./index.md).

## Cosa fa il modulo

Il modulo **Activity** fornisce audit trail e event sourcing per l'applicazione, basandosi su
`spatie/laravel-activitylog` e `spatie/laravel-event-sourcing` (entrambi dichiarati in
`composer.json` del modulo). Entry point principale per registrare un evento:
`Modules\Activity\Actions\LogActivityAction` (`app/Actions/LogActivityAction.php`).

## Struttura reale (`app/`)

```
Activity/app/
├── Actions/       # LogActivityAction, LogModelCreatedAction, LogUserLoginAction, ...
├── Adapters/
├── Console/
├── Contracts/
├── Enums/
├── Events/
├── Filament/      # Resources (Activity, Snapshot, StoredEvent), Actions, Pages
├── Http/
├── Listeners/
├── Models/        # Activity, Snapshot, StoredEvent, BaseModel, TestModel
├── Providers/      # ActivityServiceProvider, EventServiceProvider, RouteServiceProvider
├── Support/
├── Traits/        # HasEvents, HasSnapshots
└── View/
```

## Classi principali verificate

- `LogActivityAction` — entrypoint per loggare un evento (type, causer, subject, properties).
- `ListLogActivitiesAction` (`app/Filament/Actions/`) — Action Filament da tabella Resource per
  aprire lo storico attività di un record; dettagli in
  [actions/list-log-activities-action.md](./actions/list-log-activities-action.md).
- `ListLogActivities` (`app/Filament/Pages/`) — pagina di dettaglio log con paginazione custom.
- `ActivityResource`, `SnapshotResource`, `StoredEventResource` (`app/Filament/Resources/`).
- `ActivityServiceProvider` — registrazione modulo, route, view, traduzioni.
- Trait `HasEvents`, `HasSnapshots` (`app/Traits/`) — non esiste un trait `LogsActivity` locale:
  quello effettivamente usato è `Spatie\Activitylog\Traits\LogsActivity`.

Nota: versioni precedenti di questo file citavano modelli/widget non presenti nel codice
(`ActivityType`, `ActivityLog`, `ActivityStatsWidget` e altri widget Filament) — non esistono
sotto `app/`. Rimossi in questa revisione; vedi `git log -- Modules/Activity/docs/README.md`
per la cronologia se serve recuperare quel testo.

## Quick start

```bash
php artisan module:list
php artisan migrate
./vendor/bin/phpstan analyse Modules/Activity --memory-limit=-1
```

## Dove continuare

- [index.md](./index.md) — indice per argomento di tutti i file `.md` sotto `docs/` (755+ file,
  con sezione "Storico / da consolidare" per i duplicati noti).
- [readme-en.md](./readme-en.md) — business card in inglese.
- [wiki/](./wiki/) — "second brain" del modulo (concetti, regole, memorie, troubleshooting).
- [docs/stories/](./stories/) — story BMAD del modulo.
