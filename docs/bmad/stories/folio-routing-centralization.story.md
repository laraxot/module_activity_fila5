---
title: "Centralizzare il routing Folio dei moduli: Activity non monta Folio"
status: done
module: Activity
epic: architecture
qmd: "BMAD Folio routing Activity provider CMS FolioVoltServiceProvider confine modulo no mount Cms assente"
related:
  - ../../../../../../docs/wiki/memories/filament5-layout-contract-shared-modules.md
  - ../../../../User/docs/wiki/concepts/folio-pages-owner-pattern.md
---

# Story: centralizzare il routing Folio dei moduli

## Scopo

Activity possiede il comportamento dell'audit log e le proprie pagine, ma non
è il router Folio globale. Un mount registrato dal provider Activity crea
accoppiamento, duplica configurazione e può precedere le fallback Filament.

## Decisione

- Nei progetti con `Cms`, il mount Folio è responsabilità di
  `Modules\\Cms\\Providers\\FolioVoltServiceProvider`: monta tema, pagine dei
  moduli abilitati e `pages/api` con prefisso `/api`.
- Nei progetti senza `Cms`, non si introduce il modulo solo per il routing e
  `App\\Providers\\FolioServiceProvider` non è un suo sostituto.
- In entrambi i casi `ActivityServiceProvider` gestisce configurazione e
  comportamento Activity, non chiama `Folio::path()` e non importa
  `Laravel\\Folio\\Folio`.

## Verifica

- `Folio::path()` assente da `ActivityServiceProvider`;
- `App\\Providers\\FolioServiceProvider` non registrato come surrogato;
- con `Cms`, `php artisan folio:list --path=api/log-download` espone
  `GET /api/log-download`;
- `ActivityServiceProviderNoFolioMountTest` verde;
- la feature `LogDownloadPageTest` resta da eseguire in un ambiente stabile.

## Acceptance criteria

- [x] Activity non registra mount Folio.
- [x] Con `Cms`, il solo owner è `Cms\\FolioVoltServiceProvider`.
- [x] Senza `Cms`, non vengono introdotti provider o moduli sostitutivi.
- [x] Il provider applicativo non monta le pagine dei moduli come surrogato.
- [x] La guardia `ActivityServiceProviderNoFolioMountTest` è presente.
- [ ] La feature `LogDownloadPageTest` è verde in ambiente stabile.
