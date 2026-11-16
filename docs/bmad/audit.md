---
id: Activity/module-audit
title: "Audit brownfield del modulo Activity"
status: in-progress
epic: module-quality
module: Activity
qmd: "Activity audit architettura qualità PHPStan Pest BMAD"
references:
  - ../bmad/index.md
  - ../../Xot/docs/ecc/00-index.md
---

# Audit del modulo Activity

## Scopo e confini

Activity implementa l'audit trail applicativo: Actions di registrazione,
modelli Activity/Snapshot/StoredEvent, policy, listener di autenticazione e
risorse Filament. Le verifiche devono dimostrare il contratto di audit e non
limitarsi a silenziare PHPStan.

## Inventario verificato

| Area | Conteggio | Evidenza |
|---|---:|---|
| PHP del modulo | 349 | inventario source-first del worktree |
| Test PHP | 152 | inventario source-first del worktree |
| Markdown sotto docs | 797 | patrimonio storico da deduplicare |
| Marker Git reali | 0 | scansione PHP/JSON/YAML |
| composer.json/module.json | validi | parsing JSON riuscito |
| PHPStan mirato | 0 errori | analisi del modulo completata |

## Finding e gate

I sette finding storici nei sei test Unit delle Actions, listener, modelli e
policy sono stati corretti con asserzioni semantiche e narrowing dei valori
mixed. Restano da verificare Pest, runtime/database e la ridondanza dei
documenti esistenti.

    cd laravel
    php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Activity --no-progress
    ./vendor/bin/pest Modules/Activity/tests --no-coverage

Non dichiarare il modulo chiuso finché Pest non ha un risultato osservabile in
ambiente testing sicuro.

## Stato

**In progress:** PHPStan e inventario statico verdi; Pest e audit semantico
completo ancora pendenti.

