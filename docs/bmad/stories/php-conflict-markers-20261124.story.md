---
title: "php-conflict-markers-20261124 (alias)"
status: superseded
superseded_by: "./php-conflict-markers.story.md"
type: alias
updated: 2026-11-24
qmd: "activity php conflict markers 20261124 alias"
---
# Alias

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

Contenuto consolidato in [./php-conflict-markers.story.md](./php-conflict-markers.story.md).


### Consequences

- Buono, perché chiude il gap descritto nel Context
- Cattivo, perché richiede write-back docs, lock e quality gate

### Confirmation

Aggiungere prova ripetibile (Pest exit code + conteggio, PHPStan, o skip host documentato).
