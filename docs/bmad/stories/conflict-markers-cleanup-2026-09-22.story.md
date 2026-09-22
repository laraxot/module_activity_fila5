---
story: activity-conflict-markers-cleanup
title: Risolvere marker di conflitto annidati mai risolti in 90 file docs/
description: >
  HEAD del modulo Activity conteneva 90 file .md (soprattutto in docs/,
  più .github/contributing.md e .github/security.md) con marker di
  conflitto git (<<<<<<<, =======, >>>>>>>) mai risolti, in alcuni casi
  annidati fino a 4 round sovrapposti (HEAD / laraxot/dev / commit
  intermedi 0a02158a "." e 35d8cf69 "Initial commit"), es.
  docs/00-index.md con 39 righe marker su 385.
  Un tentativo precedente (non committato, di un'altra sessione/processo
  concorrente non identificato) aveva "risolto" il problema svuotando i
  file (fino a 0 byte per docs/README.md): scoperto e scartato con
  `git restore --source=HEAD -- .` prima di qualunque commit, nessun
  danno reale avvenuto.
epic: docs-conflict-markers-cleanup
status: done
assignee: ai-agent
created: 2026-09-22
updated: 2026-09-22
references:
  - memory: bashscripts/ai/wiki/memories/feedback-orphan-merge-markers-hide-from-grep.md
  - memory: bashscripts/ai/wiki/memories/feedback-scan-committed-conflict-markers-first-on-bootstrap-crash.md
  - memory: bashscripts/ai/wiki/memories/feedback-never-wholesale-replace-file.md
  - sprint-status: "Job/docs-conflict-markers-cleanup-2026-09-22 (pattern analogo, altro modulo)"
tasks:
  - description: Enumerare i file con marker residui nel working tree
    type: investigation
    status: done
    checkbox: '[x]'
  - description: Scartare il tentativo precedente che svuotava i file (git restore da HEAD)
    type: fix
    status: done
    checkbox: '[x]'
  - description: Rimuovere i marker mantenendo tutto il contenuto reale (script Python, no cancellazioni)
    type: fix
    status: done
    checkbox: '[x]'
  - description: Ripristinare la parità dei fence markdown rotta dalla struttura annidata (2 file, testing-coverage-policy.md e readme-update.md)
    type: fix
    status: done
    checkbox: '[x]'
  - description: Verificare 0 marker residui e nessuna riduzione anomala di contenuto su tutto il modulo
    type: verification
    status: done
    checkbox: '[x]'
  - description: Commit e push su laraxot/dev
    type: implementation
    status: done
    checkbox: '[x]'
acceptance_criteria:
  - given: Un file del modulo Activity aveva marker di conflitto in HEAD
    when: Si esegue grep dei marker su tutto il modulo
    then: Nessun file risulta più contenere marker di conflitto
  - given: Un file aveva contenuto reale su entrambi i lati del conflitto
    when: Il conflitto viene risolto
    then: Nessun contenuto reale viene perso (solo le righe marker sono rimosse)
notes: |
  Caso particolare docs/testing-coverage-policy.md: sezione ".env.testing"
  aveva due varianti REALI non identiche (placeholder generico vs valore
  "techplanner") non deduplicabili automaticamente; mantenute entrambe con
  fence markdown propri e titolo "variante alternativa" invece di lasciare
  la seconda orfana senza fence di apertura.

  Non è stato possibile identificare con certezza l'autore/processo che ha
  prodotto il tentativo distruttivo (svuotamento file) scartato prima del
  commit: nessun file di lock o story BMAD attiva trovata per Activity al
  momento dell'intervento, nessuna prova diretta di un secondo agente
  concorrente su QUESTO modulo specifico (a differenza di Xot, dove è
  stata trovata una story BMAD non tracciata di un'altra sessione).
commit: 5fe111e1
