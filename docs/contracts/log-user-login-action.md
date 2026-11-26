---
title: "Contratto — LogUserLoginAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\LogUserLoginAction"
qmd: "contract LogUserLoginAction activity evento login utente causer subject ACT-LOGIN"
---

# LogUserLoginAction

Registra il login di un utente. Il soggetto e il causer sono l'utente stesso.

## Input

- Costruttore: `?UserContract $user`. `execute(?UserContract $user = null)`: se passato, prevale sul costruttore.

## Output

- `Activity` con `event = 'login'`, `description = 'User logged in'`, `subject` e `causer` = l'utente.

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACT-LOGIN-INV-1 | Se l'utente risolto non è un `Model` lancia `InvalidArgumentException('User must implement UserContract and extend Model')`. | — (non dimostrato) |
| ACT-LOGIN-INV-2 | Il tipo è `login`; `subject_type` è la classe dell'utente. | — (non dimostrato) |

## Effetti collaterali

- Un `INSERT` in `activity_log` tramite `LogActivityAction`.

## Errori

- `InvalidArgumentException` (INV-1).

## Non fa

- Non verifica le credenziali né decide se l'accesso è avvenuto: registra soltanto.
- Il listener che la chiama non è in questo contract.

