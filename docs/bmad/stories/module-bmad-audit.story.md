---
title: "Module BMAD audit — Activity"
type: story
status: review
updated: 2026-11-16
module: Activity
bmad: true
qmd: "story BMAD audit modulo Activity inventario gate pest phpstan finding P1"
related:
  - ../audits/activity-audit.md
  - ../epics.md
  - ../piano-miglioramento.md
---

# Story: audit BMAD profondo del modulo Activity

## Contesto

Audit source-first del modulo che deve garantire "chi ha cambiato cosa, quando e com'era prima" ([purpose](../purpose.md)).

## Acceptance

- [x] Inventario misurato e finding con `path:line` ([audit profondo](../audits/activity-audit.md)).
- [x] Sintesi + gate ([audit](../audit.md)), checklist ([ECC](../../ecc/activity-ecc-audit.md)).
- [x] Epics reali al posto del template ([epics](../epics.md)); decision-log aggiornato.
- [x] PHPStan `Modules/Activity`: 0 errori (2026-11-16).
- [ ] Pest modulo: parziale — 25 pass in 2 probe (`ActivityManagementTest`, `BaseModelBusinessLogicTest`); suite completa in timeout a 900 s (carico macchina).
- [ ] E1–E4 chiuse con test di regressione.

## Task

1. Lock dei file di `docs/` del modulo (`bashscripts/lock/`), unlock a fine lavoro.
2. Audit codice → docs; nessun PHP toccato.
3. Pack ECC e indici aggiornati; `qmd update`.

## Esito

Baseline audit consegnata: 0 P0, 5 P1, P2 elencati. Chiusura dei P1 demandata alle story figlie di [epics.md](../epics.md).
