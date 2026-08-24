# PRD - Activity Module

## 1. Executive Summary
The Activity module is responsible for tracking and logging all system actions, audit trails, and user interactions across the PTVX platform. It provides a centralized repository for observability and compliance.

## 2. Target Personas
- **System Administrators:** Monitor system health and audit logs.
- **Security Officers:** Review access logs for compliance and security investigations.
- **Internal Developers:** Integrate activity logging into other modules.

## 3. Functional Requirements

### P0 (Critical)
- **Agnostic Audit Trail**: Log CRUD operations for any model extending `XotBaseModel`.
- **Event Sourcing Support**: Provide standard resources for `StoredEvent` and `Snapshot` management.
- **Filament Integration**: Refactored resources using the `Schemas/Tables` pattern for better maintainability.

### P1 (High Priority)
- **Search & Filter**: Advanced filtering by `causer`, `subject`, and `batch_uuid`.
- **JSON Properties**: Support for schemaless attributes in log properties for flexible metadata storage.

### P2 (Nice to Have)
- **PDF Reporting**: Export activity summaries as institutional-grade PDF reports.
- **Retention Policies**: Automatic cleanup of old logs based on configurable thresholds.

## 7. Release Criteria
- 100% PHPStan Level 10 compliance.
- Test coverage > 80% for logging logic.
- API documentation completed.

---

<!-- Merged from PRD.md, which collided with this file on case-insensitive filesystems. -->

---
title: "Product Requirements Document (PRD) - Activity Module"
module: "Activity"
type: concept
tags: [PRD, activity, audit, logging]
created: 2026-08-04
updated: 2026-08-04
---
# Product Requirements Document (PRD) - Activity Module

**Module**: Activity
**Version**: 1.0
**Status**: Draft
**Author**: Product Team

## Executive Summary
Activity tracking and audit logging module for Laraxot platform.

## Functional Requirements
- Audit trail for all user actions
- Activity logging with Spatie Laravel Activity Log
- Filament resource for activity browsing
- Integration with all modules

## Technical Specifications
- PHPStan Level 10 compliance
- Pest test coverage >90%
- Integration with Xot base models

