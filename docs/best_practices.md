---
title: "Best Practices – Activity"
type: note
status: draft
updated: 2026-10-07
tags: [docs, activity]
qmd: "best practices   activity activity"
---
# Best Practices – Activity

## Principi DRY/KISS
- **DRY**: Centralizza logica di orchestrazione in `ActivityService`. Usa repository pattern per entità.
- **KISS**: Usa ID semplici per identificatori esterni, non UUID complessi in interfacce.
- **Clean Code**: Applica `Spatie Color` per icone tematiche senza duplicare codice.

## Componenti
- Usa `ActivityLog` per registrare eventi critici.
- Usa progetti con `status` calcolato (`active`, `paused`, `completed`).

## Test
- Implementa test di integrazione per flussi di lavoro complessi.
- Copri casi limite come transizioni di stato non valide.

## Documentazione
- Aggiorna `docs/INDEX.md` con nuovi modelli e relazioni.
- Collega a `Projects` e `Tasks` per contesto operativo.

--- BMAD + Second Brain ---
- Scopo: documentazione tecnica del modulo.
- Utilità: riferimento sviluppatori/audit.
- Funzionalità: struttura, dipendenze, convenzioni (no date .md, git avanti).
