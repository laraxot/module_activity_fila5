---
title: "Activity — BMAD Setup Guide"
type: concept
tags: [setup, activity, convenzioni, gate, laraxot]
created: 2026-09-28
updated: 2026-09-28
qmd: "Activity setup guide convenzioni gate phpstan pint action resource"
related:
  - ./quick-reference.md
  - ./architecture.md
  - ./architecture/module-map.md
  - ./brainstorming.md
issues: []
discussions: []
---

# Activity — BMAD Setup Guide

> **SUMMARY**: cosa serve per lavorare sul modulo `Activity` e quali regole
> valgono qui. Le regole sono quelle del progetto, con i punti in cui il modulo
> ha scelto qualcosa di proprio.

## Scopo

Rendere ripetibile e verificabile il lavoro sul modulo `Activity`: audit delle
azioni utente (Spatie Activity + event sourcing) e visualizzatore dei log di
file Laravel.

## Documentazione BMAD di questo modulo

| File | Quando leggerlo |
|---|---|
| [`README.md`](./README.md) | indice completo del modulo |
| [`architecture.md`](./architecture.md) | struttura e scelte tecniche |
| [`architecture/module-map.md`](./architecture/module-map.md) | quale file toccare |
| [`architecture/module-boundary.md`](./architecture/module-boundary.md) | cosa NON mettere nel modulo |
| [`brainstorming.md`](./brainstorming.md) | decisioni, problemi aperti, scelte scartate |
| [`brainstorming/module-opportunities.md`](./brainstorming/module-opportunities.md) | brainstorming preesistente |
| [`epics/module-roadmap.md`](./epics/module-roadmap.md) | roadmap delle epic |
| [`quick-reference.md`](./quick-reference.md) | riferimento rapido |
| `stories/` | storie gia working-on |

## Regole del progetto che valgono anche qui

- Estendere le classi base Xot (`XotBaseModel`, `XotBaseResource`, `XotBasePage`),
  mai le classi Filament dirette.
- Logica di business in **Spatie Queueable Action** con `->execute()`, mai
  `Service`.
- PHPStan `level: max` su `Modules/`, **senza baseline e senza `ignoreErrors`**.
- Nessuna stringa hardcoded nelle label: si traducono dal modulo Lang.
- Documentazione in `Modules/<Mod>/docs/`, mai alla root del repo.
- Niente `migrate:fresh`, niente `--force`, niente `RefreshDatabase`: dati sacri.
  Sull'host `10.100.200.15` inoltre **non si lanciano test**.

## Scelte specifiche di Activity

- **Estendi Spatie, non reimplementare**: `Activity`, `StoredEvent` e `Snapshot`
  derivano dalle classi Spatie e aggiungono solo cast e trait Xot.
- **Il contratto pubblico e `app/Contracts/ActivityRecorderContract.php`**: se
  un altro modulo ha bisogno di registrare, passa dall'evento, non dalla
  chiamata diretta.
- **Il log viewer viaggia in DTO**: sette classi in `app/Datas/`, niente array
  anonimi.
- **Prima di scrivere, verifica la scrivibilita**: `CheckActivityLogWritableAction`
  e `IsActivityLogSchemaWritableAction` esistono perche l'ambiente e condiviso.

## Cosa NON fare

| Non fare | Perche |
|---|---|
| chiamare `ActivityRecorderContract::record()` da un altro modulo | il contratto impone il dispatch dell'evento |
| creare una tabella audit parallela a `activity` | `Activity` estende gia Spatie Activity |
| aggiungere un `Service` in `app/Services/` | vietato: usare `Action` |
| modificare `phpstan.neon` o aggiungere baseline | file sacro, errori da correggere |
| toccare `Activity/Activity/` | clone annidato committato, fuori scope (P4) |
| eseguire test sull'host `10.100.200.15` | dati sacri: `.env.testing` solo altrove |

## Gate prima di dichiarare finito

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Activity   # 0 errori
./vendor/bin/pint --test Modules/Activity                            # 0 fallimenti
./vendor/bin/parallel-lint Modules/Activity                           # nessun parse error
```

Il gate Pest vale solo su host diversi da `10.100.200.15`.
