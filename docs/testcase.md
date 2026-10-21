<<<<<<< .merge_file_7hDc0u
# TestCase Configuration

## Overview

Activity module TestCase extends `XotBaseTestCase` which provides:
- Database transactions for test isolation
- Automatic database creation before tests
- Automatic migrations before tests
- Configurable database connections

## Database Connections

```php
protected $connectionsToTransact = ['mysql', 'activity', 'user'];
```

This ensures all connections used by Activity models are rolled back after each test.

## How It Works

XotBaseTestCase handles everything automatically:

1. **Database Creation** (`ensureTestDatabasesExist()`):
   - Called in `createApplication()` BEFORE Laravel bootstrap
   - Creates databases from env variables: DB_DATABASE, DB_DATABASE_USER, DB_DATABASE_ACTIVITY
   - Uses raw PDO to avoid Laravel dependencies at this stage

2. **Migrations**:
   - Called in `createApplication()` AFTER database creation
   - Uses `module:migrate` to run migrations for Xot, User, Activity modules
   - Uses `--env=testing` to use .env.testing configuration
   - Runs ONLY ONCE per test process (static $migrated flag)

3. **Test Isolation**:
   - Uses `DatabaseTransactions` trait for automatic rollback
   - Each test is independent and idempotent

## Providers

```php
protected function getPackageProviders($app): array
{
    return [
        \Modules\Xot\Providers\XotServiceProvider::class,
        \Modules\User\Providers\UserServiceProvider::class,
        \Modules\Activity\Providers\ActivityServiceProvider::class,
    ];
}
```

## Running Tests

```bash
# Just run tests - everything is automatic!
./vendor/bin/pest --testsuite=Activity

# Or with coverage
./vendor/bin/pest --testsuite=Activity --coverage
```

## Migration Issues

If you encounter migration issues:
1. Drop and recreate the test database manually:
   ```bash
   mysql -u user -p -e "DROP DATABASE IF EXISTS <nome progetto>_data_test; CREATE DATABASE <nome progetto>_data_test;"
   ```
2. Run migrations manually to see errors:
   ```bash
   php artisan module:migrate Activity --env=testing
   ```
=======
---
title: "TestCase del modulo Activity"
type: note
status: active
created: 2026-10-07
updated: 2026-10-20
tags: [docs, activity, tests, testcase, pest]
qmd: "testcase activity xotbasetestcase databasetransactions connectionsToTransact makeListLogActivitiesPage pesthelpers"
related:
  - ./wiki/concepts/testcase-hierarchy-architecture.md
  - ./stories/phpstan-test-wave-activity.story.md
---

# TestCase del modulo Activity

Questa nota descrive `tests/TestCase.php` cosi' com'e' nel codice. Il perche' dell'ereditarieta' (Activity -> Xot -> Laravel) sta in [wiki/concepts/testcase-hierarchy-architecture.md](./wiki/concepts/testcase-hierarchy-architecture.md).

## Cosa fa

`Modules\Activity\Tests\TestCase` estende `Modules\Xot\Tests\XotBaseTestCase` e aggiunge solo cio' che riguarda Activity:

- `DatabaseTransactions` su `$connectionsToTransact = ['sqlite', 'activity', 'user']`: ogni test annulla le scritture di tutte e tre le connessioni. Nessun `RefreshDatabase` e nessuna migrazione nel `setUp()`.
- `setUp()` chiama `prepareSharedSqliteForTesting()` prima di `parent::setUp()` (punta le connessioni sqlite al file condiviso e condivide un solo PDO), poi imposta `auth.providers.users.model` su `Modules\User\Models\User`.
- `getPackageProviders()` compone `parent::getPackageProviders()` con `UserServiceProvider`, `ActivityServiceProvider` ed `EventServiceProvider`.
- Dati condivisi tra test: `$activityData`, `$storedEventData`, `$snapshotData`.
- Pagina Log: `$page`, `requirePage()` e il metodo statico `makeListLogActivitiesPage()`, che restituisce una `ListLogActivities` anonima con `exposeRestoreSuccess()` ed `exposeRestoreFailure()`. E' statico perche' PHPStan non tipizza `$this` nelle closure Pest annidate (`describe()` e `test()`).

## Helper per i test

- `tests/PestHelpers.php`: `activityCreateUser()`, `activityCreateActivity()` e `mockeryExpect()`, con prefisso `activity` per non collidere con gli helper degli altri moduli. `tests/Pest.php` contiene solo il `require_once` di questo file.
- `tests/Feature/TestActivityModel.php`: modello concreto per provare `BaseModel`. Sta in `Tests\Feature` e non in `Models`, quindi `GetFactoryAction` non puo' ricavarne il modulo e generargli una factory: i test verificano che esponga `factory()`, non che ne risolva una. Usa `HasFactory` (richiesto dai test sui trait) con `HasXotFactory::factory insteadof HasFactory`; una regola `insteadof` su un metodo che il trait non ha (per esempio `newFactory`) e' un fatal error di PHP che PHPStan non segnala.
- Factory nei test: `ActivityFactory::new()->createOne([...])` e `UserFactory::new()->createOne()`, come nei test gia' tipizzati del modulo.

## Eseguire i test

```bash
cd laravel
XDEBUG_MODE=off ./vendor/bin/pest Modules/Activity/tests/Unit/Models/BaseModelTest.php --no-coverage
./vendor/bin/phpstan analyse Modules/Activity --memory-limit=2G --no-progress
```

Limiti verificati il 2026-10-20:

- Le connessioni `activity` e `user` puntano a MySQL (`laravel/.env.sqlite`, vedi il commento in `laravel/phpunit.xml`) e le tabelle di test non ci sono: i test che scrivono falliscono con `SQLSTATE[42S02]`. Non servono migrazioni nel `setUp()`: vedi [testing-coverage-policy.md](./testing-coverage-policy.md) e [rules-testing-no-migrate-fresh.md](./rules-testing-no-migrate-fresh.md).
- Lanciando `pest <file>` il `tests/Pest.php` del modulo non viene caricato, quindi gli helper di `PestHelpers.php` risultano non definiti nei test che li usano. PHPStan li vede perche' analizza tutto `Modules/`.

## Storia

Il 2026-10-20 il pull dei sottomoduli ha riportato in `tests/` una generazione precedente di test e di `TestCase` (classi PHPUnit su `Tests\TestCase`, colonne inesistenti, un modulo `IndennitaResponsabilita` che qui non c'e'): 605 errori PHPStan in 19 file. Il riallineamento e' descritto in [stories/phpstan-test-wave-activity.story.md](./stories/phpstan-test-wave-activity.story.md).
>>>>>>> .merge_file_xGLuZk
