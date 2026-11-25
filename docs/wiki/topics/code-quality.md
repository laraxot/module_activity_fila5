---
title: "Topic code-quality"
type: digest
status: active
qmd: "digest ceiling 100 code-quality"
---

# Topic code-quality

Sintesi automatica di 4 documenti (chiave `code-quality`).

## Code Quality Analysis - Activity Module

_Fonte: `code-quality-analysis.md`_

# Code Quality Analysis - Activity Module

## 🚨 Critical Issues Identified

### 1. Activity Listing Performance (MEDIUM)

#### N+1 Queries in Activity Logs
**Problem**: 50-100 queries per page load
**Issues**:
- N+1 queries when loading activity logs
- No proper indexing for common queries
- Missing eager loading for relationships

**Solution**:
```php
// ✅ OPTIMIZED ACTIVITY LISTING
public function getActivities($filters = [])
{
    $query = ActivityLog::with(['causer', 'subject'])
        ->select([
            'id',
            'log_name',
            'description',
            'subject_type',
            'subject_id',
            'causer_type',
            'causer_id',
            'properties',
            'created_at'

## Code Quality Improvement Report: Activity

_Fonte: `code-quality-improvement-report.md`_

# Code Quality Improvement Report: Activity

> Baseline statica riproducibile per orientare il miglioramento. I conteggi sono segnali, non sostituiscono PHPStan, Pest o la review del flusso reale.

## Baseline

| Indicatore | Valore |
|---|---:|
| File PHP applicativi/database/route | 80 |
| File di test PHP | 83 |
| Rapporto test/file PHP | 103% |
| Candidati senza strict types | 80 |
| Marker TODO/FIXME/HACK/XXX | 0 |
| Estensioni Filament potenzialmente dirette | 0 |
| Controller da classificare FO/BO | 0 |
| Classi in app/Services o app/Support | 0 |
| Priorità iniziale | **media** |

Rilevazione del 17 luglio 2026 sul working tree locale; esclusi vendor e dipendenze esterne.

## Rischi e priorità

1. **Type safety:** verificare i candidati e introdurre strict types nei file toccati, con tipi concreti e senza nuovi mixed.
2. **Regressioni:** il rapporto file/test non misura copertura. Proteggere prima autorizzazioni, scritture DB, business rule e bug noti.
3. **Laraxot:** confrontare ogni estensione Filament segnalata con XotBase/LangBase. Classificare i controller: vietati nel front office.
4. **Debito:** ogni marker residuo deve avere owner, motivazione e criterio di rimozione.
5. **Boundary:** non aggiungere business logic in Service/Support; riusare Actions con QueueableAction.

## Piano

## Code quality: modulo Activity

_Fonte: `code-quality-report.md`_

# Code quality: modulo Activity

Report locale (2026-07-17). Metodo: `phpstan analyse` livello max, `phpmd` (ruleset codesize+unusedcode), grep mirati (TODO/FIXME/@deprecated, dd()/dump(), facade in app/Actions, extends Filament diretto), rapporto file test/app.

## Numeri

- File in `app/`: 65
- File di test: 83: rapporto test/app: 127%
- File con TODO/FIXME/@deprecated: 73
- PHPStan: 0 errori (livello max, sweep repo-wide 2026-07-16/17)
- Violazioni PHPMD (codesize+unusedcode): 9
- File in `app/Actions/` che importano Facade Laravel direttamente (violazione pattern QueueableAction, vedi skill `queueable-action-trait`): 5

### File con Facade in Actions da convertire

- Modules/Activity/app/Actions/ActivityMaintenanceAction.php
- Modules/Activity/app/Actions/ActivityLogger.php
- Modules/Activity/app/Actions/LogActivityAction.php
- Modules/Activity/app/Actions/Query/GetActivityStatisticsAction.php
- Modules/Activity/app/Actions/Schema/IsActivityLogSchemaWritableAction.php

## Stato architetturale

- Nessuna violazione `extends \Filament\...` diretto rilevata (regola XotBase rispettata).

## Azioni consigliate

- Triage dei 73 file con TODO/FIXME aperti.
- Convertire le 5 Action con Facade dirette al pattern QueueableAction (niente facade nella cartella Actions).

## code-quality

_Fonte: `code-quality.md`_

See canonical documentation: ../../../Themes/docs/shared-components/code-quality-analysis-Modules.md
