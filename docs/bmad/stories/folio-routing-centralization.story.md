---
title: "Centralizzare il routing Folio dei moduli"
status: review
module: Activity
epic: architecture
qmd: "BMAD Folio routing moduli provider globale Activity log-download middleware web"
---

# Story: centralizzare il routing Folio dei moduli

## Problema

`ActivityServiceProvider` registrava direttamente una directory Folio. Questo
faceva dipendere il router globale dal provider di un singolo modulo e rendeva
necessario replicare lo stesso blocco in ogni modulo con pagine `resources/views/pages`.

## Decisione

`App\Providers\FolioServiceProvider` è l'unico owner del montaggio Folio:

- mantiene il path applicativo solo quando la directory esiste;
- monta le directory `resources/views/pages` di tutti i moduli abilitati;
- applica `web` alle pagine dei moduli;
- il provider è esplicitamente registrato in `bootstrap/providers.php`.

Il provider `ActivityServiceProvider` resta proprietario della configurazione e
del comportamento Activity, non dell'infrastruttura di routing globale.

## Verifica

- `php -l` sui provider: verde;
- `php artisan folio:list --path=api/log-download --no-ansi`: rotta GET presente;
- `phpstan analyse Modules`: da rieseguire nel gate della tranche;
- Pest feature `LogDownloadPageTest`: da eseguire in ambiente di test raggiungibile.

## Acceptance criteria

- [x] Nessuna registrazione `Folio::path()` nel provider Activity.
- [x] Provider Folio globale registrato dall'applicazione.
- [x] Pagina Activity visibile nell'inventario Folio.
- [ ] Pest feature verde in ambiente di test stabile.
