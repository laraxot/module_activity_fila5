---
title: "PHPStan Activity — module config + tests zero"
type: concept
tags: [activity, phpstan, pest, quality-gate]
created: 2026-07-13
updated: 2026-07-13
qmd: "Activity module phpstan neon tests PestFunctionBridge ListLogActivities normalizeTranslatable"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/372"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/273"
related:
  - phpstan-pest-discipline.md
  - ../../../../Xot/docs/wiki/concepts/fixcity-data-sqlite-pest-bootstrap.md
---

# PHPStan Activity — config modulo e test

## Gate monorepo (SSoT)

```bash
cd laravel && php -d memory_limit=2048M ./vendor/bin/phpstan analyse Modules
# [OK] No errors — esclude tests/
```

## Gate modulo (include tests)

```bash
cd laravel/Modules/Activity && php -d memory_limit=2048M ../../vendor/bin/phpstan analyse -c phpstan.neon
# [OK] No errors — app + database + routes + tests
```

## Config `phpstan.neon` modulo

- `pestphp/pest-plugin-phpstan` è caricato in automatico da `phpstan/extension-installer`:
  niente `includes` a mano, e **niente** `scanFiles` sul vecchio
  `../Xot/tests/Support/PestFunctionBridge.php`, rimosso il 24 ago 2026 (vietato da ADR-002)
- `treatPhpDocTypesAsCertain: false` — allineato al root
- Rimossi `ignoreErrors` stale (pattern non più matchati)

## Fix produzione (2026-07-13)

| File | Fix |
|------|-----|
| `ListLogActivities` | `normalizeTranslatable()` DRY per `__()`; rimosso guard `instanceof Builder` ridondante; loop schema senza `method_exists` |
| `LogoutListener` | `$user = $event->user` + null check esplicito |

## Fix test

- `LoginListenerTest` / `LoginLogoutListenerBehaviorTest`: `handle(new Login(...))` — import `Illuminate\Auth\Events\Login` nel namespace test
- `AccessControlTest`: namespace `Tests\Security`, `Assert` al posto di `expect()` (no bridge Pest interno)
- `SnapshotPolicyTest` / `ListLogActivitiesPageCoverageTest`: `@var TestCase $this` per `createUnitMock` / `requirePage` / `skipTest`
- Bridge PHPStan per Pest: **rimosso il 24 ago 2026**, il generatore non esiste. Ci pensa `pestphp/pest-plugin-phpstan`, caricato da `phpstan/extension-installer` — vedi `rules/pest-phpstan-bridge.md`

## Pest

Test policy/DB possono fallire se `activity_log` o permessi Spatie non presenti su `fixcity_data.sqlite` — vedi bootstrap Xot `assertFixcitySqliteReadyForTesting()`.
