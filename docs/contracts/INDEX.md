---
title: "INDEX contratti — Activity"
type: index
module: Activity
status: active
created: 2026-11-26
updated: 2026-11-26
qmd: "activity contracts index machine readable"
---

# Activity behavioral contract index

Inventario machine-readable dei contratti di comportamento del modulo **Activity**.
Ogni file `type: contract` in questa cartella e' elencato qui; la tabella di lavoro
italiana con i gruppi di invarianti e' in [index.md](index.md).

## Contratti

- [activity-logger](activity-logger.md)
- [activity-maintenance-action](activity-maintenance-action.md)
- [apply-activity-config-action](apply-activity-config-action.md)
- [authorize-log-access-action](authorize-log-access-action.md)
- [build-log-file-tree-action](build-log-file-tree-action.md)
- [build-log-viewer-state-action](build-log-viewer-state-action.md)
- [check-activity-log-writable-action](check-activity-log-writable-action.md)
- [download-log-file-action](download-log-file-action.md)
- [filter-log-entries-action](filter-log-entries-action.md)
- [get-activities-by-type-action](get-activities-by-type-action.md)
- [get-activity-statistics-action](get-activity-statistics-action.md)
- [get-log-directory-action](get-log-directory-action.md)
- [get-log-file-path-action](get-log-file-path-action.md)
- [get-model-activities-action](get-model-activities-action.md)
- [get-recent-activities-action](get-recent-activities-action.md)
- [get-subject-activity-log-action](get-subject-activity-log-action.md)
- [get-user-activities-action](get-user-activities-action.md)
- [is-activity-log-schema-writable-action](is-activity-log-schema-writable-action.md)
- [list-log-files-action](list-log-files-action.md)
- [log-activity-action](log-activity-action.md)
- [log-model-created-action](log-model-created-action.md)
- [log-model-deleted-action](log-model-deleted-action.md)
- [log-model-updated-action](log-model-updated-action.md)
- [log-user-login-action](log-user-login-action.md)
- [log-user-logout-action](log-user-logout-action.md)
- [parse-log-entries-action](parse-log-entries-action.md)
- [read-log-tail-action](read-log-tail-action.md)
- [record-subject-activity-action](record-subject-activity-action.md)
- [redact-model-attributes-action](redact-model-attributes-action.md)
- [restore-activity-action](restore-activity-action.md)

## Autore

Usa lo standard di authoring Xot `Modules/Xot/docs/contracts/contract-authoring-standard.md`
e il template [_template.md](_template.md). Il comportamento legacy e' documentato cosi'
com'e' e non e' un modello per codice nuovo.
