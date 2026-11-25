---
title: "quality gates phpstan fix (alias)"
type: alias
status: deprecated
updated: 2026-11-17
qmd: "alias superseded quality-gates-phpstan-fix-.story.md"
superseded_by: "./quality-gates-phpstan-fix.story.md"
---
# quality gates phpstan fix

## Context and Problem Statement

Problema e obiettivo sono descritti nel Decision Outcome (migrazione automatica a MADR).

## Decision Drivers

- Richiesta utente / acceptance criteria della story
- Vincoli BMAD, second brain, Pest gate e dati sacri

## Considered Options

- Status quo (non fare)
- Implementare come descritto nel Decision Outcome

## Decision Outcome

Scelta: **implementare**, perché i driver sopra.

Stub alias post-strip data/timestamp. Canonico: [./quality-gates-phpstan-fix.story.md](./quality-gates-phpstan-fix.story.md).


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
