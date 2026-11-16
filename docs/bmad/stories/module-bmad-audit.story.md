---
id: Activity/module-bmad-audit-20261116
title: "Activity: audit modulare completo"
status: ready-for-dev
module: Activity
epic: module-governance
priority: P1
created: 2026-11-16
references:
  - ../architecture/module-boundary.md
  - ../brainstorming/module-opportunities.md
  - ../epics/module-roadmap.md
---
# Story — Activity: audit modulare completo

Come manutentore del modulo Activity, voglio un audit verificato sul codice reale (non sulla documentazione), così da avere una baseline BMAD con finding numerati, rischi e next steps prioritizzati.

> Ex `module-bmad-audit-20260928.story.md`, rinominato al nome canonico e aggiornato con l'audit del 2026-11-16.

## Contesto e scope

Audit completo del modulo `laravel/Modules/Activity` (activity log / event sourcing per PTVX): struttura `app/`, `database/migrations`, `lang/` (18 lingue), `tests/` Pest, compliance Filament 5 e convenzioni Xot. Verifica PHPStan eseguita il 2026-11-16.

## Conteggi misurati

- Modelli: 10 (inclusi contratti in `Models/Contracts`, policy in `Models/Policies`)
- Actions: 31 (`Actions/Config`, `Log`, `Query`, `Schema`)
- Services: 0 (conforme alla convenzione Xot actions-over-services)
- Listeners: 2 · Policies: 4
- Filament: 29 file (3 Resource: StoredEvent, Snapshot, Activity; 5 Page inclusi LogViewer/ListLogActivities; 0 Widget)
- Test Pest: 152 file PHP in `tests/` (79 Unit + 21 Feature + fixtures/helper), ~486 blocchi `test()/it()`
- Migrazioni: 25 · Route file: 3 · Lingue lang: 18 directory
- PHPStan (`Modules/Activity`, level max): **0 errori**

## Findings

### Struttura

1. Struttura sana e modulare: `app/` copre Actions, Adapters, Console, Contracts, Datas, Enums, Events, Exceptions, Filament, Http, Listeners, Models, Providers, Traits, View. Nessun Service layer residuo.
2. `tests/` contiene sia `Unit/` sia `unit/`-like fixture dirs (`Fixtures`, `fixtures`, `Security`, `Support`) — verificare normalizzazione casing delle directory di test.
3. File markdown sparsi alla root del modulo: `test.md`, `test02.md`, `test03.md`, `test04.md`, `test2222.md`, `test444.md`, `filament.md`, `documentation.md`, `README.md` — residui di lavoro, da consolidare o rimuovere in una story di hygiene.

### Qualità codice

4. `mixed` presente in 6 file `app/` — quasi tutti in `Filament/Pages/ListLogActivities.php` (helper `stringifyTranslationValue`, callback di formattazione) e nei docblock di `Models/StoredEvent.php`. Accettabile per boundary JSON, ma da ridurre dove possibile.
5. Unico uso di `property_exists` è in un commento PHPStan (`ActivityLogger.php:263`) che documenta correttamente l'uso di `isset()` per magic attributes — conforme alla regola Xot.
6. Un `@phpstan-ignore`/`phpstan-ignore` in 1 file `app/` — verificare se ancora necessario dopo la pulizia PHPStan.
7. Nessun TODO/FIXME in `app/`. Nessuna classe Filament che estenda Filament direttamente; nessun `Filament\Forms\Form` legacy.

### Compliance Filament

8. `->label()` presente in 2 file: `Filament/Pages/LogViewer.php` (label di action filtrate via `$this->translation('activity::log_viewer.actions.*.label')` — label localizzate, accettabile se il pattern è supportato) e un commento in `Filament/Actions/ListLogActivitiesAction.php:43` che documenta il divieto. Placeholder/helperText: 0.
9. Da verificare se `LogViewer` dovrebbe usare `->translateLabel()` invece di `->label(trans(...))` secondo la regola `no-filament-labels`.

### Test

10. Copertura ampia: ~486 test in 152 file, distribuiti tra Unit (79 file) e Feature (21 file) più fixture dedicate. Nessun test vuoto `expect(true)` rilevato.
11. Verificare che i test coprano i flow critici: logging attività, query, schema, snapshot, stored events, export PDF (vedi `activity-pdf-reports.md` in docs/bmad).

### i18n

12. 18 directory lingua; `it/` ha 63 file PHP vs `en/` 18 — disparità attesa (it è la lingua primaria del progetto), ma verificare che le chiavi `en` coprano almeno le chiavi usate dal codice Filament (`log_viewer.*`, `activity::*`). File non allineati tra it/en rilevati: `activity_form.php`, `edit_activity.php`, `stored_events.php`, `log_activities_action_test.php` (it-only o en-only da incrociare).

### Docs

13. `docs/bmad/` ha README.md e 00-index.md esistenti; aree: architecture, audits, brainstorming, epics, stories. Marker di merge `<<<<<<<` presenti solo in documenti storici di inventory/conflitti (docs/wiki, docs/bmad/stories/phpstan-conflict-markers-bootstrap.story.md) — non conflitti attivi nel codice.
14. File `.md` con data nel nome fuori da `docs/bmad/`: `docs/stories/2026-10-06-phpstan-cleanup-activity.*.md`, `docs/wiki/memories/testcase-hierarchy-decision-2026-06-10.md`, ecc. — eredità pre-regola naming, non bloccante.

## Rischi

- Directory `tests/` con casing misto (`Feature` vs `feature`) può causare scoperta duplicata o skip su filesystem case-sensitive.
- File `test*.md` alla root del modulo inquinano la root e non rispettano la regola naming kebab-case.
- Disallineamento it/en sulle chiavi Filament può produrre label non tradotte in EN.

## Next steps (priorizzati)

1. **[P1]** Consolidare i file `test*.md`/`filament.md`/`documentation.md` alla root del modulo in `docs/` con naming kebab-case (story di hygiene).
2. **[P1]** Verificare e allineare le chiavi lang `it`/`en` per le aree Filament (`log_viewer`, `activity_resource`, `stored_events`).
3. **[P2]** Sostituire `->label(trans(...))` in `LogViewer.php` con `->translateLabel()` se supportato dalle action Filament 5.
4. **[P2]** Normalizzare casing delle directory `tests/` (Feature/Unit vs feature/unit) e rimuovere duplicati.
5. **[P3]** Rivedere il `@phpstan-ignore` residuo e i `mixed` in `ListLogActivities.php`.
6. **[P3]** Aggiornare `docs/sprint-status.yaml` con lo stato reale del modulo.
