---
title: "INDEX contratti — Activity"
type: index
module: Activity
status: active
created: 2026-11-23
updated: 2026-11-26
qmd: "activity contracts index copertura invarianti log viewer audit"
---

# Indice dei contratti — Activity

Ogni file `type: contract` descrive una Action del modulo con le sei sezioni canoniche
(`Input`, `Output`, `Invarianti`, `Effetti collaterali`, `Errori`, `Non fa`) e il marker
`action: <FQCN>` nella frontmatter. La classe implementatrice rimanda al file con
`@contract docs/contracts/<file>.md` nel docblock.

## Audit e registro delle attività

| Contratto | Action | File |
|---|---|---|
| [LogActivityAction](log-activity-action.md) | `Modules\Activity\Actions\LogActivityAction` | [log-activity-action.md](log-activity-action.md) |
| [ActivityLogger](activity-logger.md) | `Modules\Activity\Actions\ActivityLogger` | [activity-logger.md](activity-logger.md) |
| [RecordSubjectActivityAction](record-subject-activity-action.md) | `Modules\Activity\Actions\RecordSubjectActivityAction` | [record-subject-activity-action.md](record-subject-activity-action.md) |
| [RedactModelAttributesAction](redact-model-attributes-action.md) | `Modules\Activity\Actions\RedactModelAttributesAction` | [redact-model-attributes-action.md](redact-model-attributes-action.md) |
| [LogModelCreatedAction](log-model-created-action.md) | `Modules\Activity\Actions\LogModelCreatedAction` | [log-model-created-action.md](log-model-created-action.md) |
| [LogModelUpdatedAction](log-model-updated-action.md) | `Modules\Activity\Actions\LogModelUpdatedAction` | [log-model-updated-action.md](log-model-updated-action.md) |
| [LogModelDeletedAction](log-model-deleted-action.md) | `Modules\Activity\Actions\LogModelDeletedAction` | [log-model-deleted-action.md](log-model-deleted-action.md) |
| [LogUserLoginAction](log-user-login-action.md) | `Modules\Activity\Actions\LogUserLoginAction` | [log-user-login-action.md](log-user-login-action.md) |
| [LogUserLogoutAction](log-user-logout-action.md) | `Modules\Activity\Actions\LogUserLogoutAction` | [log-user-logout-action.md](log-user-logout-action.md) |
| [RestoreActivityAction](restore-activity-action.md) | `Modules\Activity\Actions\RestoreActivityAction` | [restore-activity-action.md](restore-activity-action.md) |
| [ActivityMaintenanceAction](activity-maintenance-action.md) | `Modules\Activity\Actions\ActivityMaintenanceAction` | [activity-maintenance-action.md](activity-maintenance-action.md) |
| [ApplyActivityConfigAction](apply-activity-config-action.md) | `Modules\Activity\Actions\Config\ApplyActivityConfigAction` | [apply-activity-config-action.md](apply-activity-config-action.md) |

## Query del registro

| Contratto | Action | File |
|---|---|---|
| [GetUserActivitiesAction](get-user-activities-action.md) | `Modules\Activity\Actions\Query\GetUserActivitiesAction` | [get-user-activities-action.md](get-user-activities-action.md) |
| [GetActivitiesByTypeAction](get-activities-by-type-action.md) | `Modules\Activity\Actions\Query\GetActivitiesByTypeAction` | [get-activities-by-type-action.md](get-activities-by-type-action.md) |
| [GetRecentActivitiesAction](get-recent-activities-action.md) | `Modules\Activity\Actions\Query\GetRecentActivitiesAction` | [get-recent-activities-action.md](get-recent-activities-action.md) |
| [GetActivityStatisticsAction](get-activity-statistics-action.md) | `Modules\Activity\Actions\Query\GetActivityStatisticsAction` | [get-activity-statistics-action.md](get-activity-statistics-action.md) |
| [GetSubjectActivityLogAction](get-subject-activity-log-action.md) | `Modules\Activity\Actions\Query\GetSubjectActivityLogAction` | [get-subject-activity-log-action.md](get-subject-activity-log-action.md) |
| [GetModelActivitiesAction](get-model-activities-action.md) | `Modules\Activity\Actions\Query\GetModelActivitiesAction` | [get-model-activities-action.md](get-model-activities-action.md) |

## Schema e pulizia

| Contratto | Action | File |
|---|---|---|
| [CheckActivityLogWritableAction](check-activity-log-writable-action.md) | `Modules\Activity\Actions\Schema\CheckActivityLogWritableAction` | [check-activity-log-writable-action.md](check-activity-log-writable-action.md) |
| [IsActivityLogSchemaWritableAction](is-activity-log-schema-writable-action.md) | `Modules\Activity\Actions\Schema\IsActivityLogSchemaWritableAction` | [is-activity-log-schema-writable-action.md](is-activity-log-schema-writable-action.md) |

## Visualizzatore e download dei log

| Contratto | Action | File |
|---|---|---|
| [AuthorizeLogAccessAction](authorize-log-access-action.md) | `Modules\Activity\Actions\Log\AuthorizeLogAccessAction` | [authorize-log-access-action.md](authorize-log-access-action.md) |
| [GetLogDirectoryAction](get-log-directory-action.md) | `Modules\Activity\Actions\Log\GetLogDirectoryAction` | [get-log-directory-action.md](get-log-directory-action.md) |
| [GetLogFilePathAction](get-log-file-path-action.md) | `Modules\Activity\Actions\Log\GetLogFilePathAction` | [get-log-file-path-action.md](get-log-file-path-action.md) |
| [BuildLogViewerStateAction](build-log-viewer-state-action.md) | `Modules\Activity\Actions\Log\BuildLogViewerStateAction` | [build-log-viewer-state-action.md](build-log-viewer-state-action.md) |
| [ListLogFilesAction](list-log-files-action.md) | `Modules\Activity\Actions\Log\ListLogFilesAction` | [list-log-files-action.md](list-log-files-action.md) |
| [BuildLogFileTreeAction](build-log-file-tree-action.md) | `Modules\Activity\Actions\Log\BuildLogFileTreeAction` | [build-log-file-tree-action.md](build-log-file-tree-action.md) |
| [ReadLogTailAction](read-log-tail-action.md) | `Modules\Activity\Actions\Log\ReadLogTailAction` | [read-log-tail-action.md](read-log-tail-action.md) |
| [ParseLogEntriesAction](parse-log-entries-action.md) | `Modules\Activity\Actions\Log\ParseLogEntriesAction` | [parse-log-entries-action.md](parse-log-entries-action.md) |
| [FilterLogEntriesAction](filter-log-entries-action.md) | `Modules\Activity\Actions\Log\FilterLogEntriesAction` | [filter-log-entries-action.md](filter-log-entries-action.md) |
| [DownloadLogFileAction](download-log-file-action.md) | `Modules\Activity\Actions\Log\DownloadLogFileAction` | [download-log-file-action.md](download-log-file-action.md) |

## Note

- Le decisioni dietro i contratti stanno in [../adr/](../adr/README.md).
- Il template per un nuovo contratto e' [_template.md](_template.md); il formato e' descritto in [README.md](README.md).
