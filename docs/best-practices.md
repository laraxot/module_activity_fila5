---
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> d4098eb (.)
=======
>>>>>>> 26b6dbd (.)
module: theme
topic: best-practices
canonical: ../../../Themes/docs/shared-components/BEST_PRACTICES.md
---
<<<<<<< HEAD
<<<<<<< HEAD

See canonical documentation: ../../../Themes/docs/shared-components/BEST_PRACTICES.md
=======
title: Best Practices – Activity
type: rule
tags: [activity, best-practices, dry, kiss]
created: 2026-06-10
updated: 2026-06-10
qmd: self
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
>>>>>>> 2b6968d (.)
=======

See canonical documentation: ../../../Themes/docs/shared-components/BEST_PRACTICES.md
>>>>>>> d4098eb (.)
=======

See canonical documentation: ../../../Themes/docs/shared-components/BEST_PRACTICES.md
>>>>>>> 26b6dbd (.)
