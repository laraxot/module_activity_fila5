---
title: "Riorganizzazione docs core Activity"
type: story
tags: [docs, bmad, activity, reorganization]
qmd: "riorganizzazione docs core Activity"
---

# Story — riorganizzazione docs core: Activity

- **ID:** `2026-10-09-docs-reorg-core-activity`
- **Status:** done
- **Scope:** sola documentazione del modulo Activity.

## Acceptance criteria

- [x] Esiste l'indice canonico [docs/bmad/index.md](../index.md).
- [x] Sono indicate directory canoniche e legacy con link relativi.
- [x] Inventario marker eseguito: nessun marker di merge nei `docs/` posseduti.
- [x] Nessun file di codice modificato.

## Inventario

Canoniche: [`docs/bmad/architecture`](../architecture/), [`brainstorming`](../brainstorming/), [`epics`](../epics/), [`stories`](../stories/), [`docs/wiki`](../../wiki/).

Legacy: [`docs/archive`](../../archive/), [`docs/archived`](../../archived/), [`docs/superseded`](../../superseded/), [`docs/raw`](../../raw/), [`docs/chat`](../../chat/), [`docs/use_cases`](../../use_cases/).

## Esito

I contenuti duplicati (`00-index`, README e documenti varianti) non sono stati cancellati né risolti automaticamente: la loro destinazione semantica non è determinabile senza una decisione specifica.

## Wave 2026-11-24e — date-debt (Activity slice)

Vedi SSoT: [docs-md-filename-date-debt.story.md](../../../Xot/docs/bmad/stories/docs-md-filename-date-debt.story.md).

- `php-conflict-markers.story.md` (ex `*-20261124`) + stub dated
- `phpstan-analysis-november` / inventory-april / `ARCHITECTURE` → historical+stub
- `bmad/readme.md` + `wiki/readme.md` rimossi (contenuto in `README.md`)
- **ACTIVE ISO/month docs Activity = 0**

## Diario exact-dup 2026-11-25 (Notify-UI-Activity lane)

- Exact sha256 non-stub: **0** gruppi; hotspot storico `phpstan-fixes-activity-*` ridotto a un file (≠ `phpstan-fixes.md`, no merge cieco).
- Stub body-identical (solo FM/qmd) questa wave: **26** → canoni `wiki/concepts/*`, `wiki/coverage*`, `wiki/features/activity-log-ui-improvements`.
- Counts: total md **730→730**; non-stub **708→682**; stubs **22→48**.
- `*-duplicate.md` near-name lasciati (hash diverso dal canone).
- Lock: `bashscripts/lock/docs-consolidate-Notify-UI-Activity.lock`.
