---

---
reated: 2026-08-04
type: architecture
tags: [module, architecture, audit, activity]
created: 2026-08-04
updated: 2026-08-04
---
# Activity Module — Architecture

## Purpose
Provides audit trail and activity logging via Spatie Laravel Activity Log. 
Tracks user actions, subject changes, and event sourcing.

## Core Components

**Models:**
- `Activity` — Base activity log model (spatie/laravel-activitylog)

**Actions:**
- `LogActivityAction` — Primary entrypoint for logging events

**Filament Resources:**
- `ActivityResource` — Browse/analyze activity logs

## Database Schema
- `activities` table: id, log_name, description, subject_id, subject_type, causer_id, causer_type, properties, created_at

## Quality Gates
✅ PHPStan L10: Executed (2026-07-28)
