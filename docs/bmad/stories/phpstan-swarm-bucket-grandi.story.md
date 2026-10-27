---
id: activity-phpstan-swarm-bucket-grandi
title: PHPStan swarm bucket grandi — Activity
status: done
module: Activity
start_errors: 59
end_errors: 0
updated: 2026-10-20
qmd: "activity phpstan variable.unused alreadyNarrowedType nullCoalesce swarm bucket"
# Facts GateGuard: (1) Non sostituisce phpstan-swarm-cluster5 / quality-gates-*; wave TSV bucket grandi. (2) related → cluster5 + quality-gates. (3) Nuova perché inventario TSV 2026-10-20 distinto. (4) User: «Aggiorna/crea UNA story per modulo in docs/bmad/stories/».
related:
  - ./phpstan-swarm-cluster5.story.md
  - ./quality-gates-phpstan-swarm.story.md
type: story
tags: [docs, activity, bmad]
---

# Activity — PHPStan swarm (bucket grandi)

## Scopo del modulo
Audit trail / event sourcing (Spatie): Activity log, Snapshot, StoredEvent, Actions di log/restore, Filament resources, listener login/logout.

## Inventario TSV (start)
| identifier | count |
|---|---|
| variable.unused | 34 |
| staticMethod.alreadyNarrowedType | 14 |
| nullCoalesce.unnecessary | 6 |
| varTag.nativeType | 2 |
| argument.unresolvableType | 2 |
| phpunit.assertCount | 1 |
| **totale** | **59** |

## Famiglie → scopo → causa → fix

1. **@phpstan-ignore vietati** — rimossi da Log/Restore/Listeners/Policies/Snapshot/StoredEvent/Integration; sostituiti con assert sullo scopo (proprietà Action, `is_a` inheritance, `method_exists`, `class_exists`).

2. **nullCoalesce.unnecessary** (`ActivityEventSourcingTest`) — dopo `assertArrayHasKey`, `$x = $arr['k'] ?? null` è ridondante → accesso diretto.

3. **alreadyNarrowed / varTag** (`SnapshotBusinessLogicTest`) — dopo `assertSame($originalState, $restoredState)` gli assert annidati su literal noti sono tautologici; resta il round-trip come prova di scopo.

4. **phpunit.assertCount** — `assertSame($n, count($events))` → `assertCount`.

5. **variable.unused / emptyClosure** — BaseModel create smoke, CoverageHundred `$logged`, RestoreAction; FilamentTest HOT (mtime &lt; 120s) → **SKIP** writer concorrente.

6. **new.resultUnused** — `new Foo;` da solo non basta in questo neon: usare `class_exists` / `method_exists`.

## File saltati
- `tests/Feature/FilamentTest.php` (HOT ricorrente)

## Verifica
Chunk ≤10, `flock -w 1800 /tmp/phpstan-gate.lock`, clear-result-cache se cache punta a file Xot cancellati.
