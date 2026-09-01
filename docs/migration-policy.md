# Migration Policy

Regola: una sola migration owner per modello. Evoluzione = `tableUpdate` + bump
timestamp. Duplicati/`add_*` → **`git rm`**.

**Vietato** sul disco (l'archivio è git):

- cartelle `_bak/`, `_legacy/`, `_archive_redundant/`, `archive/` sotto `database/migrations/`
- file `*.bak`, `*.old`, `*.merged` accanto al codice

Vedi anche: [one-migration-per-model](../../Xot/docs/wiki/concepts/one-migration-per-model.md),
memoria bump in `bashscripts/ai/wiki/memories/one-migration-per-model-bump-timestamp.md`.

## Principi

1. **Una sola migration owner per modello**
2. **Niente prefissi `add_*`, `fix_*`, `update_*`**
3. **Niente backup paralleli** — solo git
4. Canon Activity: `2026_06_10_141000_create_activity_table.php`
