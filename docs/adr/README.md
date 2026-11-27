---
title: "ADR del modulo Activity"
type: index
module: Activity
status: active
created: 2026-11-18
updated: 2026-11-26
qmd: "Activity adr architecture decision records madr formato"
tags: [adr, decisioni, activity]
---

# ADR del modulo Activity

Un ADR registra una scelta difficile da invertire, sorprendente o frutto di un trade-off reale, e il suo perche'.
Non e' un diario ne' una spiegazione retroattiva: se la decisione non e' dimostrabile dal codice o da una story/doc del repo, non si scrive.
Il nome del file e' `NNNN-argomento.md` (kebab-case, prefisso numerico come negli ADR di Xot), senza date: la data sta nella frontmatter. Eccezioni al prefisso: `README.md`, `index.md`, `0000-template.md`.

Il **perche'** delle forme di Activity che sembrano eccessive: i modelli su una connessione dedicata (`activity`) invece
della default, il visualizzatore dei log che fa passare ogni percorso scelto dall'utente da un solo risolutore, e la
cronologia di audit che non si riscrive. Una decisione per file, con le alternative scartate.

Leggili prima di: cambiare `$connection` di un modello del modulo o la configurazione `activitylog`, aggiungere un modo di
leggere o scaricare file da `storage/logs`, toccare i permessi del visualizzatore, o modificare righe di `activity_log` gia' scritte.

## Metodo

Scrivere un ADR solo per una scelta difficile da invertire, sorprendente o fondata su un trade-off reale. Le decisioni si
verificano contro codice e test correnti. Chi cambia una decisione scrive un nuovo ADR e segna il precedente `superseded`
o `deprecated` (`superseded by <file>`). Regole: [behavioral-contract-governance](../../../Xot/docs/adr/0012-behavioral-contract-governance.md)
e [ADR di Xot](../../../Xot/docs/adr/README.md).

## Formato (MADR breve)

Frontmatter: `title`, `type: decision`, `status` (`proposed` | `accepted` | `superseded` | `deprecated`), `module`, `created`, `updated`, `qmd`; opzionali `tags`, `related`, `issues`, `decision-makers`.

```markdown
---
title: "ADR — <decisione in una riga>"
type: decision
status: proposed | accepted | superseded | deprecated
module: Activity
created: AAAA-MM-GG
updated: AAAA-MM-GG
decision-makers: [team back office]
issues: []
---

# ADR: <decisione>

## Contesto
Fatti e vincoli che hanno reso necessaria la scelta (misure, norme, policy, incidenti).

## Driver della decisione
Le forze che pesano sulla scelta, in elenco; ogni voce verificabile nel codice o in un documento del repo.

## Alternative scartate
Ogni alternativa seria, con il motivo per cui non è stata scelta.

## Decisione
Cosa si fa, in concreto, e dove sta nel codice.

## Conseguenze
Pro, contro, debito che resta, cosa misurare. Chi cambia la decisione scrive un nuovo ADR e segna questo `superseded`.

## Conferma
Test (percorso e, se c'è, `--group`), comando eseguibile da `laravel/` o regola di review che falliscono se la decisione viene violata. Se non esiste una conferma automatica: «Nessuna conferma automatica oggi; proposta: …». Se il codice contraddice la decisione, prima di Conferma c'è `## Stato attuale`.
```

Ogni ADR ha i sei titoli sopra, in quest'ordine.

Template condiviso: `laravel/Modules/Xot/docs/adr/0000-template.md` (copia locale: [0000-template.md](0000-template.md)). Guard: `Modules/Xot/tests/Unit/Docs/PackagesHaveContractsAndAdrTest.php`.

## Decisioni

| ADR | Stato | Perché | Conferma |
|---|---|---|---|
| [0001-activity-audit-is-append-oriented](0001-activity-audit-is-append-oriented.md) | accepted | L'audit non si riscrive: le viste interpretano la cronologia, la retention per età è l'unica cancellazione. | Parziale: test di registrazione; che le righe non siano riscritte solo da review |
| [0002-activity-models-on-dedicated-connection](0002-activity-models-on-dedicated-connection.md) | accepted | I modelli di Activity usano la connessione `activity`, mai quella di default. | Sì: `BaseModelTest.php`, `RedactModelAttributesActionTest.php` |
| [0003-log-viewer-single-path-resolver](0003-log-viewer-single-path-resolver.md) | accepted | Visualizzatore dei log: un solo risolutore di percorsi, una regola di accesso, download a blocchi. | Sì: `--group=ACTIVITY-LOGFILE-INV-1` … `-5`, `ACTIVITY-LOGACCESS-INV-1` … `-3`, `ACTIVITY-LOGDOWNLOAD-INV-1`, `-2` |

Elenco con stato: [index.md](index.md).

## Stato di copertura

ADR: 3. Con conferma automatica (test o comando eseguibile da `laravel/`): 2. ADR 0002 ha una sezione «Stato attuale» con due scarti tra decisione e codice/test; ADR 0001 dichiara in Conferma che `ActivityPolicy` non è coperta oltre `view`.

## Backlog

- Riconciliare `tests/Unit/Bootstrap/PestExtendBootstrapTest.php` (riga 23) con `RedactModelAttributesActionTest.php` (riga 39) sulla connessione di `Snapshot` e `StoredEvent` in testing (ADR 0002, «Stato attuale»).
- Test che scandisce `Modules/Activity/app` per `update/upsert/save` su `activity_log` con allowlist delle eccezioni note (ADR 0001, Conferma).
- Le copie senza numero (`activity-audit-is-append-oriented.md`, `activity-models-on-dedicated-connection.md`, `log-viewer-single-path-resolver.md`) risultano cancellate nell'albero di lavoro (`git status` del 2026-11-26) e non sono più in `docs/adr`; il numerato è l'unico ADR.
- `0000-template.md` è il modello, non una decisione.

## Harness minimo: ownership, evidenza e recupero (2026-11-27)

Questo indice appartiene a **module_activity_fila5**: ogni decisione su codice, dominio o tema va nell'ADR del package owner; il root registra soltanto i vincoli di composizione. Un ADR richiede una scelta reale con alternative e conseguenze, più una **Conferma** ripetibile (oppure la dichiarazione esplicita che manca). Non creare ADR fittizi per riempire un indice.

- [Confine LaravelDay/harness Xot](https://github.com/laraxot/module_xot_fila5/blob/dev/docs/adr/0042-laravel-day-harness-adoption-boundary.md); [ownership root](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/adr/0001-harness-minimo-e-ownership.md).
- **BMAD**: la story owner-local conserva `scope`, `must_not_change`, `evidence`, `approval_required` nei cambi rischiosi.
- **ECC**: nessun marker di merge; distinguere la prova eseguita dal semplice riferimento a un test; se la conferma non è disponibile segnare `non eseguita`.
- **Second Brain**: QMD/Graphify e `.harness/memory/{facts,lessons}.md` sono puntatori a evidenza datata, non copie degli ADR. [Runbook](https://github.com/laraxot/base_ptvx_fila5/blob/dev/docs/harness/README.md) · [Rollout #15](https://github.com/laraxot/base_ptvx_fila5/issues/15).
