---
title: "consolidation activity docs (alias)"
type: alias
status: deprecated
updated: 2026-11-17
qmd: "alias superseded consolidation-activity-docs-.story.md"
superseded_by: "./consolidation-activity-docs.story.md"
---
# consolidation activity docs

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

Stub alias post-strip data/timestamp. Canonico: [./consolidation-activity-docs.story.md](./consolidation-activity-docs.story.md).


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
