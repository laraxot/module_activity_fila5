<<<<<<< HEAD
# Activity — quality gate status (2026-09-22)

Eseguito dopo la pulizia dei marker di conflitto in `docs/*.md` (commit
`5fe111e1`, `e6eb12dd`, `7836580e`, `d79c39d5`). Modifiche di questa sessione
sono solo documentazione (`docs/`, `.github/`); gate PHP eseguiti per
conferma, come da procedura standing order.

## PHPStan (Modules/Activity)

```
[OK] No errors
```

## PHPMD (`tools/phpmd.sh Modules/Activity`)

Exit code 0. Findings solo su `tests/` (parametri inutilizzati nei mock
Filament, import mancanti, variabile lunga, flag booleano) — nessuno
introdotto da questa sessione (solo file `docs/` toccati).

Il parser (pdepend, via phpmd.phar) muore con `UnexpectedTokenException`
su `tests/Unit/Listeners/LoginLogoutListenerBehaviorTest.php:32`:
sintassi PHP 8.4 `new ReflectionClass(...)->getProperty(...)` (chaining su
`new` senza parentesi) non supportata dal parser di phpmd.phar. Verificato
`php -l` sul file: nessun errore di sintassi, file valido. Falso negativo
noto del tool, non un difetto del codice (vedi memoria
`feedback-phpmd-phar-dies-on-dnf-types.md`).

## PHPInsights (`tools/phpinsights.sh analyse Modules/Activity`)

| Metrica | Punteggio |
|---|---|
| Code | 95.3 |
| Complexity | 100 |
| Architecture | 78.6 |
| Style | 90.1 |
| Security issues | 0 |

Nessuna regressione attesa: nessun file PHP toccato in questa sessione.

## Pest

**Non eseguito**: DB `10.100.200.53:3306` non raggiungibile (`nc -z`
fallito), come da pattern noto (`project-test-db-unreachable-drives-skips.md`).
Nessun test è stato eseguito per evitare hang; da rilanciare quando il DB
di test è raggiungibile.
=======
<<<<<<< HEAD
# Activity Module — Test Coverage & Quality Metrics

**Last Updated:** 2026-09-11 (followup — `ActivitysTable.php` dead code removal)

## 2026-09-11 update — dead code removal (`ActivitysTable.php`)

Scope: single item from
`docs/stories/xotbaseresourcetable-dead-code-duplicate-table-classes-followup.story.md`
(root, Activity row) + module story
`docs/stories/xotbaseresourcetable-model-audit-batch-activity.story.md`.

- Confirmed via `XotBaseResource::getTableClass()` (`Str::plural('Activity')` =
  `'Activities'`) that `ActivitiesTable` is the only class ever resolved by
  `ActivityResource::table()`. `ActivitysTable` (typo, singular "Activitys") was
  never wired.
- Content comparison: `ActivitiesTable` is a strict superset of `ActivitysTable`'s
  columns (`id, log_name, description, created_at` all present, plus 8 more). No
  content to migrate.
- `git log -S"ActivitysTable"` shows the file was already deleted once (commit
  `3e81f97f`, 2026-07-20) and reappeared later in history (repo has many squash/rebase
  `.` commits — likely a merge reintroduced it). Re-verified from scratch instead of
  trusting the old commit.
- Deleted `app/Filament/Resources/ActivityResource/Tables/ActivitysTable.php` and the
  corresponding dead test (`'ActivitysTable espone colonne compatte'`) + unused import
  in `tests/Unit/Filament/ActivityFilamentExtendedTest.php` (this grep hit was missed
  by the earlier same-day audit, which only searched `app/`, not `tests/`).
- PHPStan (`Modules/Activity`, full module): `[OK] No errors`.
- PHPMD (`Modules/Activity/app`, `tools/phpmd.sh ... text ../docs/phpmd.ruleset.xml`):
  3 pre-existing `CouplingBetweenObjects` warnings on files not touched by this change
  (`ActivityLogger.php` x2, `ListLogActivities.php`); PHPMD run directly on the edited
  test file: zero violations. (Running PHPMD against the whole `tests/` dir crashes
  with `No node to visit provided for visitAnonymousClass` — pre-existing tool
  limitation, unrelated to this change, matches documented PHPMD behavior.)
- Pest: ran `Modules/Activity/tests/Unit` (`XDEBUG_MODE=coverage`, required — without
  it Pest exits silently with 0 tests run): **144 failed, 4 risky, 121 passed (275
  assertions)**. Isolated to the touched file
  (`--filter ActivityFilamentExtendedTest`): 4 failed, 2 passed — the 4 failures are
  in `SnapshotsTable`/`StoredEventsTable`/`ActivityInfolist` assertions, **pre-existing
  and unrelated to this change** (column-order drift introduced earlier the same day
  by commit `ca92df89`, out of scope for this single-item task). Full
  `Modules/Activity` (Unit+Feature) run hits a pre-existing PHP fatal error unrelated
  to this change: `TestActivityModel.php:32` — `A precedence rule was defined for
  Modules\Xot\Models\Traits\HasXotFactory::newFactory but this method does not exist`
  (Feature suite). Neither pre-existing issue was touched or fixed here — out of scope
  for the assigned item; flagged for a separate story/issue.
- Verified these failures are unaffected by this change: `git stash` /
  `git stash pop` round-trip confirmed the diff touches only the `ActivitysTable`
  import + its dedicated test block, nothing in `SnapshotsTable.php`,
  `StoredEventsTable.php`, `ActivityLogger.php`, or `TestActivityModel.php`.

## Test Execution Status

### Before PHPStan Phase 2 (2026-09-06)
- Pest config conflict detected (TestCaseAlreadyInUse)
- 14 PHPStan L10 errors (cast.string, generics.notGeneric, deprecated)

### After PHPStan Phase 2 Fixes (2026-09-07)
- ✅ PHPStan: 14 errors → 0 errors (6 cast.string + 3 generics + 5 deprecated fixed)
- ⚠️ Pest: Config issue remains (pre-existing, not from fix)
- ✅ PHPMD: 4 ShortVariable warnings (acceptable for callback context)

## Quality Gate Summary

| Gate | Status | Notes |
|------|--------|-------|
| PHPStan L10 | ✅ PASS | Zero errors (all 14 resolved) |
| PHPMD | ✅ PASS | Baseline: 4 ShortVariable warnings in ListLogActivities.php (lambda context) |
| Pest | ⚠️ PENDING | Config TestCaseAlreadyInUse (pre-existing, out of scope for Phase 2) |

## Coverage Improvement

- **Scope of Fix:** 5 files edited (ListLogActivities.php, Activity.php, Snapshot.php, StoredEvent.php, ActivityServiceProviderTest.php)
- **Lines Modified:** 8 (4 cast → strval, 3 @phpstan-use removed, 1 cast → strval)
- **Minimal Impact:** No logic changes, type-narrowing only

## Next Steps

1. ⏳ Resolve Pest config conflict (separate story, not Phase 2 scope)
2. ⏳ Run full Activity Pest suite (pending config fix)
3. ✅ Module PHPStan complete
4. ✅ Git sync complete (pushed to laraxot/dev)

---

**Git Commit:** fix: PHPStan L10 — Activity module cast.string + generics fixes
**Remote:** pushed to laraxot/module_activity_fila5/dev
=======
---
module: theme
topic: coverage
canonical: ../../../Themes/docs/shared-components/coverage.txt
---

See canonical documentation: ../../../Themes/docs/shared-components/coverage.txt
>>>>>>> laraxot/dev
>>>>>>> a95e8f36 (.)
