---
title: "Indice documentazione — Modulo Activity"
type: index
status: active
updated: 2026-11-25
tags: [docs, activity]
qmd: "indice documentazione modulo activity architecture naming debt kebab-case"
---

<<<<<<< .merge_file_zbIGId
## Implementation Guide

### Basic Usage
```php
// Log an activity
activity()->log('User logged in');

- [filament.md](filament.md) — nota minima (2 righe).
- [filament-resources.md](filament-resources.md) — risorse Filament nel modulo (versione piu' estesa, 339 righe; `filament_resources.md` duplicato in Storico).
- [filament-resource-guidelines.md](filament-resource-guidelines.md) — linee guida risorse (versione piu' estesa, 221 righe; varianti in Storico).
- [filament-5-nested-resources-complete-guide.md](filament-5-nested-resources-complete-guide.md) — guida completa risorse annidate Filament 5.x.
- [filament-5-nested-resources.md](filament-5-nested-resources.md) — guida piu' breve, stesso argomento (da valutare fusione con la guida completa, non e' un duplicato letterale).
- [nested-resources.md](nested-resources.md) — guida implementazione risorse annidate.
- [filament-table-architecture.md](filament-table-architecture.md) — la tabella si configura nella classe Table, non nella Page.
- [filament-actions-usage.md](filament-actions-usage.md) — uso delle Filament Actions nel modulo.
- [filament5-pattern-migration.md](filament5-pattern-migration.md) — migrazione pattern verso Filament 5.
- [migration-filament.md](migration-filament.md) / [migration-filament-4.md](migration-filament.md) / [migrazione-filament.md](migrazione-filament.md) / [migrazione-filament-4.md](migrazione-filament.md) — stub quasi vuoti (6-7 righe) su migrazione Filament 4; contenuto reale nella guida `guida-migrazione-step-by-step.md`.
- [guida-migrazione-step-by-step.md](guida-migrazione-step-by-step.md) — guida step-by-step migrazione Filament 4.
- [filament-version.md](filament-version.md) — dichiarazione versione Filament del modulo.
- [filament-errors.md](filament-errors.md) — errori comuni Filament (versione piu' estesa, 330 righe; varianti in Storico).
- [filament/errors/label-usage-error.md](filament/errors/label-usage-error.md) — mai usare `->label()` nei componenti Filament.
- [filament/errors/static-instance-method-incompatibility.md](filament/errors/static-instance-method-incompatibility.md) — incompatibilita' metodi statici/istanza in Filament.
- [bugfix-filament-facade-namespace.md](bugfix-filament-facade-namespace.md) — bugfix namespace facade Filament.
- [bugfix-getTablePage-mixed-return.md](bugfix-gettablepage-mixed-return.md) — bugfix `getTablePage()` ritorna `mixed` (PHPStan).
- [bugfix-getUrl-signature-mismatch.md](bugfix-geturl-signature-mismatch.md) — bugfix signature `getUrl()` + drift enum/colonne.
- [filament/filament-v4-icon-size-fix.md](filament/filament-v4-icon-size-fix.md) — fix dimensione icone Filament v4 (versione piu' estesa 138 righe; varianti in Storico).
- [filament/filament-v4-upgrade-documentation.md](filament/filament-v4-upgrade-documentation.md) — upgrade Filament v4 (varianti in Storico).
- [filament/archive/filament-v4-icon-size-fix.md](filament/archive/filament-v4-icon-size-fix.md), [filament/archive/filament-v4-upgrade.md](filament/archive/filament-v4-upgrade.md) — copie archiviate degli stessi documenti (vedi Storico).
- [list-log-activities-improvements.md](list-log-activities-improvements.md) — miglioramenti UI/UX di `ListLogActivities` (2025-12-04).
- [activity-log-ui-improvements.md](activity-log-ui-improvements.md) — riepilogo miglioramenti UI/UX log attivita' (documento distinto dal precedente, sovrapposizione di argomento non di contenuto).
- [ui-ux/activity-log-enhancement.md](ui-ux/activity-log-enhancement.md) — enhancement UI/UX log attivita'.

## Report PDF e grafici (JpGraph / html2pdf / chart widget)

- [activity-pdf-reports.md](activity-pdf-reports.md) — report PDF del log attivita'.
- [html2pdf/index.md](html2pdf/index.md) — indice pacchetto html2pdf.
- [html2pdf/usage.md](html2pdf/usage.md), [html2pdf/advanced.md](html2pdf/advanced.md), [html2pdf/laravel.md](html2pdf/laravel.md), [html2pdf/SECURITY.md](html2pdf/security.md), [html2pdf/styling.md](html2pdf/styling.md) — guide specifiche html2pdf.
- [charts/README.md](charts/README.md) — integrazione widget Filament per i grafici.
- [dual-label-chart-widget-implementation.md](dual-label-chart-widget-implementation.md) — analisi qualita' `SimpleChartWidget` a doppia etichetta.
- [simplechartwidget-problems-analysis.md](simplechartwidget-problems-analysis.md) — analisi problemi/miglioramenti UI/UX `SimpleChartWidget`.
- [simplechartwidget-quality-analysis.md](simplechartwidget-quality-analysis.md) — stub puntatore a documentazione condivisa Themes (vedi sezione puntatori).
- [jpgraph-guide.md](jpgraph-guide.md) — guida JpGraph 4.4.2.
- [jpgraph-class-reference-comprehensive-analysis.md](jpgraph-class-reference-comprehensive-analysis.md) — riferimento classi JpGraph.
- [jpgraph.md](jpgraph.md) — stub puntatore a documentazione condivisa Themes.

## Event sourcing — teoria e pattern generali

- [module.md](module.md) — vedi sopra (logging + event sourcing).
- [event-sourcing-duplicate.md](event-sourcing-duplicate.md) — "Event Sourcing in Laravel" (nome storico "duplicate" ma e' l'unica versione con contenuto reale; `event-sourcing.md` e' uno stub puntatore, vedi Storico).
- [event_sourcing_examples.md](event_sourcing_examples.md) — esempi pratici di event sourcing per healthcare (`event-sourcing-examples-duplicate.md` identico, vedi Storico).
- [event_sourcing_introduction.md](event_sourcing_introduction.md) — introduzione event sourcing (`event-sourcing-introduction-duplicate.md` variante, vedi Storico).
- [advanced-event-sourcing-patterns.md](advanced-event-sourcing-patterns.md) — pattern avanzati per applicazioni healthcare (versione piu' estesa 224 righe; 4 varianti quasi identiche in Storico).
- [advanced-event-sourcings.md](advanced-event-sourcings.md) — variante con titolo identico ma nome file diverso (non intercettata dal raggruppamento automatico; contenuto da confrontare con `advanced-event-sourcing-patterns.md`).
- [guides/archive/event-sourcing.md](guides/archive/event-sourcing.md) — guida completa event sourcing, archiviata (`guides/event-sourcing.md` e `guides/event_sourcing.md` sono stub puntatori vuoti, vedi Storico).

## Casi d'uso Event Sourcing (approfondimenti didattici)

Tre alberi di documentazione paralleli e autoconclusivi, ciascuno con proprio indice.
Ogni albero ha una **doppia serie di file**: una numerata (`01-introduzione.md`,
`02-architettura.md`, ...) pensata come ordine di lettura, e una serie di alias senza
numero con contenuto quasi identico (`introduzione.md`, `architettura.md`, ...). La
serie numerata e' quella da considerare canonica per la lettura sequenziale; gli alias
sono elencati nello Storico.

- [use_cases/bank/README.md](use_cases/bank/README.md) e [use_cases/bank/index.md](use_cases/bank/index.md) — Larabank: caso d'uso bancario con event sourcing (aggregate, projectors, eventsauce).
- [use_cases/prediction_market/README.md](use_cases/prediction_market/README.md) e [use_cases/prediction_market/index.md](use_cases/prediction_market/index.md) — prediction market, LMSR, architettura a moduli vs domain.
- [use_cases/shop/README.md](use_cases/shop/README.md) e [use_cases/shop/index.md](use_cases/shop/index.md) — carrello della spesa event sourced, confronto `laravel-shop-main` vs `command-bus`.
- [use-cases/tracking-email-sent-schede.md](use-cases/tracking-email-sent-schede.md) — caso d'uso: tracking invio email per schede di valutazione (nota: cartella singolare `use-cases/`, distinta da `use_cases/`).

## Testing

- [testing.md](testing.md) — documentazione testing generale del modulo.
- [testing-guidelines.md](testing-guidelines.md) — linee guida testing.
- [testing-rules.md](testing-rules.md) — riepilogo regole di testing.
- [testing-coverage-policy.md](testing-coverage-policy.md) — policy di coverage.
- [testing-strategy-implementation.md](testing-strategy-implementation.md) — implementazione strategia di test.
- [testcase.md](testcase.md) — configurazione TestCase.
- [testing/no-refresh-database-policy.md](testing/no-refresh-database-policy.md) — policy: mai `RefreshDatabase` nei test.
- [testing/snapshot-testing-patterns.md](testing/snapshot-testing-patterns.md) — pattern di snapshot testing.
- [testing/testing-connection-hack.md](testing/testing-connection-hack.md) — hack di connessione nei test dei model Activity.
- [testing/test-naming-convention.md](testing/test-naming-convention.md) — convenzione di naming dei file di test.
- [architecture/testing-structure-login-analysis.md](architecture/testing-structure-login-analysis.md) — analisi struttura test di login (contenuto quasi identico a `testing-structure-login-analysis.md` in root, vedi Storico).
- [brainstorm-testcase-architecture.md](brainstorm-testcase-architecture.md) — brainstorm architettura TestCase per moduli Laravel (variante `-2026-06-10` in Storico).
- [testcase-sqlite-to-mysql-fix.md](testcase-sqlite-to-mysql-fix.md) — fix passaggio SQLite→MySQL nei test.
- [testing-testcase-database-connection-fix.md](testing-testcase-database-connection-fix.md) — fix configurazione connessione DB in TestCase.
- [aws-test-vs-database-connection.md](aws-test-vs-database-connection.md) — bugfix test AWS vs configurazione connessione DB.
- [snapshot-test-fix.md](snapshot-test-fix.md) — fix test di business logic su snapshot.
- [stored-event-test-fix.md](stored-event-test-fix.md) — fix test business logic su `StoredEvent`.
- [test-errors.md](test-errors.md) / [testing-errors-fixes.md](testing-errors-fixes.md) — errori di test e correzioni.
- [testing-phpstan-progress.md](testing-phpstan-progress.md) — avanzamento PHPStan lato test.
- [tests/phpstan-pest-fixes.md](tests/phpstan-pest-fixes.md) — risoluzione errori PHPStan nei test Pest.
- [factory-coverage-report.md](factory-coverage-report.md) — copertura delle factory.
- [coverage-analysis.md](coverage-analysis.md), [coverage-plan.md](coverage-plan.md), [coverage-status.md](coverage-status.md), [coverage-coordination-workflow.md](coverage-coordination-workflow.md) — analisi, piano e stato coverage.
- [coverage.md](coverage.md) — nota di sessione PHPStan 2026-09-02 (contiene anche un puntatore boilerplate a Themes; il contenuto rilevante e' la nota di sessione in fondo al file).
- [coverage-full.md](coverage-full.md) — output esteso (2930 righe) di una run di coverage/PHPStan; da trattare come log grezzo, non come guida.
- [coverage-clean.md](coverage-clean.md) / [coverage_clean.md](coverage_clean.md) — varianti dello stesso log ripulito (vedi Storico).
- [login-test-implementation-summary.md](login-test-implementation-summary.md) — login test implementation summary (versione piu' estesa 429 righe; 4 varianti in Storico).
- [testing-structure-login-analysis.md](testing-structure-login-analysis.md) — vedi sopra.

## Qualita' del codice, PHPStan, PHPMD

- [phpstan-compliance.md](phpstan-compliance.md) e [wiki/concepts/phpstan-compliance.md](wiki/concepts/phpstan-compliance.md) — stato compliance Level 10 (due documenti distinti, uno nel wiki con piu' dettaglio tipizzazione).
- [phpstan-compliance-status.md](phpstan-compliance-status.md) — stato compliance Level 10.
- [phpstan-quality-rules.md](phpstan-quality-rules.md) — regole di qualita' PHPStan.
- [phpstan-analysis.md](phpstan-analysis.md) — analisi PHPStan generale del modulo.
- [phpstan-analysis-activity.md](phpstan-analysis-activity.md) — analisi PHPStan specifica Activity.
- [phpstan-ignore-audit.md](phpstan-ignore-audit.md) — audit degli `@phpstan-ignore`.
- [phpstan-errors.md](phpstan-errors.md), [phpstan-findings.md](phpstan-findings.md) — errori e findings PHPStan.
- [phpstan-errors-activitylogger-analysis.md](phpstan-errors-activitylogger-analysis.md), [phpstan-errors-activitylogger.md](phpstan-errors-activitylogger.md), [phpstan-errors-activitylogger-reasoning.md](phpstan-errors-activitylogger-reasoning.md) — tre documenti distinti (analisi, sintesi, ragionamento) sugli stessi errori in `ActivityLogger.php`.
- [phpstan-syntax-fixes.md](phpstan-syntax-fixes.md), [phpstan-baseline-fixes.md](phpstan-baseline-fixes.md), [phpstan-complete-fixes.md](phpstan-complete-fixes.md), [phpstan-tests-corrections.md](phpstan-tests-corrections.md) — correzioni per area.
- [phpstan-override-fix-roadmap.md](phpstan-override-fix-roadmap.md), [phpstan-roadmap.md](phpstan-roadmap.md), [phpstan-stabilization.md](phpstan-stabilization.md) — roadmap di stabilizzazione.
- [wiki/concepts/phpstan-module-config-zero.md](wiki/concepts/phpstan-module-config-zero.md), [wiki/concepts/phpstan-pest-discipline.md](wiki/concepts/phpstan-pest-discipline.md) — regole PHPStan modulo/config e disciplina Pest.
- [wiki/concepts/pest-bootstrap-extend-ignore.md](wiki/concepts/pest-bootstrap-extend-ignore.md) — bootstrap Pest con `pest()->extend()` e ignore inline.
- Cronologia interventi PHPStan (snapshot puntuali, non duplicati tra loro): [phpstan-activity-fix.md](phpstan-activity-fix.md), [phpstan-analysis-november.md](phpstan-analysis-november.md), [phpstan-compliance-dec.md](phpstan-compliance-dec.md), [phpstan-corrections-january.md](phpstan-corrections-january.md), [phpstan-corrections.md](phpstan-corrections.md), [phpstan-fixes.md](phpstan-fixes.md), [phpstan-fixes-1.md](phpstan-fixes-correzioni-modulo-activity.md), [phpstan-fixes-activity.md](phpstan-fixes-activity.md), [phpstan-fixes-activity-1.md](phpstan-fixes-activity-correzioni-modulo.md).
- [phpmd-analysis.md](phpmd-analysis.md) — analisi e fix PHPMD (PHPMD-ANALYSIS.md duplicato maiuscolo, vedi Storico).
- [phpmd-fixes.md](phpmd-fixes.md), [phpmd-errors.md](phpmd-errors.md) — fix ed errori PHPMD.
- [phpinsights-errors.md](phpinsights-errors.md) — errori PHPInsights.
- [cyclomatic-complexity-report.md](cyclomatic-complexity-report.md) — report complessita' ciclomatica.
- [code-quality-analysis.md](code-quality-analysis.md) — analisi qualita' del codice (versione piu' estesa 818 righe; varianti in Storico).
- [code-quality-improvement-report.md](code-quality-improvement-report.md), [code-quality-report.md](code-quality-report.md) — report di miglioramento qualita'.
- [code-redundancy-audit.md](code-redundancy-audit.md) — audit ridondanza codice.
- [duplicate-methods-analysis.md](duplicate-methods-analysis.md) — analisi metodi duplicati (documento principale in inglese).
- [metodi-duplicati-analisi.md](metodi-duplicati-analisi.md) — "SUPER MUCCA EDITION", 1098 righe, versione piu' estesa dell'analisi in italiano (varianti in Storico).
- [duplicate_methods.md](duplicate_methods.md), [duplicate_methods_report.md](duplicate_methods_report.md) — report correlati su metodi con nome duplicato nei moduli/temi.
- [wiki/concepts/duplicate-method-bodies.md](wiki/concepts/duplicate-method-bodies.md), [wiki/concepts/method-name-homonyms.md](wiki/concepts/method-name-homonyms.md) — censimento corpi/metodi omonimi (wiki, piu' recenti).
- [redundancy-audit.md](redundancy-audit.md) — audit ridondanza 2026-05-21 (`redundancy-audit-activity.md` e' lo stesso contenuto con nome datato, vedi Storico).
- [copilot-redundancy-audit.md](copilot-redundancy-audit.md) — audit ridondanza (variante `-2026-05-25` identica, vedi Storico).
- [consolidation_analysis.md](consolidation_analysis.md) — analisi di consolidamento (CONSOLIDATION_ANALYSIS.md duplicato maiuscolo, vedi Storico).
- [dry-kiss-analysis.md](dry-kiss-analysis.md) — analisi DRY & KISS (varianti `-latest`/`-.md` identiche, vedi Storico).
- [dry-kiss.md](dry-kiss.md) — versione piu' corta, stesso argomento.
- [ottimizzazioni-dry-kiss.md](ottimizzazioni-dry-kiss.md) — ottimizzazioni DRY+KISS (documento distinto, piu' esteso).
- [optimization-analysis.md](optimization-analysis.md), [analisi-ottimizzazioni.md](analisi-ottimizzazioni.md), [ottimizzazioni-correzioni.md](ottimizzazioni-correzioni.md), [modules-optimization-analysis.md](modules-optimization-analysis.md) — quattro audit di ottimizzazione distinti nel tempo, forte sovrapposizione tematica ma non identici: candidati a consolidamento futuro (vedi `task-consolidare-documentazione.md`).
- [bottlenecks.md](bottlenecks.md) — colli di bottiglia e soluzioni.
- [query-optimization-analysis.md](query-optimization-analysis.md) — nota: file quasi vuoto (7 righe); il contenuto reale (316 righe) e' in `query_optimization_analysis.md` (vedi Storico).
- [logging-optimization.md](logging-optimization.md) — ottimizzazione logging (`logging_optimization.md` e' uno stub puntatore vuoto, vedi Storico).
- [quality-analysis/activity-module-quality-report.md](quality-analysis/activity-module-quality-report.md) — report qualita' modulo.
- [quality-audit.md](quality-audit.md) — audit di qualita'.
- [quality_report.md](quality_report.md) — quality report (QUALITY_REPORT.md duplicato maiuscolo, vedi Storico).
- [quality-status.md](quality-status.md) — stato qualita' novembre 2025 (`quality-status.md` identico, `quality-status-activity-module-november.md` quasi identico, `quality-status-nov.md` e' stub puntatore vuoto; vedi Storico).
- [psr4-autoloading-fix.md](psr4-autoloading-fix.md) — fix compliance PSR-4.
- [case-variant-collisions.md](case-variant-collisions.md) — collisioni di nome file per sola differenza di maiuscole nel codice PHP del modulo (documento gemello di questo problema, ma sui sorgenti, non sui docs).
- [ponytail-audit-over-engineering.md](ponytail-audit-over-engineering.md) e [wiki/concepts/ponytail-audit.md](wiki/concepts/ponytail-audit.md) — audit over-engineering.
=======
# Indice documentazione — Modulo Activity
>>>>>>> .merge_file_illSMr

Indice per argomento di tutti i `.md` sotto `Modules/Activity/docs/`: 94 file al 2026-11-25 (erano 755 al 2026-09-03, poi la cartella e' stata ridotta al tetto di 100 `.md`). Nomi: kebab-case, senza date nel filename.

Nessun file e' stato rinominato o cancellato per produrre questo indice. Dove esistono duplicati palesi (stesso argomento con e senza prefisso numerico), la variante numerata e' quella canonica e quella senza prefisso e' stata rimossa. I digest automatici di `wiki/topics/` (sintesi QMD di fonti non piu' presenti) sono stati eliminati: sono rigenerabili e la cronologia resta in git.

## Come leggere questo modulo

1. [README.md](README.md) — panoramica del modulo, quick start.
2. [wiki/index.md](wiki/index.md) — "second brain" del modulo (concetti, regole, memorie, troubleshooting); [wiki/README.md](wiki/README.md) ne descrive le cartelle.
3. [adr/README.md](adr/README.md) — perche' il modulo ha le forme che ha (decisioni architetturali).
4. [contracts/README.md](contracts/README.md) — contratti comportamentali delle operazioni.
5. [roadmap/README.md](roadmap/README.md) — roadmap del modulo.
6. [manuals/manuale-utente.md](manuals/manuale-utente.md) — manuale utente del pannello Activity.
7. [CHANGELOG.md](CHANGELOG.md) — rimando al changelog del modulo.

## Decisioni (ADR)

- [adr/README.md](adr/README.md) — metodo e formato degli ADR del modulo; [adr/index.md](adr/index.md) — elenco con stato.
- [adr/0001-activity-audit-is-append-oriented.md](adr/0001-activity-audit-is-append-oriented.md) — la cronologia di audit non si riscrive.
- [adr/0002-activity-models-on-dedicated-connection.md](adr/0002-activity-models-on-dedicated-connection.md) — i modelli usano la connessione `activity`.
- [adr/0003-log-viewer-single-path-resolver.md](adr/0003-log-viewer-single-path-resolver.md) — un solo risolutore di percorsi per il visualizzatore dei log.
- [adr/0000-template.md](adr/0000-template.md) — template.
- Le tre varianti senza prefisso numerico (`adr/activity-*.md`, `adr/log-viewer-single-path-resolver.md`) erano duplicate dei canonici numerati e sono state rimosse: i link puntano ai file `NNNN-`.

## Contratti

- [contracts/README.md](contracts/README.md) — contratti del modulo Activity.
- [contracts/index.md](contracts/index.md) — indice dei contratti: operazione, classe, invarianti; [contracts/INDEX.md](contracts/INDEX.md) — inventario machine-readable; [contracts/_template.md](contracts/_template.md) — template.

## Wiki (second brain del modulo)

- [wiki/index.md](wiki/index.md) — indice della wiki (catalogo fermo al 2026-06-10).
- [wiki/log.md](wiki/log.md) — registro datato di cio' che e' cambiato nel modulo e nei docs.
- [wiki/agents.md](wiki/agents.md) — istruzioni per gli agenti sulla wiki; [wiki/ai-methodologies.md](wiki/ai-methodologies.md) e [wiki/bmad-method.md](wiki/bmad-method.md) — stub puntatori.
- [wiki/concepts/index.md](wiki/concepts/index.md), [wiki/concepts/log-viewer-sicurezza.md](wiki/concepts/log-viewer-sicurezza.md) — concetti; il secondo spiega la catena Action che porta un file di `storage/logs` nel pannello e cosa impedisce di leggere altri file.
- [wiki/rules/index.md](wiki/rules/index.md), [wiki/skills/index.md](wiki/skills/index.md), [wiki/commands/index.md](wiki/commands/index.md) — indici delle sotto-sezioni.
- [wiki/memories/index.md](wiki/memories/index.md), [wiki/memories/testcase-hierarchy-decision.md](wiki/memories/testcase-hierarchy-decision.md), [wiki/memories/phpstan-bootstrap-marker-blocker.md](wiki/memories/phpstan-bootstrap-marker-blocker.md) — memorie.
- [wiki/troubleshooting/git-merge-conflict-inventory.md](wiki/troubleshooting/git-merge-conflict-inventory.md), [wiki/troubleshooting/git-merge-conflict-inventory-april.md](wiki/troubleshooting/git-merge-conflict-inventory-april.md) — inventari dei conflitti di merge.
- [wiki/_templates/concept.md](wiki/_templates/concept.md), [wiki/_templates/entity.md](wiki/_templates/entity.md), [wiki/_templates/source.md](wiki/_templates/source.md) — template per nuove pagine wiki, non contenuto.
- [llm-wiki/index.md](llm-wiki/index.md), [llm-wiki/agents.md](llm-wiki/agents.md) — scaffold parallelo, in gran parte vuoto.

## BMAD, story e audit

- [bmad/README.md](bmad/README.md), [bmad/index.md](bmad/index.md) — integrazione BMAD del modulo e suo indice.
- Story in `bmad/stories/` (la variante numerata e' canonica; le varianti senza prefisso duplicate sono state rimosse):
  - [0005-module-bmad-audit.story.md](bmad/stories/0005-module-bmad-audit.story.md) — audit BMAD profondo del modulo.
  - [0007-php-conflict-markers.story.md](bmad/stories/0007-php-conflict-markers.story.md) — risoluzione dei marker di conflitto PHP.
  - [0011-phpstan-resurrected-duplicate-tests.story.md](bmad/stories/0011-phpstan-resurrected-duplicate-tests.story.md) — test duplicati resuscitati dalla sync.
  - [0015-phpstan-swarm-cluster5-4.story.md](bmad/stories/0015-phpstan-swarm-cluster5-4.story.md) — PHPStan swarm cluster 5.
  - [0019-quality-gates-phpstan-fix-4.story.md](bmad/stories/0019-quality-gates-phpstan-fix-4.story.md) — remediation PHPStan della flotta di moduli.
  - [quality-gates-phpstan-swarm.story.md](bmad/stories/quality-gates-phpstan-swarm.story.md) — PHPStan quality gate swarm.
  - [folio-routing-centralization.story.md](bmad/stories/folio-routing-centralization.story.md) — il routing Folio e' centralizzato, Activity non monta Folio.
  - [0000-template.story.md](bmad/stories/0000-template.story.md) — template.
- Story in `stories/`:
  - [0002-activity-admin-log-viewer-page.story.md](stories/0002-activity-admin-log-viewer-page.story.md) — pagina Log nel pannello Activity (la variante senza prefisso, con nomi di Action non piu' esistenti, e' stata rimossa).
  - [audit-qualita.story.md](stories/audit-qualita.story.md) — audit qualita' del modulo.
  - [phpstan-cleanup-activity-wave.story.md](stories/phpstan-cleanup-activity-wave.story.md) — PHPStan cleanup.
  - [0000-template.story.md](stories/0000-template.story.md) — template.
- [ecc/00-index.md](ecc/00-index.md) — indice operativo ECC: stato dei controlli (PHPStan, Pest, security) con evidenze.

<<<<<<< .merge_file_zbIGId
`llm-wiki/` e' uno scaffold parallelo, in gran parte vuoto: [llm-wiki/index.md](llm-wiki/index.md)
dichiara esplicitamente "no concept/entity/source pages created yet". Contenuto reale
solo in [llm-wiki/AGENTS.md](llm-wiki/agents.md) e [llm-wiki/log.md](llm-wiki/log.md)
(`llm-wiki/AGENTS.md` duplicato maiuscolo, vedi Storico). I template
`llm-wiki/_templates/*.md` sono stub identici a quelli di `wiki/_templates/`.

## Governance, regole del modulo e igiene della documentazione

- [rules-index.md](rules-index.md) — indice regole.
- [docs-health.md](docs-health.md) — stato di salute della documentazione (gia' segnalava 190 file "top-level" prima di questo audit; ora sono 755).
- `docs-archive-policy.md`: file rimosso nel commit `a871d44e` del 2026-10-08 (verificato 2026-10-14); non esiste piu' in `docs/`.
- [module-root-hygiene.md](module-root-hygiene.md), [root-file-policy.md](root-file-policy.md), [root-files-hygiene.md](root-files-hygiene.md) — igiene della root del modulo (tre documenti distinti ma tematicamente sovrapposti).
- [no-ai-tool-scaffold-dirs.md](no-ai-tool-scaffold-dirs.md) — perche' certe cartelle scaffold da tool AI non devono esistere qui.
- [no-git-lfs.md](no-git-lfs.md) — Git LFS non si usa in questo progetto.
- [case-variant-collisions.md](case-variant-collisions.md) — collisioni di nome per sola differenza di maiuscole (nel codice sorgente; vedi anche la sezione Storico di questo stesso indice per il fenomeno equivalente nei `.md`).
- [second-brain.md](second-brain.md) — nota sul second brain di modulo.
- [agent-confidence-discipline.md](agent-confidence-discipline.md), [agent-confidence-protocol.md](agent-confidence-protocol.md), [confidence_guidelines.md](confidence_guidelines.md) — tre documenti quasi gemelli sulla disciplina di confidenza dell'agente (contenuto simile ma non identico, candidati a fusione futura).
- [agent-edit-discipline.md](agent-edit-discipline.md) — puntatore a disciplina edit/qualita'.
- [architecture-rules.md](architecture-rules.md) — puntatore regole architetturali.
- [dependencies.md](dependencies.md), [dependency-intelligence.md](dependency-intelligence.md) — dipendenze del modulo.
- [gestionale-platform-activity-audit.md](gestionale-platform-activity-audit.md), [gestionale-platform-audit-mapping.md](gestionale-platform-audit-mapping.md) — mappatura Activity vs Platform.AuditLog.

## Traduzioni

- [translations.md](translations.md) — traduzioni del modulo.
- [lang-link.md](lang-link.md) — collegamento alle traduzioni (versione piu' estesa 121 righe; varianti in Storico).

## Sicurezza

- [SECURITY.md](security.md) — documentazione di sicurezza (SECURITY.md duplicato maiuscolo, vedi Storico).

## Ambiente, tooling, MCP e QMD

- [env-development-configuration.md](env-development-configuration.md) — configurazione ambiente di sviluppo.
- [mcp-configuration.md](mcp-configuration.md) — configurazione server MCP.
- [mcp-server-recommended.md](mcp-server-recommended.md) — MCP consigliati per il modulo (MCP-SERVER-RECOMMENDED.md duplicato maiuscolo; `mcp_server_recommended.md`/`mcp-server-recommended.md` sono invece stub puntatori a Themes, vedi Storico — attenzione: 4 file quasi omonimi con due ruoli diversi).
- [qmd-setup.md](qmd-setup.md) — setup QMD per il modulo (qmd-setup.md duplicato maiuscolo, vedi Storico).
- [boost-skill-fix-summary.md](boost-skill-fix-summary.md) — fix skill Boost (`boost_skill_fix_summary.md` e' invece uno stub puntatore Themes, vedi Storico).
- [laravel-13-upgrade.md](laravel-13-upgrade.md) — upgrade Laravel 13 (contenuto simile a `wiki/integrations/laravel-13-upgrade.md`, non identico).

## Git, conflitti e sync multi-organizzazione

- [git-conflicts-resolution-summary.md](git-conflicts-resolution-summary.md) — risoluzione conflitti Git (`git-conflicts-resolution-sumy.md` e' uno stub puntatore Themes con refuso nel nome, vedi Storico).
- [conflict-resolution.md](conflict-resolution.md) — nota generale di conflict resolution.
- [merge-conflicts-list.md](merge-conflicts-list.md) — elenco file con marker di conflitto (`merge-conflict-files-list.md` e' uno stub puntatore Themes, nome quasi omonimo, vedi Storico).
- [git-multi-org-sync-handoff.md](git-multi-org-sync-handoff.md) — handoff sync multi-org (STORY-003).
- [multi-org-sync-laraxot-provtv.md](multi-org-sync-laraxot-provtv.md) — sincronizzazione laraxot + provtv.
- [wiki/how-to/gitmodules-sync-session.md](wiki/how-to/gitmodules-sync-session.md) — sessione di sync `.gitmodules`.
- [wiki/troubleshooting/git-merge-conflict-inventory.md](wiki/troubleshooting/git-merge-conflict-inventory.md) — inventario conflitti (variante datata `-2026-04-28` identica in Storico).
- [wiki/troubleshooting/git-push-dual-remote.md](wiki/troubleshooting/git-push-dual-remote.md) — push su doppio remote.

## Prompt operativi

- [prompts/fix.md](prompts/fix.md), [prompts/fix01.md](prompts/fix01.md), [prompts/fix02.md](prompts/fix02.md), [prompts/fix03.md](prompts/fix03.md) — prompt di fix su connessione DB `activity`.
- [prompts/test01.md](prompts/test01.md) — prompt di test.

## Analisi storiche di dominio / modelli

- [modelli-factory-seeder-analisi.md](modelli-factory-seeder-analisi.md) — analisi modelli/factory/seeder multi-modulo (versione piu' estesa 373 righe; varianti in Storico).
- [models-analysis.md](models-analysis.md), [models-factory-seeder-analysis.md](models-factory-seeder-analysis.md) — analisi equivalenti in inglese, scope solo Activity.
- [folio-volt-best-practices.md](folio-volt-best-practices.md) — best practice Folio + Volt.
- [frameworks.md](frameworks.md) — note di integrazione framework (FRAMEWORKS.md duplicato maiuscolo, vedi Storico).
- [project-structure.md](project-structure.md) — struttura di progetto (project-structure.md duplicato, vedi Storico).
- [quick-start.md](quick-start.md) — quick start (quick-start.md duplicato, vedi Storico).
- [on-demand-pattern.md](on-demand-pattern.md) — pattern on-demand del modulo (on-demand-pattern.md duplicato, vedi Storico).
- [performance-optimization.md](performance-optimization.md) — performance optimization (performance-optimization.md duplicato, vedi Storico).
- [performance/activity-log-optimization.md](performance/activity-log-optimization.md) — ottimizzazione log attivita' (versione piu' estesa 567 righe; 3 varianti + 3 copie in `performance/archive/` in Storico).
- [pandoc_guide.md](pandoc_guide.md) — generazione documentazione con Pandoc (PANDOC_GUIDE.md duplicato maiuscolo, vedi Storico).
- [tecnico/laraxot/module-activity.md](tecnico/laraxot/module-activity.md) — overview tecnica modulo (contiene anche un puntatore Themes in testa; `tecnico/laraxot/archive/module-activity.md` e' una versione archiviata piu' corta, vedi Storico).
- [CHANGELOG.md](changelog.md) — changelog del modulo (CHANGELOG.md e' un "documento unificato" diverso, non lo stesso changelog: verificarne il ruolo prima di consolidare).

## Storico / da consolidare

Questa sezione raccoglie i cluster di file quasi identici individuati con un confronto
automatico (nome normalizzato + conteggio righe) piu' alcuni duplicati trovati a mano.
**Nessuno di questi file e' stato toccato.** Per ciascun cluster e' indicato quale
variante e' collegata come riferimento primario nelle sezioni sopra.

### Varianti di sola maiuscola/minuscola o underscore/trattino (stesso contenuto)

`api.md`/`API.md` · `architecture.md`/`architecture.md` · `bad_practices.md`/`bad_practices.md` ·
`best_practices.md`/`best_practices.md` · `business_logic_analysis.md`/`business_logic_analysis.md` ·
`code_quality_analysis.md`/`CODE_QUALITY_ANALYSIS.md` · `consolidation_analysis.md`/`CONSOLIDATION_ANALYSIS.md` ·
`critical_migration_constraints.md`/`CRITICAL_MIGRATION_CONSTRAINTS.md` · `database-schema.md`/`database-schema.md` ·
`frameworks.md`/`FRAMEWORKS.md` · `index.md`/`index.md` · `migrations.md`/`MIGRATIONS.md` ·
`metodi_duplicati_analisi.md`/`metodi_duplicati_analisi.md` · `on-demand-pattern.md`/`on-demand-pattern.md` ·
`pandoc_guide.md`/`PANDOC_GUIDE.md` · `patterns.md`/`PATTERNS.md` · `performance-optimization.md`/`performance-optimization.md` ·
`phpmd-analysis.md`/`PHPMD-ANALYSIS.md` (+ stub `phpmd_analysis.md`/`PHPMD_ANALYSIS.md`) ·
`product_launch_plan.md`/`product_launch_plan.md` · `product_roadmap.md`/`product_roadmap.md` ·
`product_strategy.md`/`product_strategy.md` · `project-structure.md`/`project-structure.md` ·
`qmd-setup.md`/`qmd-setup.md` · `quality_report.md`/`QUALITY_REPORT.md` ·
`query_optimization_analysis.md`/`QUERY_OPTIMIZATION_ANALYSIS.md` (+ stub quasi vuoto `query-optimization-analysis.md`) ·
`quick-start.md`/`quick-start.md` · `SECURITY.md`/`SECURITY.md` · `sprint_planning.md`/`sprint_planning.md` ·
`tech_spec.md`/`TECH_SPEC.md` · `user_research.md`/`user_research.md` · `readme-update.md`/`readme_update.md` ·
`redundancy_analysis.md`/`redundancy_analysis.md` (entrambi stub vuoti) ·
`filament/filament-v4-icon-size-fix.md` (+ `filament-v4-icon-size-fix-attribute.md`, ex `-2.md`, `FILAMENT_V4_ICON_SIZE_FIX.md`, `filament_v4_icon_size_fix.md`) ·
`filament/filament-v4-upgrade.md` (+ `filament-v4-upgrade-documentation.md`, ex `-2.md`, `FILAMENT_V4_UPGRADE.md`, `filament_v4_upgrade.md`) ·
`filament/archive/filament-v4-icon-size-fix.md` (+ maiuscolo/underscore) ·
`filament/archive/filament-v4-upgrade.md` (+ maiuscolo/underscore) ·
`guides/event-sourcing.md`/`guides/event_sourcing.md` (stub) ·
`guides/archive/event-sourcing.md`/`guides/archive/event_sourcing.md` ·
`llm-wiki/AGENTS.md`/`llm-wiki/AGENTS.md` ·
`performance/activity-log-optimization.md` (+ `activity-log-optimization-module.md`, ex `-2.md`, `ACTIVITY_LOG_OPTIMIZATION.md`, `activity_log_optimization.md`) ·
`performance/archive/activity-log-optimization.md` (+ maiuscolo/underscore/`-renamed.md`) ·
`roadmap/00-index.md`/`roadmap/00-index.md` · `wiki/AGENTS.md`/`wiki/AGENTS.md` ·
`wiki/PROJECT-ROADMAP.md`/`wiki/project-roadmap.md` · `wiki/schema.md`/`wiki/schema.md` ·
`wiki/commands/index.md`/`wiki/commands/index.md` · `wiki/concepts/index.md`/`wiki/concepts/index.md` ·
`wiki/memories/index.md`/`wiki/memories/index.md` · `wiki/rules/index.md`/`wiki/rules/index.md` ·
`wiki/skills/index.md`/`wiki/skills/index.md` · `tecnico/laraxot/archive/module-activity.md`/`module_activity.md` ·
`use_cases/shop/archive/console-commands.md`/`console_commands.md` (entrambi stub vuoti) ·
`00-index.md`/`00-index.md` (+ `00-index-documentation.md` quasi vuoto).

**Nota**: `bad-practices.md`, `best-practices.md`, `code-quality.md`, `mcp_server_recommended.md`/`mcp-server-recommended.md`,
`boost_skill_fix_summary.md`, `phpmd_analysis.md`/`PHPMD_ANALYSIS.md` non sono duplicati del contenuto reale:
sono stub con frontmatter `canonical:` che puntano a `Themes/docs/shared-components/...` (vedi sezione dedicata
sotto). Coesistono per coincidenza di nome con le varianti che invece hanno contenuto reale — non vanno confusi.

### Numerazioni progressive (`-1`, `-2`, `-duplicate`, `-latest`) con contenuto quasi identico

`advanced-event-sourcing-patterns.md` (+ `-1.md`, `-duplicate.md`, `advanced_event_sourcing_patterns.md`, e imparentato `advanced-event-sourcings.md`) ·
`business-logic-analysis.md` (+ `-1.md`) · `dry-kiss-analysis.md` (+ `-latest.md`, `-.md`) ·
`errori-migrazione-activity-table-lezioni.md` (+ `-1.md`, `errori_migrazione_activity_table_lezioni.md`) ·
`filament-errors.md` (+ `-duplicate.md`, `filament_errors.md`) ·
`filament-resource-guidelines.md` (+ `-1.md`, maiuscolo, underscore) ·
`lang-link.md` (+ `-1.md`, `-duplicate.md`, `lang_link.md`) ·
`login-test-implementation-summary.md` (+ `-1.md`, underscore) ·
`login-test-implementation-sumy.md` (+ `-1.md`, refuso di "summary") ·
`metodi-duplicati-analisi.md` (+ maiuscolo/underscore) · `modelli-factory-seeder-analisi.md` (+ `-1.md`, underscore) ·
`phpstan-analysis-november.md`/`phpstan-analysis-november-2025.md` · `phpstan-fixes.md` (+ `-1.md`, stub underscore) ·
`phpstan-fixes-activity.md` (+ `-1.md`, underscore) · `quality-status.md` (+ `-.md`, `-2025-11.md`; `-nov.md` e' stub) ·
<<<<<<< .merge_file_mp1pTI
`roadmap.md`/`roadmap.md` (+ `roadmap-archive-1.md`, quasi identico con 2 righe di differenza) ·
=======
`roadmap-2025.md`/`roadmap-.md` (+ `roadmap-archive.md`, quasi identico con 2 righe di differenza) ·
>>>>>>> .merge_file_e6wsvv
`event-sourcing-examples-duplicate.md`/`event_sourcing_examples.md` (+ stub `event-sourcing-examples.md`) ·
`event-sourcing-introduction-duplicate.md`/`event_sourcing_introduction.md` (+ stub `event-sourcing-introduction.md`) ·
`test-archive-1.md`/`test-archive-2.md` (entrambi vuoti).

### Collisione di naming con contenuto diverso (attenzione, non fondere alla cieca)

- `module-analysis.md` (87 righe, "Comprehensive Analysis") vs `module_analysis.md` (319 righe, "Modulo Activity - Logging e Event Sourcing"): nomi quasi identici, contenuto diverso. `module_analysis.md` e' invece un quasi-duplicato di `module.md` (320 righe, stesso titolo).
- `structure.md` (root, 414 righe) vs `architecture/structure.md` (413 righe): stesso titolo "Modulo Activity", da verificare a mano se sono la stessa cosa copiata in due posti o se sono divergenti.
- `testing-structure-login-analysis.md` (root, 186 righe) vs `architecture/testing-structure-login-analysis.md` (174 righe): stesso titolo "Struttura Corretta dei Test di Login - Analisi Completa".
- `mcp-server-recommended.md`/`MCP-SERVER-RECOMMENDED.md` (contenuto reale, 23 righe) vs `mcp_server_recommended.md`/`mcp-server-recommended.md` (stub puntatore Themes, 7 righe): quattro file quasi omonimi, due ruoli diversi.
- `bad-practices.md`/`best-practices.md` (trattino, stub puntatore Themes) vs `bad_practices.md`/`best_practices.md` (underscore, contenuto reale locale): stesso schema del punto precedente.
- `git-conflicts-resolution-summary.md` (contenuto reale) vs `git-conflicts-resolution-sumy.md` (stub puntatore Themes, refuso "sumy" per "summary").
- `merge-conflicts-list.md` (contenuto reale) vs `merge-conflict-files-list.md` (stub puntatore Themes, nome simile ma non identico).

### Duplicazione sistemica: serie numerata + alias senza numero

Interessa `docs/roadmap/` e i tre alberi `docs/use_cases/{bank,prediction_market,shop}/`:
ogni sezione ha sia un file numerato (`01-introduzione.md`, `02-architettura.md`, ...) sia
un alias omonimo senza numero (`introduzione.md`, `architettura.md`, ...) con contenuto
quasi identico. La serie numerata e' quella collegata come riferimento di lettura nelle
sezioni sopra; gli alias non sono cancellati. Esempio verificabile:

```bash
find Modules/Activity/docs/use_cases Modules/Activity/docs/roadmap -regextype posix-extended \
  -regex '.*/[0-9]{2}-[a-z-]+\.md'
```

### Configuration
The module can be configured through the `config/activity.php` file:
- Log retention policies
- Activity types to track
- Database connection settings

63 file sotto `docs/` sono stub minimi (6-7 righe) con frontmatter `module: theme` +
`canonical: ../../../Themes/docs/shared-components/...` (pattern architetturale
intenzionale di "on-demand", non un incidente di duplicazione): `ai-methodologies.md`,
`aws_test_vs_database_connection.md`, `bad-practices.md`, `best-practices.md`,
`boost_skill_fix_summary.md`, `business-logic.md`, `code-quality.md`, `codex-error-fix.md`,
`event-sourcing-examples.md`, `event-sourcing-introduction.md`, `event-sourcing.md`,
`filament/filament-v4-upgrade.md`, `filaments.md`, `file-naming-rules.md`,
`git-conflicts-resolution-sumy.md`, `guides/event-sourcing.md`, `guides/event_sourcing.md`,
`jpgraph.md`, `logging_optimization.md`, `login-test-implementation.md`,
`mcp_server_recommended.md`, `mcp-server-recommended.md`, `merge-conflict-files-list.md`,
`metodiuplicati-analisi.md`, `migration-filament.md`, `migration-filament.md`,
`migrazione-filament.md`, `migrazione-filament.md`, `outputs/README.md`,
`performance/archive/activity_log_optimization-renamed.md`, `phpinsightss.md`,
`phpmd.md`, `phpmd.md`, `phpmd_analysis.md`, `PHPMD_ANALYSIS.md`, `phpmds.md`,
`phpstan.md`, `phpstan_fixes.md`, `quality-status-nov.md`, `query-optimization.md`,
`query-optimization-analysis.md`, `raw/README.md`, `redundancy_analysis.md`,
`redundancy_analysis.md`, `simplechartwidget-quality-analysis.md`,
`tecnico/laraxot/module_activity.md`, `wiki/bmad-method.md`, e le varianti "best-practice"/
"analysis"/"flusso-utente"/"console-commands" dentro `use_cases/bank/`,
`use_cases/prediction_market/` e `use_cases/shop/` (incluso `use_cases/shop/archive/`).
Non richiedono consolidamento: sono puntatori voluti, non copie accidentali.

## Related Modules
<<<<<<< .merge_file_mp1pTI
- [User Module](../../User/docs/README.md) - User authentication and management
- [Notify Module](../../Notify/docs/index.md) - Notification system
- [Xot Module](../../Xot/docs/README.md) - Core base classes
- [User Module](../../User/docs/readme.md) - User authentication and management
- [Notify Module](../../Notify/docs/index.md) - Notification system
- [Xot Module](../../Xot/docs/README.md) - Core base classes

## Related Modules
- [User Module](../../User/docs/README.md) - User authentication and management
- [Notify Module](../../Notify/docs/index.md) - Notification system
- [Xot Module](../../Xot/docs/README.md) - Core base classes
- [User Module](../../User/docs/readme.md) - User authentication and management
- [Notify Module](../../Notify/docs/index.md) - Notification system
- [Xot Module](../../Xot/docs/README.md) - Core base classes
=======
- [User Module](../User/docs/README.md) - User authentication and management
- [Notify Module](../Notify/docs/index.md) - Notification system
- [Xot Module](../Xot/docs/index.md) - Core base classes
- [User Module](../user/docs/README.md) - User authentication and management
- [Notify Module](../notify/docs/index.md) - Notification system
- [Xot Module](../xot/docs/index.md) - Core base classes

## Related Modules
- [User Module](../User/docs/README.md) - User authentication and management
- [Notify Module](../Notify/docs/index.md) - Notification system
- [Xot Module](../Xot/docs/index.md) - Core base classes
- [User Module](../user/docs/README.md) - User authentication and management
- [Notify Module](../notify/docs/index.md) - Notification system
- [Xot Module](../xot/docs/index.md) - Core base classes
>>>>>>> .merge_file_e6wsvv

Quattro copie parallele dello stesso lotto di file di test/placeholder, quasi tutte a
0-3 righe (`archived-note.md`, `documentation*.md`, `test*.md`,
`import-placeholder*.md`, `filament*.md`, `changelog*.md`): presenti sia direttamente
in `docs/` (es. `test02.md`, `test-archive-1.md`, `archived-note.md`), sia in
`docs/root-md-files/`, `docs/root-txt-files/` e `docs/raw/root-import/`. Non collegati
individualmente in questo indice perche' privi di contenuto informativo; elencabili con:

```bash
find Modules/Activity/docs/root-md-files Modules/Activity/docs/root-txt-files \
  Modules/Activity/docs/raw/root-import -name '*.md'
```

Questi 4 gruppi restano come testimonianza storica di un import automatico mal riuscito
(vedi anche `docs/no-ai-tool-scaffold-dirs.md` per la policy su cartelle-scaffold).
=======
## Roadmap e prodotto
>>>>>>> .merge_file_illSMr

- [roadmap/README.md](roadmap/README.md) — roadmap del modulo (entry point principale); [roadmap/index.md](roadmap/index.md) — indice della roadmap.

<<<<<<< .merge_file_zbIGId
`domain-logic.md`, `data-models.md`, `validation.md`, `integration.md`, `workflows.md`,
<<<<<<< .merge_file_mp1pTI
`troubleshooting.md`, `archived-note.md`, `documentation.md`,
`documentation-archive-1.md` e i loro equivalenti nelle
=======
`troubleshooting.md`, `2024-03-27.md`, `archived-note.md`, `documentation.md`,
`documentation-archive.md` e i loro equivalenti nelle
>>>>>>> .merge_file_e6wsvv
cartelle di import grezzo sopra citate (49 file a 0 righe in tutto il modulo).
=======
## Casi d'uso Event Sourcing (approfondimenti didattici)
>>>>>>> .merge_file_illSMr

- [use_cases/bank/README.md](use_cases/bank/README.md) e [use_cases/bank/index.md](use_cases/bank/index.md) — Larabank: caso d'uso bancario con event sourcing.
- [use_cases/prediction_market/README.md](use_cases/prediction_market/README.md) e [use_cases/prediction_market/index.md](use_cases/prediction_market/index.md) — prediction market con event sourcing.
- [use_cases/shop/README.md](use_cases/shop/README.md) e [use_cases/shop/index.md](use_cases/shop/index.md) — carrello della spesa con event sourcing e console commands.

<<<<<<< .merge_file_zbIGId
- File `.md` totali sotto `docs/`: 755.
- Cluster di duplicati quasi identici individuati (nome normalizzato + confronto righe): 92, per 227 file coinvolti.
- File completamente vuoti (0 righe): 49.
- File stub con puntatore `canonical:` verso `Themes/docs/shared-components/`: 73 (di cui 6 template `_templates/`, 4 ibridi con contenuto reale aggiuntivo, 63 stub puri).
- File indicizzati esplicitamente per argomento in questo documento: la quasi totalita' dei restanti file con contenuto reale; le eccezioni (import grezzo/placeholder vuoti) sono referenziate per gruppo con comando `find` riproducibile, non singolarmente.
## Naming dei file (nessuna data nel nome)

Audit qualita' #64: tutti i `.md` con data/timestamp nel nome sono stati rinominati
(la data e' ora nel frontmatter `created:`) oppure uniti al file canonico omonimo;
i placeholder vuoti datati di `raw/root-import/` sono stati rimossi.
Dettagli: [stories/audit-qualita.story.md](stories/audit-qualita.story.md). Verifica:
=======
## Report PDF e grafici

- [charts/README.md](charts/README.md) — integrazione dei widget Filament per i grafici.
- [html2pdf/index.md](html2pdf/index.md) — stub puntatore alla documentazione canonica nel modulo Media.
>>>>>>> .merge_file_illSMr

## Digest e output

<<<<<<< .merge_file_zbIGId
<<<<<<< .merge_file_mp1pTI
=======
Esempi ancora presenti: `documentation-2024-03-27.md`, `quality-status.md`,
`stories/phpstan-cleanup-activity.story.md`,
`bmad/stories/*-20260928*.story.md`, `wiki/troubleshooting/git-merge-conflict-inventory-april.md`,
`raw/root-import/*2024*`. Procedura: [docs-clean.md](../../../../bashscripts/docs/prompts/docs-clean.md).

>>>>>>> .merge_file_e6wsvv
## Troubleshooting

- Performance log grandi, entry mancanti, config: vedi wiki troubleshooting del modulo.
- File vuoti/import grezzo: referenziati per gruppo sopra, non cancellare a tappeto.

## Mappa delle cartelle

Elenco generato dall'audit qualita' (issue #64): ogni cartella di `docs/` con il numero di file `.md`.
Le cartelle di import grezzo (`raw/`, `root-*-files/`), immagini e log sono escluse.

| Cartella | File .md |
|---|---|
| [`actions/`](actions/) | 1 |
| [`architecture/`](architecture/) | 3 |
| [`archive/`](archive/) | 34 |
| [`bmad/`](bmad/index.md) | 56 |
| [`charts/`](charts/README.md) | 1 |
| [`concepts/`](concepts/) | 1 |
| [`database/`](database/) | 1 |
| [`development/`](development/) | 1 |
| [`ecc/`](ecc/) | 2 |
| [`epics/`](epics/) | 1 |
| [`errori/`](errori/) | 7 |
| [`filament/`](filament/) | 10 |
| [`guides/`](guides/) | 4 |
| [`investigation/`](investigation/) | 2 |
| [`llm-wiki/`](llm-wiki/index.md) | 6 |
| [`performance/`](performance/) | 4 |
| [`prompts/`](prompts/) | 6 |
| [`quality-analysis/`](quality-analysis/) | 1 |
| [`roadmap/`](roadmap/index.md) | 32 |
| [`stories/`](stories/) | 9 |
| [`tasks/`](tasks/) | 36 |
| [`tecnico/`](tecnico/) | 4 |
| [`testing/`](testing/) | 4 |
| [`troubleshooting/`](troubleshooting/) | 1 |
| [`ui-ux/`](ui-ux/) | 1 |
| [`use-cases/`](use-cases/) | 1 |
| [`use_cases/`](use_cases/) | 116 |
| [`wiki/`](wiki/index.md) | 105 |
=======
- [digests/overflow-history.md](digests/overflow-history.md) — sezioni condensate dei file oltre il tetto di 100 `.md` (una sezione per file, intitolata col percorso originale).
- [digests/archive-archive.md](digests/archive-archive.md), [digests/archive-raw.md](digests/archive-raw.md), [digests/aliases-removed.md](digests/aliases-removed.md) — elenchi delle sorgenti fuse e degli alias rimossi.
- [outputs/README.md](outputs/README.md) — cartella degli output generati.

## Rimossi e recuperabili da git

- `tasks/` (36 file: `tasks-index.md`, `001`..`005`, `activity-ai-detection`, `activity-filament-v5`, `cleanup-activity-docs`, `documentation/*`, `features/*`, `refactoring/*`, `testing/*`): rimossa nel commit `7e00cedf` del 2026-10-08. Ogni file e' recuperabile con `git show 7e00cedf^:docs/tasks/<percorso>`.
- `roadmap/tasks/` (enhanced-activity-filtering, gdpr-compliance-enhancement, realtime-monitoring-dashboard): rimossa nello stesso commit `7e00cedf`; recuperabile con `git show 7e00cedf^:docs/roadmap/tasks/<nome>.md`.
- `docs-archive-policy.md`: rimosso nel commit `a871d44e` del 2026-10-08.
- `00-index.md` della radice di `docs/`: rimosso il 2026-10-22 (commit `7e2a1509`, insieme a `index.md` e a `wiki/index.md`, poi ricreati); l'indice di tutta la cartella docs e' questo file.
- Le versioni precedenti di questo indice elencavano molti altri file (architettura, Filament, PHPStan, testing, event sourcing, migrazioni) che oggi non esistono piu' in `docs/`: la cronologia git e' l'unica fonte.
>>>>>>> .merge_file_illSMr
