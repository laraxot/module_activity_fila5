---
title: "model factory seeder audit"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "model factory seeder audit"
issues: []
discussions: []
---

# Model/Factory/Seeder Audit

Generated: 2025-08-22 16:20
Generated: [DATE] 16:20

## Coverage
- Models: Activity, Snapshot, StoredEvent
- Factories: present for all 3
- Seeders: `ActivityDatabaseSeeder.php` exists, but no direct model usage detected

## Missing
- Model-specific seeding for: Activity, Snapshot, StoredEvent (populate realistic samples)

## Candidates likely non-business-critical
- None. All three are infrastructural but used by activity tracking.

## Actions
- Add seeding inside `Modules/Activity/database/seeders/ActivityDatabaseSeeder.php`
- Keep factories updated with strict typing