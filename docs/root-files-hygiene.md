# Root files hygiene

## 2026-07-08 16:51

- created `Activity.code-workspace` as the single canonical root workspace file.
<<<<<<< HEAD
=======

## 2026-09-22

- canonical workspace filename corrected to `_module_activity.code-workspace` (rule: `_<remote-repo-name-minus-_filaN-suffix>.code-workspace`; remote is `module_activity_fila5`, so `_module_activity`).
- removed duplicate root workspace files: `Activity.code-workspace`, `_activity.code-workspace`, `_module_activity_fila5.code-workspace`. Settings were superficially different only (commented-out dead keys, formatting); `_module_activity.code-workspace` already held the richest content, nothing to merge.
>>>>>>> 472c43a3 (.)
