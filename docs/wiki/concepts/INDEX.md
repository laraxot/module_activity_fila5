---
title: "Activity Concepts Index"
type: index
module: Activity
tags: [activity, concepts, phpstan, pest]
created: 2026-05-11
updated: 2026-07-20
qmd: "Activity concepts index phpstan pest discipline"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/328"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/329"
---

# Activity Module - concepts Index

## Purpose
Index for Activity module concepts.

## On-Demand Loading

```bash
qmd search "Activity concepts" --limit 5
```

## PHPStan / Testing

- [phpstan-pest-discipline](phpstan-pest-discipline.md) — PHPStan Activity con test che restano Pest.
- [phpstan-compliance](phpstan-compliance.md) — stato compliance PHPStan del modulo.
- [phpstan-module-config-zero](phpstan-module-config-zero.md) — regola config zero per phpstan.neon del modulo.
- [testcase-hierarchy-architecture](testcase-hierarchy-architecture.md) — Activity TestCase estende XotBaseTestCase; nessun Nwidart BaseTestCase nella v13 installata.
- [testing](testing.md) — note di testing del modulo.

## Actions / QueueableAction

- [no-app-support-queueable-actions](no-app-support-queueable-actions.md) — mappa legacy `app/Support` → Actions attuali; **documenta il doppione `ActivityLogger` non ancora rimosso** (`Actions/ActivityLogger` legacy vs `Adapters/ActivityLogger` corrente).
- [no-services-no-support-queueable-actions](no-services-no-support-queueable-actions.md) — divieto generale `app/Services`/`app/Support`, tutto in `app/Actions`.
- [queueable-action-execute-entrypoint](queueable-action-execute-entrypoint.md) — `execute()` come unico entrypoint pubblico delle Action.
- [queueable-action-trait-mandatory](queueable-action-trait-mandatory.md) — trait `Spatie\QueueableAction\QueueableAction` obbligatorio.

## Filament

- [schemas-tables-pattern](schemas-tables-pattern.md) — separazione Schemas/Tables e auto-discovery XotBase.
- [xotbase-resource-zen-pattern](xotbase-resource-zen-pattern.md) — resource XotBase senza override `form()`/`table()`.

## Dominio / Modello dati

- [activity-domain-focus](activity-domain-focus.md) — perimetro del dominio Activity (audit, event-history, attribuzione).
- [model-migration-seeder-rule](model-migration-seeder-rule.md) — regola su rapporto Model/migration/seeder.
- [method-name-homonyms](method-name-homonyms.md) — omonimi di metodo da evitare tra Model/Action.
- [organizzativa-money](organizzativa-money.md) — nota organizzativa (non specifica al dominio Money, verificare contenuto prima di riusare).
- [package-ownership-event-sourcing](package-ownership-event-sourcing.md) — ownership dei package di event sourcing (spatie/laravel-event-sourcing).
- [spatie-activitylog-module-dependency](spatie-activitylog-module-dependency.md) — dipendenza da spatie/laravel-activitylog e suoi vincoli.
- [activity-log-single-migration-contract](activity-log-single-migration-contract.md) — una create per modello, uuid morphs.
- [activity-log-attribute-changes-column](activity-log-attribute-changes-column.md) — colonna attribute_changes.
- [activity-migration-ownership](activity-migration-ownership.md) — chi possiede/modifica le migration di questo modulo.

## Processo / disciplina

- [second-brain-local-discipline](second-brain-local-discipline.md) — contratto operativo docs/wiki locale.
- [context-mode-activity-discipline](context-mode-activity-discipline.md) — disciplina di context mode specifica Activity.
- [context-overflow-prevention](context-overflow-prevention.md) — prevenzione overflow di contesto durante sessioni AI.
- [composer-root-minimal-nwidart](composer-root-minimal-nwidart.md) — composer.json root minimale, merge-plugin nwidart.
- [claude-audit-static](claude-audit-static.md) — audit statico per sessioni Claude.
- [ponytail-audit](ponytail-audit.md) — audit over-engineering (ponytail) applicato al modulo.

## See Also
- [Root Trigger Map](../../../../../docs/wiki/rules/00-TRIGGER_MAP.md)
- [Root Wiki](../../../docs/wiki/)

---
*Updated: 2026-05-11*
## activity_log (migrazione)

- [activity-log-single-migration-contract](activity-log-single-migration-contract.md) — una create per modello, uuid morphs
- [activity-log-attribute-changes-column](activity-log-attribute-changes-column.md) — colonna attribute_changes

