# Activity Module — Structure & Discipline

## Module Root (PascalCase)

```
Modules/Activity/
├── app/              # Domain logic (actions, models, traits, services)
├── config/           # Laravel config (lowercase)
├── database/         # Migrations, seeders, factories (lowercase)
├── resources/        # Views, translations (lowercase)
├── routes/           # HTTP & API routes (lowercase)
├── tests/            # Unit, feature, pest tests (lowercase)
├── docs/             # Module documentation (THIS FOLDER)
└── composer.json     # Module metadata
```

## What Does NOT Belong Here

### ❌ rector.php

**Rector is a global tool**, not a module concern. Configuration belongs in `laravel/rector.php` only.

**Why?**
- PHPStan cannot resolve Rector's classes in module configs
- Scatters configuration across the repo instead of centralizing
- Violates single-source-of-truth principle

If this module has custom refactoring needs:
1. Add conditional logic to `laravel/rector.php` (path-based checks)
2. Document the rule here in `docs/`
3. Never create `Activity/rector.php`

### ❌ phpstan.neon

PHPStan config is global (`laravel/phpstan.neon`). Module-level overrides fragment type-checking.

### ❌ ci.yml, deployment configs

CI/CD configurations belong in `.github/workflows/` at repo root, not per-module.

## Internal Discipline

- **Files**: lowercase `snake_case` (e.g., `SendNotificationAction.php` ✓, `SendnotificationAction.php` ✗)
- **Namespaces**: `Modules\Activity\...` (root PascalCase, internals PascalCase)
- **Directories**: lowercase `actions/`, `models/`, `traits/`, `services/`

## Documentation Structure

```
docs/
├── MODULE_STRUCTURE.md   # This file (structure & discipline)
├── QUICKSTART.md         # Getting started, examples
├── API.md                # Public interfaces, traits, exceptions
├── DEVELOPMENT.md        # Contributing guide, patterns
└── DECISIONS.md          # ADRs, why we chose X over Y
```

## See Also

- `laravel/phpstan.neon` — Type-checking rules (global)
- `laravel/rector.php` — Refactoring rules (global)
- `root CLAUDE.md` — Project-wide discipline
