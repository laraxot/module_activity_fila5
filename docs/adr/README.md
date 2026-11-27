---
title: "ADR del modulo Activity"
type: index
<<<<<<< .merge_file_5nTfCv
tags: [adr, decisioni, activity]
created: 2026-11-18
updated: 2026-11-24
=======
module: Activity
status: active
created: 2026-11-18
updated: 2026-11-26
qmd: "Activity adr architecture decision records madr formato"
tags: [adr, decisioni, activity]
>>>>>>> .merge_file_66Gf5a
---

# ADR del modulo Activity

<<<<<<< .merge_file_5nTfCv
Il **perché** di due forme di Activity che sembrano eccessive: i modelli su una connessione dedicata (`activity`) invece
della default, e il visualizzatore dei log che fa passare ogni percorso scelto dall'utente da un solo risolutore.

Leggili prima di: cambiare `$connection` di un modello del modulo o la configurazione `activitylog`, aggiungere un modo di
leggere o scaricare file da `storage/logs`, o toccare i permessi del visualizzatore.

Formato (cinque sezioni, `type: decision`, nome file senza date né numeri) e regole:
[action-behavioral-contract](../../../Xot/docs/rules/action-behavioral-contract.md).

## Indice

- [I modelli di Activity usano la connessione 'activity'](activity-models-on-dedicated-connection.md) — log separabile in un altro database e rollback dei test coerente; debito: Spatie scrive sulla default.
- [Visualizzatore dei log: un solo risolutore di percorsi](log-viewer-single-path-resolver.md) — `realpath` e solo `.log` dentro `storage/logs`, una regola di accesso, download a blocchi.
=======
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
>>>>>>> .merge_file_66Gf5a
