---
id: Activity/php-conflict-markers
title: "Risoluzione marker di conflitto PHP in Activity"
status: review
epic: quality-gates
module: Activity
priority: P1
references:
  - ../../../../../../docs/sprint-status.yaml
  - ../../../tests/Unit/SnapshotPolicyTest.php
qmd: "Activity PHP conflict markers SnapshotPolicyTest merge resolution"
---

# Story — Marker di conflitto PHP

## Acceptance criteria

- [x] Tutti i marker `<<<<<<<`, `=======`, `>>>>>>>` nei file PHP di Activity sono risolti.
- [x] Il test conserva `TestCase::class` e la tipizzazione del contesto Pest.
- [x] La soluzione PHPUnit resta invariata semanticamente; `TestCase::mockeryExpect` non si applica.
- [x] `php -l` sul file PHP modificato: verde.
- [ ] Pest mirato: avviato, ma bloccato dal guard di sicurezza perché la configurazione
  punta a MySQL remoto `10.100.200.53`; nessun test ha raggiunto il database.

## Scelta

È stato mantenuto il lato `laraxot/dev`: import già presente, `uses(TestCase::class)`,
annotazione `@var TestCase $this` e istanziazione senza parentesi. Nessuna logica di
produzione o fixture è stata modificata.

## Gate finale

`php -l` e Pint sono verdi. La scansione dei marker PHP restituisce zero risultati.
Pest ha restituito exit 2 con quattro bootstrap failure e zero assertion per il
`TestDatabaseGuard`; non è stato consentito alcun accesso al database remoto.
