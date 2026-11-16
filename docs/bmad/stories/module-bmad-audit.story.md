---
title: "Module BMAD audit — Activity"
status: review
updated: 2026-11-16
module: Activity
bmad: true
qmd: "story BMAD audit modulo Activity inventario gate"
---

# Story: audit BMAD del modulo Activity

## Acceptance

- [x] Inventario source-first (2026-11-16).
- [x] Audit + piano in `docs/bmad/`.
- [x] Pack ECC in `docs/ecc/`.
- [x] Pest modulo eseguito in ambiente testing stabile.
- [ ] Finding P0/P1 chiusi con regressione.

## Riferimenti

- [audit](../audit.md)
- [piano](../piano-miglioramento.md)
- [ECC](../../ecc/activity-ecc-audit.md)

## Esito

Baseline audit aggiornata. PHPStan tree `Modules` a 0. Pest e chiusura P0/P1 aperti.

## Pest Feature fixes 2026-11-16

`Modules/Activity/tests/Feature`: 16 failed / 165 passed → **0 failed / 181 passed / 9 skipped**
(`PEST_OUT=/tmp/pest-activity-feature-fix.log bash bashscripts/tools/pest-scratch-db.sh Modules/Activity/tests/Feature`,
Duration ~660s). PHPStan `Modules/Activity` resta a 0 errori.

Cause e fix:

- **Helper globali non caricati** (`activityCreateUser`): Pest carica `Pest.php`/`Helpers.php`
  solo dal `--test-directory` della run. Stesso pattern del fix Unit: `TestCase::activityCreateUser()`
  e `TestCase::activityCreateActivity()` static in `tests/TestCase.php`; aggiornati
  `tests/Feature/ActionsTest.php` e `tests/Security/AccessControlTest.php`.
- **Trait factory**: `BaseModelBusinessLogic{,Pest}Test` asserivano `HasFactory`, ma la
  convenzione Laraxot e' `HasXotFactory` (ereditato da `XotBaseModel`, come in
  `Modules/Xot/tests/Feature/XotBaseModelBusinessLogicTest.php`). Allineate le asserzioni.
- **Docs dedup**: `CodeQualityTest` cercava `docs/README.md`/`docs/readme.md`, consolidati
  in `docs/bmad/readme.md` (commit 73c5b7dc). Test allineato al nuovo path.
- **Tooltip action**: `ListLogActivitiesAction` non usa piu' `->tooltip()` hardcoded
  (regola no-filament-labels, auto-traduzione LangServiceProvider). Test allineato:
  `getTooltip()` e' `null` di proposito.
- **Pagine Lista Filament**: `XotBaseListRecords` non usa piu' `HasXotTable`; la tabella si
  costruisce da `XotBaseResource::table()` → `*Table` class. `FilamentTest` ora chiama
  `ActivityResource::table()`/`SnapshotResource::table()`/`StoredEventResource::table()`;
  azioni asserite via `Table::getFlatActions()` (Filament 5 indicizza per nome, non per chiave array);
  schema `SnapshotForm` allineato alle chiavi reali (`aggregate_uuid`, `aggregate_version`, `state`).
- **Confine Folio**: questo checkout non contiene il modulo `Cms` e non deve
  introdurlo. `FolioServiceProvider` applicativo non viene usato per montare
  automaticamente le pagine dei moduli; nei progetti che includono il modulo
  comune CMS il punto corretto è `Cms/app/Providers/FolioVoltServiceProvider`.
  Activity non registra quindi `Folio::path()` nel proprio provider: la pagina
  Folio di download resta una dipendenza del runtime CMS e va verificata solo
  in un progetto che possiede quel modulo.

File toccati: `tests/TestCase.php`, `tests/Feature/{ActionsTest,BaseModelBusinessLogicTest,
BaseModelBusinessLogicPestTest,CodeQualityTest,FilamentTest}.php`,
`tests/Feature/Filament/Actions/ListLogActivitiesActionTest.php`,
`tests/Security/AccessControlTest.php`, `app/Providers/ActivityServiceProvider.php`.
