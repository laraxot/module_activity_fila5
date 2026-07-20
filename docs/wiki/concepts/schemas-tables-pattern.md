# Schemas & Tables Pattern

## 1. Overview
The **Schemas & Tables Pattern** is an architectural decision to extract the configuration of Filament forms, tables, and infolists from the main `Resource` class into specialized, reusable classes. This improves maintainability, reduces class size, and facilitates testing.

## 2. Structure
For a given resource (e.g., `ActivityResource`), the structure is:
- `ActivityResource.php` (Orchestrator)
- `ActivityResource/`
    - `Schemas/`
        - `ActivityForm.php`
        - `ActivityInfolist.php`
    - `Tables/`
        - `ActivitiesTable.php`

## 3. Implementation Rules
- **Naming**: Classes in `Schemas/` are singular (`ModelNameForm`), while classes in `Tables/` are pluralized (`ModelNamesTable`) to match `XotBaseResource` auto-resolution.
- **Base Classes**:
    - Forms extend `Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm`.
    - Tables extend `Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable`.
    - Infolists extend `Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist`.
- **Translations**: Do NOT use `->label()` calls. The `LangServiceProvider` auto-resolves labels based on the namespace and key.

## 4. Resource Integration
`XotBaseResource` automatically attempts to resolve these classes in its `form()`, `table()`, and `infolist()` methods. If found, it calls the `configure()` method on them.

```php
// Example in ActivityResource.php
public static function getFormSchema(): array
{
    return []; // Logic moved to ActivityForm.php
}
```

## 5. Benefits
- **Separation of Concerns**: UI logic is decoupled from resource orchestration.
- **DRY**: Schemas can be reused across different resources or widgets.
- **Clean Code**: Individual files are smaller and easier to audit with PHPStan.

## 6. Known Drift in This Module (verified 2026-07-20)

Two accuracy gaps exist between this doc and the current code — noted here rather than silently fixed, since fixing them is an application-code change out of scope for a docs-only pass:

- **`ActivityResource.php` still overrides `getFormSchema()` directly** (`app/Filament/Resources/ActivityResource.php`), duplicating the exact same field list already defined in `app/Filament/Resources/ActivityResource/Schemas/ActivityForm.php`. Per the Zen pattern (see [xotbase-resource-zen-pattern](xotbase-resource-zen-pattern.md)), the Resource should NOT define `getFormSchema()` itself — `XotBaseResource` auto-discovers `Schemas/ActivityForm`. Today both exist in parallel with identical content; the Resource-level override wins at runtime (it's checked first), so `ActivityForm.php` is currently dead code.
- **Duplicate/stale table class**: `app/Filament/Resources/ActivityResource/Tables/ActivitysTable.php` (naive "Activity"+"s", only 4 columns) coexists with `ActivitiesTable.php` (correct pluralization, full column set). `XotBaseResourceTable` auto-discovery resolves by correct English pluralization (`ActivitiesTable`), so `ActivitysTable` is unused dead code, not a competing implementation — but it should not be treated as a second source of truth if anyone edits table columns.

Anyone changing Activity's form or table columns should edit `Schemas/ActivityForm.php` / `Tables/ActivitiesTable.php` and, ideally, remove the redundant `getFormSchema()` override and the `ActivitysTable.php` file — but that is a code change, not a doc change.
