---
<<<<<<< .merge_file_NelGVd
title: "Contratto — LogActivityAction"
type: contract
action: "Modules\Activity\Actions\LogActivityAction"
tags: [contract, action, activity-log, audit]
created: 2026-11-24
updated: 2026-11-24
related:
  - ../adr/activity-models-on-dedicated-connection.md
=======
title: "Contratto: LogActivityAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\LogActivityAction"
qmd: "contract LogActivityAction activity activity_log causer subject properties type description"
related:
  - ../adr/0002-activity-models-on-dedicated-connection.md
>>>>>>> .merge_file_THHMsv
  - ../../app/Actions/LogActivityAction.php
  - ../../tests/Unit/Actions/LogActivityActionConstructorTest.php
  - ../../tests/Unit/Actions/LogActivityActionExecuteValidationTest.php
---

# LogActivityAction

<<<<<<< .merge_file_NelGVd
Scrive una riga di `activity_log` (modello `Modules\Activity\Models\Activity`, connessione `activity`). È il mattone
delle Action `LogModelCreated/Updated/Deleted` e `LogUserLogin/Logout` e dell'adapter `Adapters/ActivityLogger`.
Sorgente: `app/Actions/LogActivityAction.php`. Si costruisce con `new` (parametri nel costruttore), non con `app()`.

Test: `cd laravel && vendor/bin/pest Modules/Activity/tests/Unit/Actions/LogActivityActionConstructorTest.php Modules/Activity/tests/Unit/Actions/LogActivityActionExecuteValidationTest.php`.

## Input

| Parametro (costruttore) | Tipo | Note |
|---|---|---|
| `$type` | `string` | non vuoto; diventa `log_name` ed `event` |
| `$user` | `?Model` | il causante; deve implementare `UserContract` |
| `$subject` | `?Model` | il record su cui si agisce |
| `$properties` | `?array` | dati liberi (per gli update: `old`, `new`, `changes`) |
| `$description` | `?string` | default `Activity: <type>` |

## Output

- Il modello `Activity` creato.
=======
Scrive una riga in `activity_log` (modello `Modules\Activity\Models\Activity`, connessione `activity`). E' il mattone di `LogModel*Action`, `LogUser*Action` e dell'adapter `ActivityLogger`. Si costruisce con `new`, non con `app()`.

## Input

- Costruttore: `string $type` (non vuoto), `?Model $user` (il causer, deve essere `UserContract`), `?Model $subject`, `?array $properties`, `?string $description`.
- `execute()`: nessun argomento.

## Output

- L'`Activity` creata.
>>>>>>> .merge_file_THHMsv

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
<<<<<<< .merge_file_NelGVd
| ACTIVITY-LOG-INV-1 | `$type` vuoto è rifiutato già nel costruttore. | `ACTIVITY-LOG-INV-1` |
| ACTIVITY-LOG-INV-2 | Un causante che non implementa `UserContract` è rifiutato prima di scrivere. | `ACTIVITY-LOG-INV-2` |
| ACTIVITY-LOG-INV-3 | Senza `$user`, il causante è `Auth::id()` (se int o string), altrimenti nessuno. | — |
| ACTIVITY-LOG-INV-4 | Una sola riga creata, con `log_name = event = $type`. | — |

## Effetti collaterali

- `INSERT` in `activity_log` sulla connessione `activity`.

## Errori

- `InvalidArgumentException('Type cannot be empty')`, `InvalidArgumentException('User must implement UserContract')`.
- Errori del DB (tabella mancante, colonna `attribute_changes` assente con Spatie v4+) escono: chi scrive in un
  contesto che non deve fallire (registrazione utente) verifica prima con `IsActivityLogSchemaWritableAction`.

## Non fa

- Non toglie dati sensibili dalle `properties`: `LogModelUpdatedAction` passa `getOriginal()` e `getAttributes()`
  interi (password e token compresi). `RedactModelAttributesAction` esiste ma oggi non la chiama nessuno: debito.
- Non controlla `activitylog.enabled`.
- Non accoda: scrive in modo sincrono nella richiesta corrente.
=======
| ACTIVITY-LOG-INV-1 | `$type` vuoto lancia `InvalidArgumentException('Type cannot be empty')` nel costruttore. | ACTIVITY-LOG-INV-1 |
| ACTIVITY-LOG-INV-2 | Un `$user` non nullo che non e' `UserContract` lancia `InvalidArgumentException('User must implement UserContract')` in `execute()`. | ACTIVITY-LOG-INV-2 |
| ACTIVITY-LOG-INV-3 | `causer_id` e' l'id dell'utente passato; senza utente e' `Auth::id()` solo se int o stringa. `causer_type` e' la classe dell'utente passato, altrimenti `null`. | — (non dimostrato) |
| ACTIVITY-LOG-INV-4 | `description` di default `Activity: <type>`; `log_name` e `event` valgono il tipo. | — (non dimostrato) |

## Effetti collaterali

- `INSERT` in `activity_log` tramite `Activity::typedQuery()->create()`. Nessuna transazione esplicita, nessun evento dispatchato dall'Action.

## Errori

- `InvalidArgumentException` (INV-1, INV-2). Gli errori di database si propagano.

## Non fa

- Non redige le `properties` (lo fanno le Action `LogModel*`).
- Non verifica che la classe del subject esista.
- Incoerenze note: `causer_id` puo' valorizzarsi da `Auth::id()` con `causer_type = null` (INV-3), e l'attivita' non compare in `GetUserActivitiesAction`; `log_name` vale il tipo qui mentre `Actions\ActivityLogger::log()` e `RecordSubjectActivityAction` usano `default`.
>>>>>>> .merge_file_THHMsv
