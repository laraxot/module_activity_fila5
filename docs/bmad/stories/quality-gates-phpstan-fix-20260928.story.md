---
id: Activity/quality-gates-phpstan-fix-20260928
title: "PHPStan Modules — remediation BMAD 2026-09-28"
status: in-progress
epic: quality-gates
module: Activity
priority: P1
references:
  - ../../../Xot/docs/bmad/stories/5.227-phpstan-modules-verify-coordinated.story.md
  - ../../../../../../docs/sprint-status.yaml
  - ../../../../../../bashscripts/ai/wiki/memories/feedback-scan-committed-conflict-markers-first-on-bootstrap-crash.md
---

# Story — PHPStan fleet remediation

## Acceptance criteria

- [ ] `cd laravel && ./vendor/bin/phpstan analyse Modules` termina con exit 0.
- [ ] Ogni finding viene corretto alla radice, senza baseline, ignore o modifica a `phpstan.neon`.
- [ ] I marker di conflitto e i parse error del modulo Activity sono risolti con contenuto verificato, non con rimozioni cieche.
- [ ] Evidenze e decisioni sono aggiornate nel second brain.

## Esecuzione 2026-09-28

Il gate iniziale ha restituito **51 errori**: Activity, configurazioni Rector/PHPInsights,
Incentivi, UI. Dopo i fix mirati, il bootstrap resta bloccato da WIP concorrente in
`Modules/Activity`: 380 file contengono marker di conflitto; la rimozione meccanica dei
soli marker non basta perché diversi blocchi sono annidati e producono 136 parse error.
Serve recupero contenuto per contenuto e coordinamento del proprietario del WIP.

## Riesecuzione successiva

Con una finestra inizialmente stabile, PHPStan ha completato l'analisi e ha restituito
114 errori. Sono stati isolati fix indipendenti per Activity, Job, Lang e UI; durante la
correzione il working tree ha reintrodotto marker di conflitto. La riesecuzione seguente
è tornata al bootstrap failure (`unexpected token <<`) con 211 file PHP marcati, quindi
il gate non è attribuibile ai fix e il lavoro viene fermato fino a stabilizzazione del tree.

## Riesecuzione 2026-09-28 — STOP concorrenti

La riesecuzione richiesta dall'utente ha fallito al bootstrap su
`Modules/Xot/helpers/Helper.php:16` (`unexpected token "<<"`). Una nuova scansione
ha rilevato 1.452 file PHP con marker di conflitto nel tree, contro i 380 misurati
nel passaggio precedente: il tree viene modificato mentre il gate gira. Non è sicuro
applicare fix casuali o lanciare swarm di modifiche finché il WIP concorrente/daemon
non è fermato e il proprietario non viene identificato.

Fix mirati applicati e verificati con `php -l`: Activity logger, configurazioni PHPInsights/Rector,
`CreateAction::createAnother(false)`, Block UI e rimozione del `LocationSelector` Geo
reintrodotto senza modulo Geo.

## GitHub

Repository modulo: da verificare con `git -C laravel/Modules/Activity remote -v`; nessun issue inventato.
