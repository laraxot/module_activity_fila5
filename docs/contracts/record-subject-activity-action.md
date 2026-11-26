---
title: "Contratto — RecordSubjectActivityAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\RecordSubjectActivityAction"
qmd: "contract RecordSubjectActivityAction activity registrazione evento soggetto classe id senza istanza modello ACT-RECSUBJ"
---

# RecordSubjectActivityAction

Registra un evento su un soggetto identificato da classe e id, senza bisogno di un'istanza del modello.

## Input

- `class-string $subjectType`, `int|string $subjectId`, `string $event`, `?array $properties = null`, `?string $description = null`.

## Output

- `Activity` creata.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACT-RECSUBJ-INV-1 | Crea una riga con `subject_type`, `subject_id`, `event`, `properties`, `log_name = 'default'`; la descrizione di default è `<Basename> <event>`. | — (non dimostrato) |
| ACT-RECSUBJ-INV-2 | Non valorizza `causer_type` né `causer_id`, anche se c'è un utente autenticato. | — (non dimostrato) |

## Effetti collaterali

- Un `INSERT` in `activity_log` tramite `Activity::typedQuery()->create()`.

## Errori

- Nessuno dichiarato; errori di database si propagano.

## Non fa

- Non verifica che `$subjectType` sia una classe esistente né che `$subjectId` appartenga a un modello.
- Non redige `properties`.

