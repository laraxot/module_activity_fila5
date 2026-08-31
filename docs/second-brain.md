---
title: second brain — puntatore modulo
type: reference
qmd: second brain modulo wiki locale laravel
updated: 2026-05-21
---

# Second brain (modulo)

Stub **puntatore**: disciplina e link esterni curati stanno nella wiki di progetto.

| Strato | Dove in questo package |
|--------|-------------------------|
| Input / note grezze | questa cartella `docs/` (escluso `docs/wiki/`) |
| Wiki compilata | `docs/wiki/` del modulo |
| Regole globali | wiki root del monorepo |

## Link operativi (relativi al repo)

- Modello: [../../../../docs/wiki/concepts/second-brain-operating-model.md](../../../../docs/wiki/concepts/second-brain-operating-model.md)
- Guida wiki modulo: [../../../../docs/wiki/how-to/module-wiki-documentation.md](../../../../docs/wiki/how-to/module-wiki-documentation.md)
- Benchmark lettura esterna (Karpathy, Obsidian, PARA, …): [../../../../docs/wiki/sources/second-brain-external-benchmarks.md](../../../../docs/wiki/sources/second-brain-external-benchmarks.md)
- **Filament (stack attuale): v5** — non v4. [filament-version.md](./filament-version.md) · policy: [../../../../docs/wiki/memories/filament-version-policy.md](../../../../docs/wiki/memories/filament-version-policy.md) · Xot: [../../Xot/docs/filament-5-laraxot-rules.md](../../Xot/docs/filament-5-laraxot-rules.md)

## Regole violate (2026-08-19)

- **Test location**: un test `IndennitaResponsabilitaTest.php` è stato creato in `laravel/tests/Feature/` invece che in `laravel/Modules/IndennitaResponsabilita/tests/`. I test radice non sono scoperti da `--coverage-filter=Modules/<M>/app` e non rispettano il PSR-4 del modulo. Regola corretta: [testing-modules-pest.md](../../../../../../bashscripts/ai/wiki/rules/testing-modules-pest.md#test-location-discipline).
- **$connection rimozione**: `$connection = 'activity'` è stato rimosso da `Activity.php`, `Snapshot.php`, `StoredEvent.php` senza una migrazione. Questo campo è obbligatorio per l'Activity module e la sua rimozione rompe il database connection. Regola: **non rimuovere mai `$connection` override a meno che non ci sia una migrazione che sposta la tabella**. Prima di ogni modifica, controlla se il campo è usato da altri modelli.
