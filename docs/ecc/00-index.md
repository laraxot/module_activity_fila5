---
id: Activity/ecc-index
title: "ECC — indice operativo del modulo Activity"
status: in-progress
module: Activity
qmd: "Activity ECC verification security testing quality gates"
references:
  - ../bmad/audit.md
  - Activity-ecc-audit.md
---

# ECC — modulo Activity

Questo indice collega le verifiche ECC al contratto dell'audit trail e mantiene
il workflow PTVX: source-first, lock, PHPStan senza baseline, test Pest e
documentazione QMD.

## Gate

- PHPStan mirato: verificato, 0 errori.
- Pest: da eseguire in ambiente testing non produttivo.
- Security: verificare policy, tenant boundary e dati personali nei log.
- Regression: verificare create, update, delete, login e logout.
- Docs: deduplicare gli audit storici senza eliminare evidenza utile.

