---
title: "Contratti del modulo Activity"
type: index
tags: [contracts, actions, activity, audit, log-viewer]
created: 2026-11-18
updated: 2026-11-24
---

# Contratti del modulo Activity

Cosa promettono le Action di Activity che scrivono il log delle attività, riscrivono un record dal suo storico, o
aprono file di `storage/logs` scelti dall'utente (sicurezza dei percorsi e degli accessi). Le Action di sola query
(`Actions/Query`) e di parsing dei log non hanno effetti collaterali e restano fuori.

Leggili prima di chiamare, modificare o imitare una di queste Action. Le invarianti con group si verificano con
`cd laravel && vendor/bin/pest Modules/Activity/tests --group=<ID>`; `—` è debito dichiarato.

Formato (sei sezioni, tabella invarianti con ID, `@contract` nel docblock):
[action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md).

## Indice

- [LogActivityAction](log-activity-action.md) — una riga di `activity_log` sulla connessione `activity`; non toglie dati sensibili dalle properties.
- [RestoreActivityAction](restore-activity-action.md) — riporta un record ai valori `old` di un'attività con un solo `update()`.
- [AuthorizeLogAccessAction](authorize-log-access-action.md) — log visibili solo a `super-admin` o a chi ha `log.viewAny`; permesso mancante = negato senza errore.
- [ResolveLogFilePathAction](resolve-log-file-path-action.md) — unico passaggio da input dell'utente a percorso: solo `.log`, dentro `storage/logs`, link simbolici risolti.
- [DownloadLogFileAction](download-log-file-action.md) — download del file intero come `BinaryFileResponse`, passando dal risolutore.
- [LogModelUpdatedAction](log-model-updated-action.md) — log di modifica (e, per la stessa regola, di creazione e cancellazione) senza password, token né segreti 2FA.
