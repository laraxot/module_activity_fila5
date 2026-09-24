# Bad Practices – Activity

## Log delle attività senza livello di severità
Crea noise utile solo se si usa un filtro `level`.

## Mancanza di indicizzazione per query frequenti
Aggiungi indici su `causer_id`, `subject_id`, `log_name`, `created_at` (colonne reali della
tabella `activity_log`, vedi [architecture.md](./architecture.md)).

## Dati duplicati nei campi `properties`/`attribute_changes` JSON
Normalizza campi ricorrenti in tabelle distinte quando servono query efficienti, invece di
filtrare lato applicazione su JSON.

## `*Service` o `app/Services` per la business logic
Questo modulo non ha classi `*Service` (verificato: nessun file `*Service.php` sotto
`app/`, a parte i `ServiceProvider`). La business logic nuova va in Spatie Queueable
Actions (`app/Actions/**`, `use QueueableAction`, metodo `execute()`), non in un layer
Service o Repository — vedi `bashscripts/ai/wiki/rules/no-services-rule.md` a livello di
repo.
