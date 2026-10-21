<<<<<<< .merge_file_Xxo1V2
=======
---
title: "MCP Server Consigliati per il Modulo Activity"
type: note
status: draft
updated: 2026-10-07
tags: [docs, activity]
qmd: "mcp server consigliati per il modulo activity activity"
---
>>>>>>> .merge_file_PDxC3V
# MCP Server Consigliati per il Modulo Activity

## Scopo del Modulo
Gestione delle attività utente, log, cron e tracciamento eventi.

## Server MCP Consigliati
- `memory`: Per tracciare lo stato temporaneo delle attività.
- `filesystem`: Per log persistenti e archiviazione file attività.
- `fetch`: Per invio/ricezione di eventi da servizi esterni.

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] },
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] },
    "fetch": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-fetch"] }
  }
}
```

## Note
- Adatta la configurazione se il modulo interagisce con sistemi di terze parti.
