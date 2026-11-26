---
title: "Contratto — BuildLogViewerStateAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\Log\\BuildLogViewerStateAction"
qmd: "contract BuildLogViewerStateAction activity log viewer stato pagina finestra lettura livello ricerca errore generico ACT-LOGSTATE"
---

# BuildLogViewerStateAction

Compone lo stato completo della pagina Log per un render: elenco e albero dei file e, per il file scelto, le voci della coda filtrate. Non sostituisce l'autorizzazione, che resta al chiamante.

## Input

- `string $file`: percorso relativo a `storage/logs` del file scelto; `''` se nessuno.
- `string $level = ''`: livello da filtrare; se non è un `LogLevelEnum` valido diventa `''` (nessun filtro).
- `string $search = ''`: testo cercato nel corpo delle voci.
- `string $window = '256'`: finestra di lettura in KB, come stringa; se non è in `WINDOW_OPTIONS_KB` diventa 256 KB.

## Output

- `LogViewerStateData`: `files`, `tree`, `levels`, `windows`, `entries` (massimo 200), `total`, `tail` (`LogTailData|null`), `modifiedAt` (int|null), `error` (string|null).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACT-LOGSTATE-INV-1 | Senza file scelto non si legge nessun file: `entries=[]`, `total=0`, `tail=null`, `modifiedAt=null`, `error=null`. L'elenco e l'albero sono comunque costruiti. Limite noto: `total=0` e `modifiedAt=null` vengono dal codice; il test non li asserisce. | ACT-LOGSTATE-INV-1 |
| ACT-LOGSTATE-INV-2 | File non valido, non leggibile, fuori da `storage/logs` o con errore Safe: nessuna eccezione verso il chiamante; `error` è il messaggio tradotto `activity::log_viewer.messages.file_unavailable` (null se la traduzione non è una stringa); `entries` vuote, `modifiedAt=null`. Limite noto: il test asserisce errore valorizzato, nessuna voce, `tail=null` e messaggio senza il percorso richiesto; non asserisce il testo tradotto né `modifiedAt=null`. | ACT-LOGSTATE-INV-2 |
| ACT-LOGSTATE-INV-3 | Una finestra non ammessa usa 256 KB senza fallire. Limite noto: il test prova solo che non fallisce; il valore 256 non è asserito. | ACT-LOGSTATE-INV-3 |
| ACT-LOGSTATE-INV-4 | Un livello non ammesso equivale a nessun filtro sul livello. | ACT-LOGSTATE-INV-4 |
| ACT-LOGSTATE-INV-5 | Il file scelto è letto con `ReadLogTailAction` e filtrato con `FilterLogEntriesAction`; `modifiedAt` viene da `filemtime`. Limite noto: il test asserisce voci dalla più recente, `total`, `tail` e `modifiedAt` positivo; l'uso delle due Action non è asserito. | ACT-LOGSTATE-INV-5 |

## Effetti collaterali

- Lettura del disco: elenco di `storage/logs` (ricorsivo), coda del file scelto, `filemtime`.
- Nessuna scrittura, nessun evento, nessuna coda, nessun servizio esterno.
- Risolve le dipendenze con `app()` (service locator), non per iniezione.

## Errori

- Non propaga `InvalidLogFileException`, `RuntimeException` né `SafeExceptionInterface`: le converte nel messaggio generico di INV-2.
- Altre eccezioni non previste si propagano (non verificato nel dettaglio).

## Non fa

- Non verifica l'autorizzazione: la pagina usa `AuthorizeLogAccessAction`.
- Non mostra il messaggio originale dell'eccezione, che contiene il percorso richiesto.
- Non cerca oltre la finestra letta (massimo 4 MiB, vedi `ReadLogTailAction`).

