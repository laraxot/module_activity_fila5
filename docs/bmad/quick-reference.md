---
title: "Activity — BMAD Quick Reference"
type: concept
tags: [quick-reference, activity, audit, log, action]
created: 2026-09-28
updated: 2026-09-28
qmd: "Activity quick reference comandi artisan action contratti resource filamento audit"
related:
  - ./architecture.md
  - ./architecture/module-map.md
  - ./brainstorming.md
  - ./setup-guide.md
  - ./epics/module-roadmap.md
issues: []
discussions: []
---

# Activity — BMAD Quick Reference

> **SUMMARY**: i file e i comandi che servono per lavorare sul modulo `Activity`
> senza leggere tutto. Ogni riga punta a un file reale del modulo.

## Identita

| Campo | Valore | Fonte |
|---|---|---|
| Alias | `activity` | `module.json` |
| Dipendenze | `Xot`, `User` | `module.json` → `requires` |
| Provider registrati | `ActivityServiceProvider`, `Filament\AdminPanelProvider` | `module.json` → `providers` |
| Navigazione | `sort: 20` | `config/config.php` → `navigation` |
| Rotte | `web`, `auth` | `config/config.php` → `routes` |
| Priorita | `0`, `order: 5` | `module.json` |

## Da dove parte

| Se devi... | Parti da |
|---|---|
| registrare un'azione su un modello | `app/Contracts/ActivityRecorderContract.php` |
| capire i modelli | [`architecture.md`](./architecture.md) |
| sapere cosa toccare | [`architecture/module-map.md`](./architecture/module-map.md) |
| capire le scelte | [`brainstorming.md`](./brainstorming.md) |
| le regole del progetto | [`setup-guide.md`](./setup-guide.md) |

## Registrare un'attivita

```php
// Contratto: Modules\Activity\Contracts\ActivityRecorderContract
app(ActivityRecorderContract::class)->record(
    $model::class,   // class-string
    $model->getKey(),// int|string
    'update',        // create|update|delete|restore
    ['campo' => ['old' => 1, 'new' => 2]],
);
```

La regola del modulo: **i moduli esterni dispatchano l'evento**, non chiamano
`record()` direttamente (docblock di `ActivityRecorderContract`).

## Action per area

| Area | Path | Contenuto |
|---|---|---|
| Query / letture | `app/Actions/Query/` | 6 Action: statistiche, per utente, per modello, per soggetto, per tipo, recenti |
| Log viewer | `app/Actions/Log/` | 10 Action: risoluzione path, lista, albero, tail, download, filtro, parsing, stato, autorizzazione |
| Schema | `app/Actions/Schema/` | 2 Action: verifica di scrivibilita di log e schema |

## Modelli

`Activity` (estende Spatie Activity, `properties` schemaless) — `StoredEvent`
(estende `EloquentStoredEvent`, `meta_data` schemaless) — `Snapshot` (estende
`EloquentSnapshot`). Tutti con `HasXotFactory`.

## Resource Filament

`ActivityResource`, `SnapshotResource`, `StoredEventResource` — ognuna con
`Schemas/`, `Tables/` e `Pages/` propri.

## Comandi artisan

`app/Console/Commands/` contiene solo `_components.json`: **il modulo non
espone comandi artisan propri**.

## Gate di qualita

```bash
# da laravel/ — PHPStan livello max su tutto il monorepo
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Activity

# Pint sul solo modulo
./vendor/bin/pint --test Modules/Activity

# parse check rapido
./vendor/bin/parallel-lint Modules/Activity
```

## Avvertenze

- `app/Http/{Controllers,Requests,Livewire,Middleware}` sono vuoti (solo
  `.gitkeep`): non cercare logica HTTP nel modulo.
- Cinque migrazioni diverse creano la tabella `activity`: vedi P1 in
  [`brainstorming.md`](./brainstorming.md).
- Esiste una copia annidata del modulo in `Activity/Activity/`: non modificarla
  per errore (P4 in [`brainstorming.md`](./brainstorming.md)).
