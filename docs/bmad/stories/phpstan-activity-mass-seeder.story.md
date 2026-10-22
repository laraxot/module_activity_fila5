---
title: "ActivityMassSeeder — 19 method.nonObject (command nullable)"
status: done
module: Activity
type: story
created: 2026-10-21
updated: 2026-10-21
tags: [phpstan, quality, source-first, seeder]
related:
  - ./phpstan-modules-story-analyse-fix-fleet.story.md
---

# ActivityMassSeeder — fix alla sorgente (19 errori method.nonObject)

## Scopo
Il seeder di massa (`ActivityMassSeeder`) deve creare dati e riportare progresso via `$this->command->info()` / `->error()`. Quando chiamato programmaticamente (non via `artisan db:seed`), `$this->command` è `null`; il codice deve rimanere sicuro senza perdere la funzione di reporting.

## Causa radice
`Illuminate\Database\Seeder::$command` è dichiarato `?Illuminate\Console\Command`. Il seeder chiamava `->info()` direttamente senza guardia, generando 19 `method.nonObject` su tutte le chiamate nel file.

## Fix applicato
Sostituzione a livello di file: `$this->command->info(` → `$this->command?->info(` (e `->error()` analogamente). 19 sostituzioni. Nessun `@phpstan-ignore`, nessuna baseline.

## Verifica
```
./vendor/bin/phpstan analyse Modules/Activity/database/seeders/ActivityMassSeeder.php
[OK] No errors
```

## Second brain
`docs/bmad/second-brain.md` — fixed nullable Seeder command with null-safe operator; purpose preserved.
