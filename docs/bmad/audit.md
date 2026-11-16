---
title: "Audit BMAD — Activity"
type: audit
status: review
updated: 2026-11-16
module: Activity
qmd: "audit BMAD Activity source-first qualità"
---

# Audit BMAD — Activity

SSoT dettagliata: [audits/activity-audit.md](./audits/activity-audit.md)

## Sintesi (2026-11-16)

| Metrica | Valore |
|---|---:|
| PHP `app/` | 92 |
| Test | 152 |
| Resources | 3 |
| Actions | 30 |
| Services | 0 |
| Policy `return true` | 2 |
| Marker | 0 |

## Lo scopo in una frase **Activity risponde alla domanda "chi ha cambiato cosa, quando e com'era prima" — che in una pubblica amministrazione non e' curiosita', e' un obbligo.**

## Gate

- PHPStan modulo / `Modules`: 0 errori (verifica 2026-11-16).
- Pest: da eseguire in ambiente testing non produttivo.
- Security/runtime: story figlie su finding P0/P1 dell'audit dettagliato.
