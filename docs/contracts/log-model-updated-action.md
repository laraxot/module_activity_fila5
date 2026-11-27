---
<<<<<<< .merge_file_EBIAhl
title: "Contratto — LogModelUpdatedAction"
type: contract
action: "Modules\Activity\Actions\LogModelUpdatedAction"
tags: [contract, action, activity, gdpr]
created: 2026-11-24
updated: 2026-11-24
qmd: "contratto log model updated action activity redact password token gdpr"
=======
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
>>>>>>> .merge_file_YTDkcV
---

# LogModelUpdatedAction

<<<<<<< .merge_file_EBIAhl
Registra nel log attività la modifica di un modello. Le sorelle `LogModelCreatedAction` e `LogModelDeletedAction` seguono
la stessa regola sui segreti (stesso test, stesso group). Regola: `Modules/Xot/docs/rules/action-behavioral-contract.md`.

## Input

- `Model $model` (costruttore o `execute()`); senza modello: `InvalidArgumentException`.
- `?Model $user` (costruttore): il causer, facoltativo.

## Output

- L'`Activity` creata, evento `updated`, `properties` = `old`, `new`, `changes` del modello.
=======
Registra l'evento `updated` di un modello Eloquent con valori precedenti, nuovi e modificati. Le sorelle `LogModelCreatedAction` e `LogModelDeletedAction` seguono la stessa regola sui segreti.

## Input

- Costruttore: `?Model $model`, `?Model $user`. `execute(?Model $model = null)`: se passato, prevale sul costruttore.

## Output

- `Activity` con `event = 'updated'`, `description = '<ClasseBase> updated'`, `properties = ['old' => ..., 'new' => ..., 'changes' => ...]` (da `getOriginal()`, `getAttributes()`, `getChanges()`).
>>>>>>> .merge_file_YTDkcV

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< .merge_file_EBIAhl
| ACTIVITY-MODEL-LOG-INV-1 | `properties` non contiene mai `password`, `remember_token`, `two_factor_secret`, `two_factor_recovery_codes` (passano da `RedactModelAttributesAction`); vale anche per created e deleted. | `ACTIVITY-MODEL-LOG-INV-1` |

## Effetti collaterali

- Una riga nella tabella delle attività (via `LogActivityAction`, connessione `activity`).

## Errori

- `InvalidArgumentException` se manca il modello.

## Non fa

- Non decide *quali* modelli loggare: lo fa chi la chiama (observer/listener).
- Non toglie altri dati personali oltre ai segreti elencati (email, nome restano): se un modello ne ha di più sensibili,
  si estende `RedactModelAttributesAction`, non si filtra qui.
=======
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
>>>>>>> .merge_file_YTDkcV
