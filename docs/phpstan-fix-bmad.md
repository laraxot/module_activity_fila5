---
title: "Fix PHPStan complete — 11 → 0"
type: note
status: draft
updated: 2026-10-20
tags: [docs, activity]
qmd: "fix phpstan complete   11 → 0 activity"
---
# Fix PHPStan complete — 11 → 0
- Analisi origine → scopo → utilità → funzionalità per ogni errore rimanente.
- Correzioni: `makeTestSushiModelForPath` (arg opzionale), `ExporterEagerLoadModelStub` (tipo Builder static), fixtures `StubGetCommandsAction`, `OrderQueueFactory`.
- BMAD: docs `Modules/*/docs/` aggiornati senza timestamp.
- Second brain: `MEMORY.md` + `wiki_retro` + `wiki_observe` registrati.
- Ponytail: nessun over-engineering (signature/fix minimi).
Promemoria permanente (BMAD + second brain): Do not create laravel/Modules/*/Tests (maiuscola duplicato); solo laravel/Modules/*/tests (minuscola). Filenames .md senza timestamp. Git solo avanti (niente reset/revert/checkout). Studiare origine/scopo/utilità/funzionalità prima di ogni fix. Documentare in Modules/<mod>/docs/ con scopo/utilità/funzionalità. Sempre ricordo nei prompt bashscripts/docs/prompts.
