# Best Practices – Activity

## Actions, non Services
Non esiste (e non va introdotto) un `ActivityService`: la logica di orchestrazione vive
nelle Spatie Queueable Actions sotto `app/Actions/` (`LogActivityAction`,
`LogModelCreatedAction`, ecc.), ciascuna con un solo metodo `execute()`. Vedi
`bashscripts/ai/wiki/rules/no-services-rule.md` a livello di repo.

## Costruzione esplicita, non array generici
`LogActivityAction` prende i dati via constructor promotion tipizzato (`type`, `user`,
`subject`, `properties`, `description`), non un array libero — vedi [api.md](./api.md).

## Test
Implementa test di integrazione (Pest, `tests/Feature/`) per i flussi di logging più
delicati (login/logout, creazione/aggiornamento/cancellazione modello) e copri i casi
limite (tipo vuoto → `InvalidArgumentException`, subject/user nulli).

## Documentazione
Aggiorna [index.md](./index.md) quando aggiungi nuovi modelli, Action o Resource — è
l'indice mantenuto attivamente, non `INDEX.md` (bridge verso `index.md`).
