---
title: "Activity: ingresso del modulo"
type: documentation
status: active
module: Activity
tags: [activity, audit, event-sourcing, docs]
created: 2026-10-15
updated: 2026-10-15
qmd: "activity modulo audit log event sourcing snapshot stored event tracciabilita tests phpstan bmad"
---

# Activity

Ingresso della documentazione del modulo. Scopo canonico: [purpose.md](./purpose.md) e [scopo.md](./scopo.md).

## Perche' esiste

Risponde a **chi ha cambiato cosa, quando e com'era prima** (obbligo di tracciabilita'). Due meccanismi distinti:

| Modello | Meccanismo | Domanda |
|---|---|---|
| `Activity` | activity log (Spatie) | chi ha toccato questo record |
| `StoredEvent`, `Snapshot` | event sourcing (Spatie) | come si e' arrivati a questo stato |

Non fonderli: il log si puo' potare; gli eventi no.

## Identita'

- Namespace `Modules\Activity`, alias `activity`, pacchetto `laraxot/module_activity_fila5`
- Provider: `ActivityServiceProvider`, `Providers\Filament\AdminPanelProvider`
- Descrizione `module.json`: tracciamento attivita' utenti e log delle azioni

## Cosa contiene (verificato sul codice)

| Area | Contenuto | Percorso |
|---|---|---|
| Modelli | `Activity`, `StoredEvent`, `Snapshot` (+ `BaseModel`, `TestModel`) | `app/Models/` |
| Actions | log, query, schema | `app/Actions/` |
| Filament | `ActivityResource`, `StoredEventResource`, `SnapshotResource` | `app/Filament/Resources/` |
| Test | Pest in minuscolo | `tests/` |

## Mappa docs

- Indice operativo: [00-index.md](./00-index.md) / [index.md](./index.md)
- Scopo: [purpose.md](./purpose.md)
- Testing: [testing-rules.md](./testing-rules.md) · [testing.md](./testing.md)
- Naming file: [file-naming-rules.md](./file-naming-rules.md)

## Standing order (qualita' + docs)

- **PHPStan a zero** sul codice del modulo: non ignorare errori, non abbassare il livello, non modificare `phpstan.neon` del progetto. Qualita' + docs + BMAD sono standing order, non opzionali.
- **Cartella test**: solo `tests/` (minuscolo). `Tests/` e' vietato (case-collision su macOS/Windows e confusione PSR-4).
- **Nomi `.md`**: kebab-case minuscolo, niente date/timestamp nel nome, unica eccezione `README.md`. Se esistono `readme.md` e `README.md`, resta solo `README.md`.
- **Docs**: solo dentro `docs/` gia' esistente; consolida invece di moltiplicare file; link relativi; focus su scopo/perche'/business logic (DRY + KISS).
- **Git**: forward-only (patch in avanti); no reset/revert/checkout come scorciatoia.
- **BMAD + second brain**: indici e decisioni vivono in `docs/` del modulo; aggiornali quando cambia il perche', non solo il come.

Vedi anche: [00-index.md](./00-index.md) · [index.md](./index.md)
