---
title: "Audit approfondito modulo Activity"
type: audit
status: review
updated: 2026-11-16
module: Activity
qmd: "audit approfondito Activity inventario PHPStan Pest policy Filament Actions"
---

# Audit approfondito — Activity

## Metodo

Source-first (2026-11-16): inventario filesystem, `rg` su policy/marker/label,
lettura purpose esistente, PHPStan globale Modules già a 0 errori. Nessuna UI
inventata. Pest dichiarato solo se eseguito.

## Inventario misurato

| Area | Conteggio |
|---|---:|
| PHP in `app/` | 92 |
| Test PHP | 152 |
| Models (`app/Models/*.php`) | 5 |
| Policy files (approx) | 8 |
| Resource Filament | 3 |
| Actions | 30 |
| Services | 0 |
| Migration | 9 |
| Lang IT files | 38 |
| Marker conflitto | 0 |
| Occorrenze `return true` in Policy | 2 |
| Ratio test/app | 1.65 |

## Scopo (da docs esistenti / codice)

## Lo scopo in una frase **Activity risponde alla domanda "chi ha cambiato cosa, quando e com'era prima" — che in una pubblica amministrazione non e' curiosita', e' un obbligo.**

## Finding preliminari (da inventario)

- Nessun finding automatico critico dall'inventario; completare review sicurezza/runtime con story dedicate.

## Finding approfonditi (codice)

- **P1** Policy concrete estendono `UserBasePolicy` invece di `ActivityBasePolicy` (`ActivityPolicy.php`, `SnapshotPolicy.php`, `StoredEventPolicy.php`) → bypass ruolo `activity::admin` non applicato.
- **P2** `TestModel` in `app/Models`; `Snapshot::$fillable` include `id`.
- Trail Spatie + LogViewer: path sanitizzato in `ResolveLogFilePathAction` (ok).

## Gate

```bash
cd laravel
php -d memory_limit=2G ./vendor/bin/phpstan analyse Modules/Activity
# Pest solo fuori da 10.100.200.15 e con DB testing raggiungibile
./vendor/bin/pest Modules/Activity/tests --no-coverage
```

PHPStan `Modules` (2026-11-16): **0 errori** sul tree completo.

## Piano

Vedi [piano-miglioramento.md](../piano-miglioramento.md).

## Riferimenti

- [audit.md](../audit.md)
- [ECC](../../ecc/activity-ecc-audit.md)
- [Story](../stories/module-bmad-audit.story.md)
