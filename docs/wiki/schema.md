---
title: Wiki Schema
description: Schema e convenzioni per la manutenzione della wiki
tags:
  - schema
  - conventions
  - llm-instructions
created: 2026-04-15
<<<<<<< .merge_file_LW50aS
<<<<<<< .merge_file_7AQvE2
=======
<<<<<<< .merge_file_LQUJEJ
=======
>>>>>>> .merge_file_0ckSjc
=======
>>>>>>> .merge_file_lggafx
type: note
status: draft
updated: 2026-10-07
qmd: "wiki schema - activity activity"
<<<<<<< .merge_file_LW50aS
<<<<<<< .merge_file_7AQvE2
=======
>>>>>>> .merge_file_YAjKRL
>>>>>>> .merge_file_0ckSjc
=======
>>>>>>> .merge_file_lggafx
---

# Wiki Schema - Activity

Istruzioni per l'LLM su come mantenere questa wiki.

## Struttura

```
docs/
├── wiki/
│   ├── index.md           # Catalogo
│   ├── log.md             # Registro
│   ├── SCHEMA.md          # Questo file
│   ├── concepts/          # Pattern, architettura
│   ├── entities/          # Modelli, azioni
│   ├── sources/           # Doc esterna
│   └── comparisons/       # Tabelle comparative
└── raw/                   # Sorgenti immutable
```

## Convenzioni

- File: kebab-case (es. `entity-user.md`)
- Frontmatter: title, description, tags, created
- Cross-ref: `[Link](../concepts/name.md)`
- NON modificare mai `docs/raw/`
