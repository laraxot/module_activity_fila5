---
title: "Activity — PHPStan cluster A 2026-10-21"
type: story
status: done
module: Activity
epic: quality-fleet
story_id: "activity-phpstan-clusterA-20261021"
track: quality/fleet
created: 2026-10-21
updated: 2026-10-21
tags: [phpstan, cluster-a, swarm, quality, activity]
qmd: "phpstan cluster a activity zero errori level max verifica 2026-10-21"
related:
  - ../../../../Xot/docs/bmad/stories/phpstan-modules-swarm.story.md
  - ./phpstan-swarm-cluster5.story.md
  - ../filament-blueprint.md
---

# Activity — PHPStan cluster A 2026-10-21

## Contesto

Cluster A dello swarm PHPStan (Rating, Activity, Media), coordinato da
`Xot/docs/bmad/stories/phpstan-modules-swarm.story.md`. Activity
implementa l'audit trail e l'event sourcing del gestionale: Actions di
logging/ripristino, modelli `Activity`, `Snapshot`, `StoredEvent`, policy e
risorse Filament di sola consultazione.

## Errori prima/dopo

| Gate | Prima | Dopo |
|------|-------|------|
| `phpstan analyse Modules/Activity` (level max, cache reale) | 0 | 0 |
| `phpstan analyse Modules/Activity --debug` (cache ignorata) | 0 | 0 |

Comando eseguito da `laravel/`:

```bash
nice -n 10 php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Activity --debug --no-progress --error-format=table
```

Nessun errore, nessun file `app/` modificato.

## Fix e perché

Nessun fix necessario. Il modulo era già stato chiuso a 0 dalla story
`phpstan-swarm-cluster5.story.md`; la verifica fresh con cache ignorata
conferma che non ci sono regressioni introdotte dalle successive modifiche
(a oggi nessuna modifica ad `app/`). Non sono stati introdotti ignore,
baseline o indebolimenti di tipo.

Nota di scopo: i controlli di `Actions/Query/GetActivityStatisticsAction` e
`Actions/ActivityLogger` restano tipizzati (`Builder<Activity>`, shape degli
array, `isset()` su attributi magic) e non richiedono interventi.

## Test

Pest del modulo (100 file) non eseguito: la suite completa va in timeout e il
primo test isolato fallisce per `Modules\Xot\tests\Support\TestDatabaseGuard`
(connessioni multiple verso database non `_test`). È un limite di ambiente,
non del codice del modulo; con nessun file modificato il gate Pest non è
bloccante per questa story.

## Lock

`bashscripts/lock/lock.sh laravel/Modules/Activity phpstan-clusterA-20261021 swarm-clusterA`
acquisito il 2026-10-21, rilasciato a fine verifica.
