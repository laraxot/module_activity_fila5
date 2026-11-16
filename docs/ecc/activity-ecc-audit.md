---
id: Activity/ecc-audit
title: "ECC — audit di qualità del modulo Activity"
status: in-progress
module: Activity
qmd: "Activity ECC audit verification security testing"
references:
  - ../bmad/audit.md
  - 00-index.md
---

# ECC — audit Activity

## Checklist

- [x] PHPStan level massimo senza baseline o ignoreErrors.
- [ ] Pest completato con database testing raggiungibile.
- [x] PHP lint sui sei test corretti.
- [ ] Policy e tenant boundary verificati con test runtime.
- [ ] Redazione dei dati sensibili verificata nei log.
- [ ] Documentazione ridondante classificata e consolidata.
- [ ] QMD e graphify aggiornati dopo la chiusura.

## Criterio di chiusura

Lo stato passa a done solo con output Pest osservabile, finding aperti
tracciati in story BMAD e aggiornamento degli indici.



---

---
qmd: ECC audit modulo Activity verification security testing workflow
title: ECC audit operativo modulo Activity
status: baseline-review
---

# ECC audit operativo modulo Activity

## Contratto PTVX

Questo documento seleziona le verifiche ECC applicabili al modulo `Activity`
senza sostituire AGENTS.md, BMAD o le regole locali. ECC deve produrre una
correzione minima, source-first, con lock prima dell'edit e gate dopo l'edit.

## Checklist

- [ ] `clean-code`: metodi piccoli, DRY, KISS, nessun wrapper inutile.
- [ ] `security-review`: policy, input, mass assignment, export, log e privacy.
- [ ] `laravel-verification`: route, config, migration additive e container.
- [ ] `verification-loop`: PHPStan level max + Pest mirato + diff check.
- [ ] `tdd-workflow`: test di regressione prima o insieme alla correzione.
- [ ] `documentation-sync`: story BMAD, indice modulo e QMD aggiornati.
- [ ] `context-engineering`: usare QMD/graphify prima e registrare il perché dopo.

## Input del modulo

- PHP app: 92
- test: 152
- policy: 4
- resource Filament: 3
- action: 30

## Procedura per ogni finding

1. Recuperare contesto da QMD e caller con `rg`.
2. Creare o aggiornare la story in `docs/bmad/stories`.
3. Acquisire lock sui file disgiunti.
4. Correggere la causa, non il messaggio PHPStan.
5. Eseguire il test minimo e poi i gate del modulo.
6. Registrare evidenza, limiti e follow-up nella story.

## Anti-pattern vietati

- baseline PHPStan o `@phpstan-ignore` senza motivazione verificata;
- test svuotati per nascondere un errore;
- migrazioni distruttive o accesso a dati sacri;
- screenshot, dati o comportamento inventati;
- documenti con date/timestamp nel nome;
- modifica di file già lockati da un altro agente.

## Esito

Baseline ECC creata. Il modulo non è dichiarato conforme finché gli acceptance
criteria del documento BMAD corrispondente non risultano verificati con output
dei gate.
