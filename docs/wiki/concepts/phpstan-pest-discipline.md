---
title: "Activity PHPStan Pest Discipline"
type: concept
module: Activity
tags: [activity, phpstan, pest, testing, second-brain]
created: 2026-06-10
updated: 2026-06-10
qmd: "Activity phpstan pest discipline method.internalClass public assertions bridge tests stay pest"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/328"
  - "https://github.com/laraxot/module_activity_fila5/issues/15"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/329"
  - "https://github.com/laraxot/module_activity_fila5/discussions/16"
related:
  - ../../../../../../docs/wiki/rules/phpstan-pest-tests-stay-pest.md
  - ../../../../../../docs/wiki/troubleshooting/phpstan-test-assertion-chaining.md
---

# Activity PHPStan Pest Discipline

Activity partecipa alla campagna `cd laravel && ./vendor/bin/phpstan analyse Modules` con una regola stretta:

- eseguire PHPStan sempre dal root Laravel: `cd laravel && ./vendor/bin/phpstan analyse Modules/Activity` oppure, a fine swarm, `cd laravel && ./vendor/bin/phpstan analyse Modules`;
- non eseguire PHPStan da dentro `Modules/Activity` e non usare eventuali config di modulo;
- non modificare, creare o rigenerare `phpstan*.neon`: `laravel/phpstan.neon` e' gestito solo dall'utente;
- non convertire test Pest in classi PHPUnit;
- correggere gli errori PHPStan nei test usando file Pest, helper tipizzati, bridge o assertion pubbliche dentro closure Pest;
- documentare ogni pattern riusabile nel wiki locale e, quando lo scope lo consente, nella chat agenti.

## Pattern operativo

```php
use PHPUnit\Framework\Assert;

test('activity row is produced', function (): void {
    $event = 'created';

    Assert::assertSame('created', $event);
});
```

Il runner, la discovery e la semantica restano Pest. `Assert::assert*()` e' solo API pubblica di assertion quando PHPStan non riesce a tipizzare la DSL `expect()`.

## Anti-pattern

- `final class ... extends TestCase` per sostituire un file Pest.
- `pest()->extend(...)` o catene su oggetti interni Pest quando PHPStan le segnala come `method.internalClass`.
- nuove ignore o baseline PHPStan.

## Pattern PHPStan L10 osservati

- `namespace` deve arrivare subito dopo `declare(strict_types=1);`; import e `uses(TestCase::class)` vanno dopo il namespace.
- Nei file Pest usare `describe()` per contenitori logici e `test()` per casi eseguibili. Evitare `test()` annidati dentro altri `test()`.
- Per fixture in-memory condivise preferire helper locali tipizzati con array-shape invece di stato su `$this` quando PHPStan non riesce a risolvere il binding Pest.
- Se un test deve usare il TestCase del modulo, importare solo `Modules\Activity\Tests\TestCase`; non duplicare con `Tests\TestCase`.

## Verifica 2026-06-10

- `cd laravel && ./vendor/bin/phpstan analyse Modules/Activity` passa con `[OK] No errors`.
- Pest sui file Activity toccati e' stato eseguito, ma l'ambiente locale blocca il bootstrap Laravel con `PDOException SQLSTATE[HY000] [1045] Access denied for user 'forge_mysql_25_1'@'localhost'` prima delle assertion.