---
id: module-activity-readme
title: "Activity — Audit Trail e Tracciabilità Operativa"
type: module-readme
category: module-documentation
module: Activity
status: active
tags: [activity, audit, events, traceability]
created: 2026-09-14
updated: 2026-09-28
qmd: "activity audit trail events operator history module documentation"
issues:
  - "https://github.com/laraxot/module_activity_fila5/issues/50"
discussions:
  - "https://github.com/laraxot/module_activity_fila5/discussions/51"
related:
  - "./docs/"
sources: []
---

# 📊 Activity

> **Audit trail e tracciabilità operativa.**

Gestisce l'audit trail degli eventi, la tracciabilità degli operatori e la visibilità degli stati.

## Cosa offre

- **Eventi e audit trail** – registrazione completa di ogni azione
- **Modelli e relazioni** – strutture dati per tracciare flussi
- **Filtri Filament** – query parametrizzate
- **Utenti e domini** – associazione contesto

## Confini architetturali

This module owns event logging, audit trails, and relationship modeling. Its logic lives in `Actions`; admin interfaces follow Laraxot/XotBase contracts. Dependencies must be explicit and stable.

## Integrazione rapida

```bash
cd laravel
php artisan module:list
./vendor/bin/phpstan analyse Modules/Activity
```

Check test coverage and operational conventions in the local docs.

## Documentazione

The technical map is in [docs/README.md](./docs/README.md).

- [Story BMAD del modulo](./docs/stories/)
- [Regole del progetto](../../../docs/wiki/)
- [README del progetto](../../README.md)

## Qualità e manutenzione

Keep `declare(strict_types=1);` in PHP, respect project‑wide PHPStan config, and update technical docs whenever contracts evolve.

---

**Modulo** `activity` · **Laraxot ecosystem** · **Project-agnostic**
---

## Scheda tecnica verificata (2026-09-28)

| Voce | Valore |
|---|---|
| Nome dichiarato | `Activity` |
| Namespace | `Modules\\Activity\\` |
| File PHP (escluso vendor) | 701 |
| File PHP di test | 290 |
| Aree `app/` rilevate | Actions, Adapters, Contracts, Datas, Events, Exceptions, Filament, Listeners, Models, Providers, Support, Traits |
| Migrazioni PHP | 27 |
| SSoT locale | [`docs/`](docs/) e [`docs/bmad/`](docs/bmad/) |

Questa scheda è un inventario statico, non una dichiarazione di qualità. Per ogni
modifica eseguire i gate dal progetto Laravel:

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Activity
./vendor/bin/pest Modules/Activity
```

La responsabilità del modulo, le decisioni architetturali e le opportunità sono
documentate negli artefatti BMAD sotto [`docs/bmad/`](docs/bmad/). I numeri vanno
rigenerati quando il modulo cambia; non copiarli in badge non verificati.
