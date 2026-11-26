---
title: "Indice degli ADR — Activity"
type: index
module: Activity
status: active
updated: 2026-11-26
---

# Indice degli ADR — Activity

| ADR | Stato | Perché | Conferma |
|---|---|---|---|
| [0001-activity-audit-is-append-oriented](0001-activity-audit-is-append-oriented.md) | accepted | L'audit non si riscrive: le viste interpretano la cronologia, la retention per età è l'unica cancellazione. | Parziale: test di registrazione; che le righe non siano riscritte solo da review |
| [0002-activity-models-on-dedicated-connection](0002-activity-models-on-dedicated-connection.md) | accepted | I modelli di Activity usano la connessione `activity`, mai quella di default. | Sì: `BaseModelTest.php`, `RedactModelAttributesActionTest.php` |
| [0003-log-viewer-single-path-resolver](0003-log-viewer-single-path-resolver.md) | accepted | Visualizzatore dei log: un solo risolutore di percorsi, una regola di accesso, download a blocchi. | Sì: `--group=ACTIVITY-LOGFILE-INV-1` … `-5`, `ACTIVITY-LOGACCESS-INV-1` … `-3`, `ACTIVITY-LOGDOWNLOAD-INV-1`, `-2` |

Formato e regole: [README](README.md).
