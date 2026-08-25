---
title: Activity Module - Documentation Index
type: index
tags: [activity, audit-log, event-sourcing, phpstan]
created: 2025-12-13
updated: 2026-07-23
---

# 📚 Indice Documentazione Modulo Activity

**Status**: PHPStan Level 9 (verificato in `phpstan.neon`; `LogActivityAction` presente in `app/Actions/LogActivityAction.php`)

## 🎯 Lettura Essenziale
1. [README.md](./README.md) - Panoramica del modulo.
2. [philosophy.md](./philosophy.md) - Principi dell'Audit Trail e dell'Event Sourcing.

## 🏗️ Architettura e Pattern
- [Core Structure](./structure.md) - Organizzazione interna del modulo.
- [Event Sourcing](./event-sourcing.md) - Implementazione degli eventi di dominio.

## 📊 Filament & UI
- [Filament Resources](./filament-resources.md) - Gestione Log e Analytics nell'Admin Panel.
- [Analytics Widgets](./dual-label-chart-widget-implementation.md) - Grafici e statistiche.
- [Nested Resources](./filament-5-nested-resources-complete-guide.md) - Risorse nidificate in Filament v5.

## 🧪 Qualità e Testing
- [PHPStan Compliance](./phpstan-analysis.md) - Report sulla compliance (livello configurato: 9, cfr. phpstan.neon).
- [Testing Strategy](./testing-strategy-implementation.md) - Approccio Pest/PHPUnit.
- [Testing](./testing.md) - Struttura test e comando Pest modulo.
- [Pest bootstrap extend](./wiki/concepts/pest-bootstrap-extend-ignore.md) - Pilota `pest()->extend` (story 3.10).
- [PHPMD Fixes](./phpmd-fixes.md) - Risoluzione dei problemi di complessità ciclomatica.
- PSR-4 Test Helpers: preferire Pest e classi anonime nei test; evitare classi helper top-level non allineate al filepath.

## 🔧 Actions Pattern (verificato in codice)

```php
use Modules\Activity\Actions\LogActivityAction;

app(LogActivityAction::class)->execute(
    type: 'user.login',
    user: $user,
    subject: $record,
    properties: ['ip' => request()->ip()],
    description: 'User logged in successfully'
);
```

## 📦 Pacchetti Composer
- [Riferimento composer packages](../../../../bashscripts/ai/wiki/memories/composer-packages-reference.md)
- `spatie/laravel-activitylog` - Audit trail
- `spatie/laravel-event-sourcing` - Event sourcing, CQRS

## 🔗 Moduli Correlati
- [Xot](../../Xot/docs/README.md) - Core framework.
- [User](../../User/docs/README.md) - Autenticazione e causer activity.

## Dependency Intelligence
- [Dependency intelligence](dependency-intelligence.md)

## Regola Operativa Obbligatoria
- Prima di modificare codice: ragionare, studiare i docs del modulo/tema, aggiornare docs/rules/memory/skills.
- Riferimento globale: [Pre-Edit Docs-First Rule](../../../../docs/rules/pre-edit-docs-first-rule.md)
- Memory: [Pre-Edit Docs-First Memory](../../../../docs/memory/pre-edit-docs-first-memory.md)
- Skill: [Pre-Edit Docs-First Skill](../../../../docs/skills/pre-edit-docs-first-skill.md)

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*
</content>

---

<!-- Merged from 00-INDEX.md, which collided with this file on case-insensitive filesystems. -->

# 📚 **Indice Documentazione Modulo Activity**

**Status**: ✅ PHPStan Level 10 Compliant
**Module Version**: 2.3.0

## 🎯 **Lettura Essenziale**
1. [README.md](./readme.md) - Panoramica completa e Quick Start.
2. [roadmap.md](./roadmap.md) - Visione evolutiva e task aperti.
3. [philosophy.md](./philosophy.md) - I principi dell'Audit Trail e dell'Event Sourcing.

## 🏗️ **Architettura e Pattern**
- 🧩 **[Core Structure](./structure.md)** - Organizzazione interna del modulo.
- 🎯 **[Event Sourcing](./event-sourcing.md)** - Dettagli sull'implementazione degli eventi di dominio.
- 🔧 **[Actions Calling Actions](./actions-calling-actions-pattern.md)** - Pattern per la composizione delle azioni di logging.

## 📊 **Filament & UI**
- 📈 **[Filament Resources](./filament-resources.md)** - Gestione Log e Analytics nell'Admin Panel.
- 📉 **[Analytics Widgets](./dual-label-chart-widget-implementation.md)** - Implementazione dei grafici e delle statistiche.
- 🧭 **[Nested Resources](./filament-5-nested-resources-complete-guide.md)** - Guida alle risorse nidificate in Filament v5.

## 🧪 **Qualità e Testing**
- ✅ **[PHPStan Compliance](./phpstan-analysis.md)** - Report sulla stabilità Level 10.
- 🔬 **[Testing Strategy](./testing-strategy-implementation.md)** - Approccio Pest/PHPUnit per il modulo.
- 🧹 **[PHPMD Fixes](./phpmd-fixes.md)** - Risoluzione dei problemi di complessità cicromatica.
- 🧪 **PSR-4 Test Helpers** - Preferire Pest e classi anonime nei test; evitare classi helper top-level non allineate al filepath.

## 📋 **Documenti Prodotto & Sviluppo**

### Product
| File | Scopo |
|------|-------|
| PRODUCT_ROADMAP.md | Roadmap |
| PRODUCT_STRATEGY.md | Strategy |
| PRODUCT_LAUNCH_PLAN.md | Launch Plan |

### Development
| File | Scopo |
|------|-------|
| BUSINESS_LOGIC_ANALYSIS.md | Business logic |
| CODE_QUALITY_ANALYSIS.md | Code quality |
| QUERY_OPTIMIZATION_ANALYSIS.md | Query optimization |

### Filament
| File | Scopo |
|------|-------|
| FILAMENT_RESOURCE_GUIDELINES.md | Resource guidelines |

## 📦 **Pacchetti Composer**
- [Riferimento completo](../../../../docs/composer-packages-reference.md) | [Inventario 312 pacchetti](../../../../docs/architecture/composer-packages-full-inventory.md)
- `spatie/laravel-activitylog` - Audit trail
- `spatie/laravel-event-sourcing` - Event sourcing, CQRS

## 🔗 **Moduli Correlati**
- [Xot](../../xot/docs/readme.md) - Core framework.
- [Tenant](../../tenant/docs/readme.md) - Isolamento dati per tenant.
- [User](../../user/docs/readme.md) - Autenticazione e causer activity.

---
*Documentazione conforme agli standard Laraxot - DRY + KISS + SOLID*

## Dependency Intelligence

- [Dependency intelligence](dependency-intelligence.md)

## Regola Operativa Obbligatoria

- Prima di modificare codice: ragionare, studiare i docs del modulo/tema, aggiornare docs/rules/memory/skills.
- Riferimento globale: [Pre-Edit Docs-First Rule](../../../../docs/rules/pre-edit-docs-first-rule.md)
- Memory: [Pre-Edit Docs-First Memory](../../../../docs/memory/pre-edit-docs-first-memory.md)
- Skill: [Pre-Edit Docs-First Skill](../../../../docs/skills/pre-edit-docs-first-skill.md)