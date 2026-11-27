---
title: "Contratto — ReadLogTailAction"
type: contract
module: Activity
owner: Activity
status: accepted
updated: 2026-11-26
action: "Modules\\Activity\\Actions\\Log\\ReadLogTailAction"
qmd: "contract ReadLogTailAction activity log lettura coda file byte limite 4 MiB UTF-8 riga parziale ACT-LOGTAIL"
---

# ReadLogTailAction

Legge solo gli ultimi N byte di un file di log, senza caricarlo intero in memoria.

## Input

- `string $absolutePath`: percorso assoluto già risolto da `ResolveLogFilePathAction`.
- `int $maxBytes = 262144` (256 KiB): richiesta; il valore effettivo è limitato tra 1024 byte e 4 MiB.

## Output

- `LogTailData`: `content` (UTF-8 valido), `size` (dimensione del file), `bytesRead`, `truncated` (true se la coda è solo una parte del file).

## Invarianti

| ID | Regola | Group Pest |
|---|---|---|
| ACT-LOGTAIL-INV-1 | Non si legge mai più di `min(max(maxBytes, 1024), 4 MiB)` byte, anche se richiesto di più. | ACT-LOGTAIL-INV-1 |
| ACT-LOGTAIL-INV-2 | Se il file è più grande della finestra si legge la coda; se il blocco contiene un a capo, la prima riga parziale è scartata. | ACT-LOGTAIL-INV-2 |
| ACT-LOGTAIL-INV-3 | File vuoto: `content=''`, `size=0`, `truncated=false`, nessuna lettura. | ACT-LOGTAIL-INV-3 |
| ACT-LOGTAIL-INV-4 | I byte non UTF-8 sono ripuliti con `mb_scrub`. | ACT-LOGTAIL-INV-4 |
| ACT-LOGTAIL-INV-5 | File inesistente o non leggibile: `RuntimeException` con messaggio generico, prima di qualsiasi lettura. Limite noto: il test asserisce solo il tipo `RuntimeException`, non il messaggio. | ACT-LOGTAIL-INV-5 |

## Effetti collaterali

- Lettura del file (`filesize`, `fopen` in `rb`, `fseek`, `stream_get_contents`); handle chiuso in `finally`.
- Nessuna scrittura.

## Errori

- `RuntimeException` per file mancante, non leggibile o non posizionabile. Il messaggio non contiene il percorso.

## Non fa

- Non cerca nel file intero: ricerca e filtri valgono solo sulla finestra letta.
- Se il blocco letto non contiene alcun a capo, la prima riga resta parziale (il codice tiene il blocco così com'è).
- `bytesRead` è la lunghezza del contenuto dopo il taglio della prima riga, non dei byte letti dal disco.

