---
title: "Indice operativo del modulo Activity"
type: index
status: active
module: Activity
created: 2026-09-26
updated: 2026-10-20
tags: [docs, activity, index]
qmd: "indice documentazione modulo activity canonico evidence legacy famiglie radice conteggi"
related:
  - ./README.md
  - ./stories/docs-ingressi-activity.story.md
  - ./stories/phpstan-test-wave-activity.story.md
---

# Indice operativo del modulo Activity

`00-INDEX.md` e' l'unico indice canonico. Gli altri file con nome simile non vanno aggiornati: [index.md](./index.md) (elenco per argomento, scritto prima della rimozione di `tasks/`), [INDEX.md](./INDEX.md) (inventario per categoria), `00-index.md` e `00-index-documentation.md` (copie e segnaposto). Identita', contenuto reale del modulo e limiti sono in [README.md](./README.md).

## Misure del 2026-10-14

- 890 file `.md` in `docs/`: 377 nella radice e 513 in 40 sottocartelle (7 delle quali senza alcun `.md`). Per confronto, il codice ha 90 file PHP in `app/`.
- 68 file senza frontmatter (17 nella radice, 12 in `stories/`, 9 in `raw/`); 101 file sono segnaposto con `status: stub` e `canonical:` verso altra cartella (43 nella radice, 28 in `archive/`, 17 in `use_cases/`).
- Nella radice, 63 gruppi di nomi che collidono per maiuscole o per `_`/`-` (148 file), per esempio `PRODUCT_ROADMAP.md`, `product-roadmap.md`, `product_roadmap.md`.
- 1.195 riferimenti non risolti (`docs-organizer.py --busy-minutes 0 links --by-name`, sola lettura): i file con piu' casi sono `duplicate-methods-analysis.md` (193), `lang-link.md` (64) e `index.md` (40).
- PHPStan sul codice: `phpstan analyse Modules/Activity` esce con 0 (2026-10-14).

## Da leggere per primo

1. [README.md](./README.md): identita', cosa fa il codice, quick start, limiti.
2. [stories/](./stories/): 37 file; le piu' recenti sono `phpstan-test-wave-activity.story.md` (test riallineati dopo il pull del 2026-10-20), `phpstan-cleanup-activity.story.md` e `docs-ingressi-activity.story.md`.
3. [decision-log.md](./decision-log.md): decisioni del modulo (la voce del 2026-10-08 riallinea il modulo al commit `bc3d22ca`).
4. [wiki/concepts/activity-log-single-migration-contract.md](./wiki/concepts/activity-log-single-migration-contract.md): una sola migrazione per `activity_log`.
5. [wiki/concepts/queueable-action-execute-entrypoint.md](./wiki/concepts/queueable-action-execute-entrypoint.md) e [actions-convention.md](./actions-convention.md): come sono scritte le Action.
6. [wiki/concepts/log-viewer-page-no-ssh.md](./wiki/concepts/log-viewer-page-no-ssh.md): pagina Log del pannello.
7. [wiki/concepts/xotbase-resource-zen-pattern.md](./wiki/concepts/xotbase-resource-zen-pattern.md) e [wiki/concepts/schemas-tables-pattern.md](./wiki/concepts/schemas-tables-pattern.md): Resource Filament.
8. [wiki/concepts/testcase-hierarchy-architecture.md](./wiki/concepts/testcase-hierarchy-architecture.md), [testcase.md](./testcase.md) e [wiki/concepts/phpstan-pest-discipline.md](./wiki/concepts/phpstan-pest-discipline.md): test e PHPStan.
9. [event-sourcing.md](./event-sourcing.md) e [wiki/concepts/event-sourcing-patterns.md](./wiki/concepts/event-sourcing-patterns.md): teoria usata dai modelli `StoredEvent` e `Snapshot`.
10. [database-connections.md](./database-connections.md) e [migration-policy.md](./migration-policy.md): connessione `activity` e regole sulle migrazioni.

## Stato delle sottocartelle

Canoniche (documentazione viva, da tenere allineata al codice):
- `stories/` (37), `wiki/concepts/` (37), `wiki/testing/` (11), `wiki/rules/` (4), `wiki/memories/` (4), `investigation/` (2), `epics/` (1), `decision-log.md`.

Evidence (misure, cronaca, importi grezzi: si leggono, non si correggono):
- `raw/` (27, immutabile), `root-md-files/` (13) e `root-txt-files/` (3) importati dalla radice del modulo, `outputs/` (1), `quality-analysis/` (1), `screenshots/` (1 immagine), `html2pdf/` (6), `charts/` (1), `performance/` (8), `errori/` (7), `bmad/` (51).

Legacy o da consolidare (nessun file va cancellato o rinominato senza migration map, DOC-006):
- `archive/` (30, di cui 28 segnaposto), `use_cases/` (119) e `use-cases/` (1): analisi di progetti esterni (bank, shop, prediction market) che non corrispondono a codice in `app/`; `roadmap/` (33); `filament/` (16); `llm-wiki/` (7); `prompts/` (5); `tecnico/` (4); `guides/` (4); `testing/` (4); `architecture/` (3).

Vuote o con solo un file di lock: `tasks/`, `archived/`, `logs/`, `schema/`, `superseded/`, `root-code-workspace-files/`.

## Famiglie della radice (377 file, classificazione euristica per nome)

| Famiglia | File | Esempi |
|---|---|---|
| PHPStan, PHPMD, qualita', copertura, ottimizzazioni, duplicati | 116 | `phpstan-fixes.md`, `phpmd-analysis.md`, `coverage.md`, `duplicate-methods-analysis.md` |
| Regole per agenti, second brain, MCP, QMD, pattern generali | 56 | `agent-confidence-discipline.md`, `qmd-setup.md`, `best-practices.md` |
| Indici, README, architettura, business logic, filosofia | 51 | `ARCHITECTURE.md` (stale), `API.md` (stale), `structure.md`, `philosophy.md` |
| Prodotto, roadmap, sprint, strategia | 35 | `PRODUCT_ROADMAP.md`, `roadmap.md`, `SPRINT_PLANNING.md` |
| Test e TestCase | 31 | `testing-strategy-implementation.md`, `login-test-implementation.md` |
| Filament | 31 | `filament-resources.md`, `filament-5-nested-resources-complete-guide.md` |
| Migrazioni e database | 29 | `migration-policy.md`, `errori-migrazione-activity-table-lezioni.md` |
| Git, conflitti di merge, sync, igiene della radice | 15 | `conflict-resolution.md`, `root-file-policy.md` |
| Event sourcing | 13 | `event-sourcing.md`, `advanced-event-sourcing-patterns.md` |

La classificazione e' fatta sul nome del file, non sulla lettura di tutti i 377: usarla per orientarsi, non come verita'.

## Documenti non attendibili

- [ARCHITECTURE.md](./ARCHITECTURE.md): descrive Repositories, Services e Projections che non esistono in `app/`.
- [API.md](./API.md): la firma `execute(array $data)` non esiste.
- [readme.md](./readme.md): `ActivityStatsWidget`, `EventStore` e il monitoraggio in tempo reale non esistono nel codice.
- [index.md](./index.md): elenca 40 file di `tasks/` e `roadmap/tasks/` rimossi nel commit `7e00cedf` del 2026-10-08; recuperabili con `git show 7e00cedf^:docs/tasks/<file>`.

## Moduli e riferimenti correlati

- [Xot](../../Xot/docs/README.md): classi base (`XotBaseResource`, `XotBasePage`, `XotBaseMigration`).
- [User](../../User/docs/readme.md): modello utente usato come causer; `RegisterWidget` chiama `IsActivityLogSchemaWritableAction`.
- [Fixcity](../../Fixcity/docs/README.md): usa `LogActivityAction` in `ChangeTicketPriorityAction`.
- [Tenant](../../Tenant/docs/README.md): isolamento dati per tenant.
- [Elenco pacchetti Composer](../../../../bashscripts/ai/wiki/rules/composer-packages-reference.md): riferimento globale.
- [Regola pre-edit docs-first](../../../../bashscripts/ai/wiki/rules/pre-edit-docs-first.md): leggere i docs prima di cambiare codice.
