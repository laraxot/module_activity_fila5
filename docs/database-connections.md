# Regola: Connessioni Database - Modulo Activity

## Principio

- **database.php**: NON aggiungere 'activity' (TenantServiceProvider la crea a runtime)
- **Modelli**: DEVONO avere `protected $connection = 'activity'` — **non rimuovere mai**

## Perché

TenantServiceProvider crea la connessione 'activity' per ogni modulo (getSnakeName). La connessione punta allo stesso DB del default, con eventuali override via env. I modelli devono dichiararla per DatabaseTransactions e coerenza.

## ⚠️ Regola critica — bug silenzioso (imparato 2026-08-19)

**Rimuovere `$connection` non genera errori.** Eloquent usa silenziosamente la connessione
default. I log di audit finiscono nel DB sbagliato senza eccezioni visibili.

Il commit `807b2f60` (6 marzo 2026) ha rimosso il valore durante una pulizia di docblock —
rimozione collaterale e non intenzionale. Non rilevato subito perché:

1. Il modulo Activity ha un **`.git` separato** dal monorepo radice. Chi lavora dalla radice
   non vede le modifiche al modulo in `git log`.
2. Il fallback sulla connessione default è **silenzioso** — nessuna eccezione, l'app continua
   a funzionare con dati nel posto sbagliato.

**Regola:** prima di modificare qualsiasi proprietà in un modello, verificare nel repo del
**modulo** (non solo nella radice) se aveva un valore esplicito con un motivo architetturale.

Vedere: [stories/9.1.fix-connection-property-removed.story.md](stories/9.1.fix-connection-property-removed.story.md)

## Modelli che usano la connessione 'activity'

- StoredEvent, Activity, Snapshot, BaseModel (Activity), BaseActivity (Xot)

## Modelli - pattern obbligatorio

```php
/** @var string */
protected $connection = 'activity';
```

## Anti-pattern: $connection = null

**MAI** usare `protected $connection = null` nel modulo Activity. Null = connessione default (mysql), rompe coerenza e DatabaseTransactions. Vedi [basemodel-connection-why-activity-not-null](basemodel-connection-why-activity-not-null.md).

## .env.testing - NO variabili DB_*_ACTIVITY

NON usare DB_DATABASE_ACTIVITY, DB_USERNAME_ACTIVITY, DB_PASSWORD_ACTIVITY in .env.testing. TenantServiceProvider usa fallback dal default. Vedi [fix03](prompts/fix03.txt).

## Collegamenti

- [fix01](prompts/fix01.txt)
- [fix02](prompts/fix02.txt)
- [fix03](prompts/fix03.txt)
- [basemodel-connection-why-activity-not-null](basemodel-connection-why-activity-not-null.md)
- [testing-coverage-policy](testing-coverage-policy.md)
- [database-connections rule](../../../.cursor/rules/database-connections.mdc)
