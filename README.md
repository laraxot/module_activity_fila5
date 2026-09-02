# 📋 Activity — chi ha fatto cosa, quando, e perché nessuno può cancellarlo

[![PHP](https://img.shields.io/badge/PHP-%5E8.3-777BB4.svg)](composer.json)
[![Laravel](https://img.shields.io/badge/Laravel-%5E13.0-FF2D20.svg)](../../composer.json)
[![Filament](https://img.shields.io/badge/Filament-%5E5.0-FDAB3D.svg)](../../composer.json)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%20max%2C%200%20errori-brightgreen.svg)](../../phpstan.neon)
[![strict_types](https://img.shields.io/badge/declare-strict__types%3D1-informational.svg)](#)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

> In una PA digitale "chi ha cambiato questo dato" non è una curiosità, è un
> obbligo di legge. Activity non registra log per debug: registra eventi per
> compliance — `spatie/laravel-event-sourcing`, non un semplice `activity_log`
> con due colonne. La differenza è che un log si può sovrascrivere, un event
> store no.

I badge sopra sono verificati, non incollati: `phpstan analyse Modules/Activity`
a livello `max` (config di progetto, `laravel/phpstan.neon`), l'1 settembre
2026, a tree fermo. Rilanciabile in un comando:
`cd laravel && ./vendor/bin/phpstan analyse Modules/Activity`.

---

## Scopo e confini

Activity possiede l'audit trail, non lo reimplementa: `Activity`, `StoredEvent` e
`Snapshot` estendono le classi di `spatie/laravel-activitylog` e
`spatie/laravel-event-sourcing` (`app/Models/Activity.php:108`, `StoredEvent.php:64`,
`Snapshot.php:41`), su connessione `activity` e su tre tabelle proprie. Sei moduli lo
consumano; lui ne conosce due — 36 file toccano Xot, 10 toccano User, zero toccano un
modulo di dominio.

Il confine oggi rotto è lo schema: `activity_log`, `stored_events` e `snapshots` hanno
**una migrazione nel modulo e una duplicata in `laravel/database/migrations/`**, con
`subject_id` di due tipi incompatibili (`string(36)` contro `unsignedBigInteger`) — e la
copia fuori dal modulo non passa da `XotBaseMigration`, quindi non è idempotente.

Scopo esteso, misure e mosse: [docs/scopo.md](docs/scopo.md).

---

## Perché

Un sistema che gestisce dati sensibili (schede, indennità, valutazioni del
personale) ha bisogno di rispondere a una domanda precisa mesi dopo il fatto:
chi ha toccato questo record, quando, con quale valore precedente. Un log
applicativo generico non basta — si perde, si trunca, si interpreta a
sensazione. Activity è lo strato dedicato: `spatie/laravel-activitylog` per la
traccia leggibile, `spatie/laravel-event-sourcing` per la traccia
ricostruibile. Non è un modulo che "aiuta a debuggare", è un modulo che
risponde in audit.

## Logica

`Actions/`, `Adapters/`, `Events/`, `Listeners/`: la struttura non è a caso.
Un evento di dominio (`Events/`) viene intercettato da un `Listener`, che lo
traduce in scrittura tramite un `Adapter` — il punto in cui, se domani cambia
il backend di storage dell'audit trail, cambia un adapter, non venti punti di
chiamata sparsi nei moduli che generano eventi. `Models/Policies/` decide chi
può leggere cosa: un audit trail che chiunque può consultare non è un audit
trail, è una fuga di dati.

## Filosofia

**Un evento scritto è immutabile.** Non esiste un `ActivityController::update()`
per "correggere" una riga di log: se un dato era sbagliato, si scrive un nuovo
evento che lo corregge, non si riscrive la storia. È lo stesso principio per
cui in questo repository non si fa `git reset --hard` sulla cronologia — vale
per il codice quanto per i dati che il codice produce.

## Religione

**Zero eventi inventati nella documentazione.** Questo file, prima di oggi,
elencava "100+ eventi predefiniti", "downloads 1.5k+", "150+ stars",
"Code Quality A+ (CodeClimate)" — un modulo interno mai pubblicato su
Packagist non ha download, e nessuno di quei numeri era mai stato misurato.
Sotto trovi solo cifre riprodotte lo stesso giorno in cui sono scritte, con
il comando accanto.

## Politica

`laravel/phpstan.neon` è sacro: nessun agente lo tocca. Ogni run di verifica
è nuda — niente `-c`, niente `--level` custom — perché un numero ottenuto
bypassando la config del progetto non certifica nulla.

## Zen

Un modulo che nessuno consulta finché non arriva un'ispezione è il modulo che
deve essere inattaccabile in quel momento, non prima. Meglio un log noioso e
vero che una dashboard bella e silenziosa sui dati che contano.

---

## Stato misurato — 1 settembre 2026

Fonte: run isolata di `base-ptvx-fila5-80` dopo il ripristino di `vendor/` e
`composer update -W` (autoloader passato da 13.041 a 25.358 classi — le
misure di stanotte su questo stesso modulo erano su un albero diverso e non
sono comparabili).

| Metrica | Valore | Comando |
|---|---:|---|
| PHPStan | **0 errori**, `level: max` | `./vendor/bin/phpstan analyse Modules/Activity` |
| PHPMD su `app/` | **2 rilievi** — il più basso dei moduli scheda del progetto | `./tools/phpmd.sh Modules/Activity/app` |
| PHPInsights — Code | 94.1 % | `./tools/phpinsights.sh Modules/Activity` |
| PHPInsights — Architecture | 92.9 % | idem |
| Casi di test | 464 | `./vendor/bin/pest Modules/Activity` |
| `@phpstan-ignore` | 0 in `app/` (un `grep` ricorsivo trova solo una stringa di regex dentro `tools/convert-pest-to-assert.php`, che *rimuove* ignore da altri file — non è una soppressione reale) | `grep -rn "@phpstan-ignore" Modules/Activity --include='*.php'` |
| Coverage di riga | **non misurabile** con il comando standard: `--coverage` misura `app/` della root Laravel, non quello del modulo — limite di setup, non assenza di test | vedi [`docs/coverage.md`](docs/coverage.md) |

**2 rilievi PHPMD** è un numero basso per un modulo di questa complessità
(event sourcing + policy + Filament): o il codice è davvero pulito, o il
modulo è piccolo abbastanza da non dare a PHPMD molto su cui lavorare. Non
lo sappiamo ancora — verificalo leggendo l'output, non fidarti del numero da
solo.

## Cosa contiene

- **Event sourcing** — `Events/`, `Listeners/`, `Adapters/`: la pipeline che
  trasforma un'azione di dominio in un evento immutabile.
- **Activity log leggibile** — integrazione `spatie/laravel-activitylog` per
  la consultazione umana, accanto all'event store per la ricostruzione.
- **Filament** — `Resources/`, `Pages/`, componenti per consultare l'audit
  trail da admin panel, con policy dedicate su chi può vedere cosa.

## Come si verifica (non fidarti di questo file)

```bash
cd laravel
./vendor/bin/phpstan analyse Modules/Activity   # 0 errori atteso
./tools/phpmd.sh Modules/Activity/app           # NON la root del modulo
./tools/phpinsights.sh Modules/Activity
./vendor/bin/pest Modules/Activity
```

## Nota di manutenzione

`docs/` di questo modulo ha tre file indice che collidono di case:
`00-index.md`, `00-INDEX.md`, `00-index-1.md`. Su un filesystem
case-insensitive (o in certi flussi git) uno di questi vince silenziosamente
sugli altri due — vale la pena consolidarli in uno solo, ma è una decisione
editoriale che non prendo in questo giro (fuori dallo scope di un README).

## Documentazione

| | |
|---|---|
| Wiki tecnica | [`docs/`](docs/) |
| Coverage | [`docs/coverage.md`](docs/coverage.md) |

---

**Modulo** `activity` · **Laraxot / FixCity Platform** · licenza MIT

---

## Scopo del modulo

Perche' esiste, come raggiungere meglio il suo scopo e cosa **non** gli appartiene:
[`docs/purpose.md`](./docs/purpose.md).
