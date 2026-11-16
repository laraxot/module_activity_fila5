---
<<<<<<< .merge_file_8cJYap
<<<<<<< .merge_file_Lre5aT
title: "Activity: mai Filament*, sempre XotBase*"
=======
<<<<<<< .merge_file_6cl3k0
=======
>>>>>>> .merge_file_GL7I11
title: "Activity — mai Filament\*, sempre XotBase*"

title: "Activity: mai Filament*, sempre XotBase*"
<<<<<<< .merge_file_8cJYap
>>>>>>> .merge_file_tRvqDY
>>>>>>> .merge_file_jXFtV8
=======
>>>>>>> .merge_file_GL7I11
type: concept
module: Activity
tags: [activity, filament, xotbase, architecture]
created: 2026-07-16
updated: 2026-07-16
qmd: "Activity filament never extend Filament class XotBase mirror path"
related:
<<<<<<< .merge_file_8cJYap
<<<<<<< .merge_file_Lre5aT
=======
<<<<<<< .merge_file_6cl3k0
  - ../../../../docs/wiki/rules/xotbase-critical-rules.md
  - ../../../../docs/wiki/rules/xot-base-filament-widgets.md
  - ../../../../docs/wiki/memories/xotbase-never-extend-filament.md
=======
>>>>>>> .merge_file_jXFtV8
=======
  - ../../../../docs/wiki/rules/xotbase-critical-rules.md
  - ../../../../docs/wiki/rules/xot-base-filament-widgets.md
  - ../../../../docs/wiki/memories/xotbase-never-extend-filament.md

>>>>>>> .merge_file_GL7I11
  - ../../../../../docs/wiki/rules/xotbase-critical-rules.md
  - ../../../../../docs/wiki/rules/xot-base-filament-widgets.md
  - ../../../../../docs/wiki/memories/xotbase-never-extend-filament.md
status: draft
<<<<<<< .merge_file_8cJYap
<<<<<<< .merge_file_Lre5aT
=======
>>>>>>> .merge_file_tRvqDY
>>>>>>> .merge_file_jXFtV8
=======
>>>>>>> .merge_file_GL7I11
---

# Mai `Filament\*` — sempre `Modules\Xot\Filament\...\XotBase*`

<<<<<<< .merge_file_8cJYap
<<<<<<< .merge_file_Lre5aT
Bridge on-demand. Contenuto canonico: [docs/wiki/rules/xotbase-critical-rules.md](../../../../../docs/wiki/rules/xotbase-critical-rules.md).
=======
<<<<<<< .merge_file_6cl3k0
=======
>>>>>>> .merge_file_GL7I11
Bridge on-demand. Contenuto canonico: [docs/wiki/rules/xotbase-critical-rules.md](../../../../docs/wiki/rules/xotbase-critical-rules.md).

Bridge on-demand. Contenuto canonico: [docs/wiki/rules/xotbase-critical-rules.md](../../../../../docs/wiki/rules/xotbase-critical-rules.md).
<<<<<<< .merge_file_8cJYap
>>>>>>> .merge_file_tRvqDY
>>>>>>> .merge_file_jXFtV8
=======
>>>>>>> .merge_file_GL7I11

## Zen (riassunto)

Nessuna classe in `Modules/Activity` estende una classe `Filament\...` direttamente.
Si estende sempre lo "specchio" in `Modules\Xot\Filament\...` allo stesso
percorso relativo (es. `Filament\Tables\Columns\ViewColumn` ->
`Modules\Xot\Filament\Tables\Columns\XotBaseViewColumn`). Se manca il
mirror, va creato in Xot prima di usarlo qui, mai come scorciatoia nel modulo.

Non pre-caricare questo file: leggi la fonte canonica solo quando il task lo richiede.
