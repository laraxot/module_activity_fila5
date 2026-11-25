---
title: "Activity: bonifica docs .md (convenzioni, duplicati, template)"
type: story
status: done
module: Activity
epic: docs-second-brain
story_id: docs-zen-conventions-activity
created: 2026-11-25
updated: 2026-11-25
qmd: "activity docs bonifica kebab-case frontmatter qmd duplicati md5 template fabbricati stub gitkeep-Modules fusione collisioni"
related:
  - ../../../../Xot/docs/bmad/stories/docs-zen-conventions-swarm.story.md
---

# Activity: bonifica docs `.md`

Parte della lane F della story ombrello
[docs-zen-conventions-swarm](../../../../Xot/docs/bmad/stories/docs-zen-conventions-swarm.story.md).

## Perche'

Il rumore in `docs/` (copie esatte, varianti `_`/MAIUSCOLO/`-2`, stub generati, template di prodotto
generici) degrada QMD e confonde gli agenti. Obiettivo: una copia canonica per contenuto, nomi kebab,
frontmatter con `title` + `qmd` ovunque, link aggiornati.

## Prima / Dopo

| Metrica | Prima | Dopo |
|---|---:|---:|
| file .md | 995 | 730 |
| copie esatte (md5) oltre la prima | 148 | 8 |
| nomi con data | 1 | 1 |
| nomi non kebab | 72 | 0 |
| senza frontmatter | 7 | 0 |
| senza `qmd` | 21 | 0 |
| annidamenti generati | 0 | 0 |

Le copie esatte residue sono solo tra file `*.story.md` (non eliminabili per regola).

## Cosa e' stato eliminato / fuso e perche'

| Causa | File |
|---|---:|
| cfg-template | 31 |
| fused | 54 |
| md5-dup | 120 |
| stub-gitkeep | 26 |
| subsumed | 30 |
| subsumes-dst(replaced) | 5 |

- `cfg-template`: template di prodotto generici (roadmap/strategy/sprint/user-research/launch/confidence/tech-spec)
  senza alcun identificatore reale del modulo (verifica automatica token CamelCase/backtick/snake contro `app/`, `database/`, `config/`, `routes/`).
- `stub-gitkeep*`: stub generati che puntano a `../../../Themes/docs/shared-components/.gitkeep-Modules` (inesistente);
  se contenevano testo reale questo era gia' presente nella copia pulita.
- `md5-dup`: copie byte-identiche; canonica = nome kebab senza suffisso `-N`, fuori da `llm-wiki/`/`bmad/` quando conoscenza generale.
- `fused`/`subsumed`: collisioni `_`/MAIUSCOLO/`-N` sul nome kebab: se contenute nell'altra eliminate, altrimenti
  i paragrafi unici sono stati accodati sotto `## Contenuto fuso da <file>`.
- Rinomine: 5.

## Note specifiche Activity

- 31 template di prodotto (anche varianti `-2`/`-3`/`_`) senza identificatori del modulo eliminati; `roadmap-.md`
  era uno stub alias "post-strip data". Link `roadmap.md` rediretti a `development/roadmap.md` (roadmap reale).
- 26 stub `gitkeep-Modules` vuoti (anche in `archive/` e `use_cases/shop/`): eliminati; i link puntano al fratello
  non-stub con lo stesso nome kebab quando esiste (`filament-resource-guidelines.md`, `mcp-server-recommended.md`,
  `use_cases/shop/console-commands.md`, `phpstan-fixes.md`).
- Story datata lasciata invariata (eccezione): `bmad/stories/php-conflict-markers-20261124.story.md`.
- `tech-spec.md` conservato: generico ma cita `ActivityLog` (dubbio).
- Link fissati anche in docs di Lang, Media, Tenant, Job, UI, `bashscripts/ai/wiki`, `docs/contracts` (nessun lock attivo).
  Riferimenti non aggiornati per lock attivo: Notify (`ai-agents/project-docs-index.md`, `roadmap.md`, ...) e User
  (`registration-widget*.md` → `Activity/docs/filament-resource-guidelines-3.md`, ora `filament-resource-guidelines.md`).
- `index.md` cita ancora in backtick (sezione Storico) i nomi dei template rimossi: testo descrittivo, non link.

## Casi lasciati in dubbio

- story duplicate identiche (non toccate): bmad/stories/phpstan-swarm-cluster5-.story.md | bmad/stories/phpstan-swarm-cluster5-2.story.md | bmad/stories/phpstan-swarm-cluster5-3.story.md
- story duplicate identiche (non toccate): bmad/stories/quality-gates-phpstan-fix-.story.md | bmad/stories/quality-gates-phpstan-fix-2.story.md | bmad/stories/quality-gates-phpstan-fix-3.story.md
- story duplicate identiche (non toccate): bmad/stories/quality-gates-phpstan-swarm-.story.md | bmad/stories/quality-gates-phpstan-swarm-2.story.md | bmad/stories/quality-gates-phpstan-swarm-3.story.md
- story duplicate identiche (non toccate): stories/consolidation-activity-docs-.story.md | stories/consolidation-activity-docs-2.story.md | stories/consolidation-activity-docs-3.story.md

## Gate

Solo file `.md` sotto `docs/`: PHPStan/Pint/Pest non applicabili (skip documentato); PHPStan gia' 0.
Misura con `measure.py` (md5, regex nomi, `yaml.safe_load` frontmatter). Link rotti verso file rinominati/rimossi
riscritti nei docs di moduli non bloccati; riferimenti nei moduli con lock attivo segnalati sopra.
