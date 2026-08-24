---
title: "Rimando a project-roadmap.md"
description: "Documento unificato: il contenuto canonico vive in project-roadmap.md."
status: merged
tags: [merge, duplicato, case-only]
---

# Documento unificato

<<<<<<< .merge_file_dAUQ5W
Questo file era un duplicato esatto che differiva solo per maiuscole/minuscole, in violazione della regola no-case-only-variations. Il contenuto canonico si trova in [project-roadmap.md](./project-roadmap.md).
=======
<<<<<<< HEAD
Questo file era un duplicato esatto che differiva solo per maiuscole/minuscole, in violazione della regola no-case-only-variations. Il contenuto canonico si trova in [project-roadmap.md](./project-roadmap.md).
=======
> Roadmap **solo Activity**. Per la piattaforma intera: [platform-completion-roadmap](../../../Xot/docs/wiki/overviews/platform-completion-roadmap.md).

## Stato attuale

| Area | Stato |
|------|-------|
| PHPStan L10 | ✅ |
| TestCase → XotBaseTestCase | ✅ |
| Migrazione singola `activity_log` | ✅ |
| Test Actions con Assert | ✅ (2026-06-13) |

## Milestone modulo

1. **Pest green** — suite `tests/Unit/Actions` + feature con DB test
2. **Coverage Actions** — `ActivityLogger`, `Log*Action` ≥80% linee critiche
3. **Hook dominio Ptvx** — log automatico su ticket workflow
4. **Filament** — resource Activity read-only per admin

## Regole

- Actions + `QueueableAction`, no Services
- Test: Pest + `Assert::assert*()` per PHPStan
- [completion-status](overviews/completion-status.md) aggiornato a ogni sprint
>>>>>>> 4fd30195 (chore: update project dependencies and improve configuration)
>>>>>>> .merge_file_zlqqLo
