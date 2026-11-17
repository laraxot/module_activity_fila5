---
title: "Activity non monta Folio (PTVX senza Cms)"
status: done
module: Activity
epic: architecture
qmd: "BMAD Folio Activity no mount Cms assente PTVX confine modulo"
related:
  - ../../../../../../docs/wiki/memories/filament5-layout-contract-shared-modules.md
  - ../../../../User/docs/wiki/concepts/folio-pages-owner-pattern.md
---

# Activity non monta Folio

## Perché `Folio::path` in ActivityServiceProvider è sbagliato

Anche senza Cms in PTVX, un modulo di dominio **non** è il router Folio.

| Ruolo | Owner |
|-------|--------|
| File `resources/views/pages/**` | modulo dominio (Activity) |
| `Folio::path` nei progetti FO con Cms | `Cms/FolioVoltServiceProvider` |
| `Folio::path` in PTVX | **non** Activity; App Folio non è un sostituto di Cms per le pagine moduli |

Motivi:

1. Confine ECC — Activity = activitylog/LogViewer; routing FO cross-cutting.
2. DRY — altrimenti ogni modulo copia un mount incompleto.
3. Race fallback Folio vs Filament (PTVX è panel-heavy).
4. Portfolio — Activity è modulo *condiviso*: non deve assumere Cms né inventare un mini-FolioVolt.

In PTVX Cms non c’è e non deve stare: si **impara** il pattern dai sibling FO, non si importa il modulo.

## Decisione PTVX

- [x] Nessun `Folio::path` / `use Laravel\Folio\Folio` in `ActivityServiceProvider`.
- [x] Nessun `Modules/Cms` introdotto.
- [x] `App\Providers\FolioServiceProvider` non registrato e **non scomodato**: nei sibling FO basta FolioVolt; qui non è un surrogato.
- [x] Pest `ActivityServiceProviderNoFolioMountTest`.
