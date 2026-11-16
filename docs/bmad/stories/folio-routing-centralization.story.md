---
title: "Centralizzare il routing Folio dei moduli"
status: review
module: Activity
epic: architecture
qmd: "BMAD Folio routing Activity provider CMS FolioVoltServiceProvider confine modulo"
---

# Story: centralizzare il routing Folio dei moduli

## Problema

`ActivityServiceProvider` registrava direttamente una directory Folio. Questo
faceva dipendere il router globale dal provider di un singolo modulo e rendeva
necessario replicare lo stesso blocco in ogni modulo con pagine `resources/views/pages`.

## Decisione

In questo checkout il modulo `Cms` non è presente e non va introdotto. Di
conseguenza `ActivityServiceProvider` non deve montare Folio e
`App\Providers\FolioServiceProvider` non va usato come sostituto: il provider
applicativo monta soltanto `resources/views/pages`, non le pagine dei moduli.

Nei progetti che includono il modulo comune CMS, il solo owner delle pagine
Folio dei moduli e dei temi è `Cms/app/Providers/FolioVoltServiceProvider`.
Activity resta proprietario della configurazione e del comportamento Activity,
non dell'infrastruttura di routing.

## Verifica

- `php -l` sui provider: verde;
- `Cms` assente dall'inventario dei moduli;
- `bootstrap/providers.php` non registra `App\Providers\FolioServiceProvider`;
- `Folio::path()` assente da `ActivityServiceProvider`;
- `phpstan analyse Modules`: gate da rieseguire dopo il rilascio del lock;
- Pest feature `LogDownloadPageTest`: da eseguire solo in ambiente di test raggiungibile.

## Acceptance criteria

- [ ] Nessuna registrazione `Folio::path()` nel provider Activity (file ancora sotto lock concorrente).
- [x] Nessun provider Folio applicativo aggiunto o registrato.
- [x] Il routing Folio resta responsabilità del CMS nei progetti che lo includono.
- [ ] Pest feature verde in ambiente di test stabile.
