---
title: "Contratto: LogModelUpdatedAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\LogModelUpdatedAction"
qmd: "contract LogModelUpdatedAction activity evento updated modello old new changes redazione segreti"
related:
  - ../../app/Actions/LogModelUpdatedAction.php
  - ../../tests/Unit/Actions/LogModelUpdatedActionTest.php
  - ../../tests/Unit/Actions/LogModelActionsRedactSecretsTest.php
---

# LogModelUpdatedAction

Registra l'evento `updated` di un modello Eloquent con valori precedenti, nuovi e modificati. Le sorelle `LogModelCreatedAction` e `LogModelDeletedAction` seguono la stessa regola sui segreti.

## Input

- Costruttore: `?Model $model`, `?Model $user`. `execute(?Model $model = null)`: se passato, prevale sul costruttore.

## Output

- `Activity` con `event = 'updated'`, `description = '<ClasseBase> updated'`, `properties = ['old' => ..., 'new' => ..., 'changes' => ...]` (da `getOriginal()`, `getAttributes()`, `getChanges()`).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACTIVITY-MODEL-LOG-INV-1 | `old`, `new` e `changes` passano da `RedactModelAttributesAction`: mai `password`, `remember_token`, `two_factor_secret`, `two_factor_recovery_codes`. Vale anche per created e deleted. | ACTIVITY-MODEL-LOG-INV-1 |
| ACTIVITY-MODEL-LOG-INV-2 | Senza modello lancia `InvalidArgumentException('A model is required')`. Limite noto: `LogModelUpdatedActionTest.php` non asserisce questa eccezione. | — (non dimostrato) |
| ACTIVITY-MODEL-LOG-INV-3 | `changes` e' quello che il modello espone al momento della chiamata: l'Action e' valida se chiamata dopo il `save()`. | — (non dimostrato) |

## Effetti collaterali

- Un `INSERT` in `activity_log` tramite `LogActivityAction`. Il modello non viene modificato.

## Errori

- `InvalidArgumentException` (INV-1).

## Non fa

- Non decide quando viene chiamata ne' quali modelli loggare: lo fa chi la invoca (observer, listener).
- Non toglie altri dati personali oltre ai segreti elencati (email e nome restano); per aggiungerne si estende `RedactModelAttributesAction`.

## Riconciliazione documentale (2026-11-27)

Questo file aveva un conflitto Git irrisolto. La base è la variante più recente del contratto, con il riferimento a `app/Actions/LogModelUpdatedAction.php` **esistente su `dev`**; la sua semantica, i group Pest citati e gli eventuali effetti non sono stati rieseguiti in questa sessione. Il confronto con il codice e i test resta il gate ECC della story owner. [Tracciamento root #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
