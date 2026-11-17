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

Owner del montaggio Folio in questo progetto:
`Modules\Cms\Providers\FolioVoltServiceProvider`.

- monta tema + `resources/views/pages` di ogni modulo abilitato (`uri($locale)`);
- monta `pages/api` con `uri('/api')` + middleware `web`
  → `log-download.blade.php` = GET `/api/log-download`;
- mount in `booted()` (non prima delle fallback Filament).

`ActivityServiceProvider` = config/comportamento Activity, **non** router.
Niente `Folio::path()` lì (rimozione applicata; istruzione utente: aggiungere Folio nel provider «è sbagliato»).

## Verifica

- `php -l` sui provider: verde;
- `Cms` assente dall'inventario dei moduli;
- `bootstrap/providers.php` non registra `App\Providers\FolioServiceProvider`;
- `Folio::path()` assente da `ActivityServiceProvider`;
- `phpstan analyse Modules`: gate da rieseguire dopo il rilascio del lock;
- Pest feature `LogDownloadPageTest`: da eseguire solo in ambiente di test raggiungibile.

## Acceptance criteria

- [x] Nessuna registrazione `Folio::path()` nel provider Activity.
- [x] Owner unico: `Cms\FolioVoltServiceProvider` (nessun `App\Providers\FolioServiceProvider`).
- [x] Pagina Activity visibile nell'inventario Folio.
- [ ] Pest feature verde in ambiente di test stabile.
