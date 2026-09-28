---
title: "04 best practice"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "04 best practice"
issues: []
discussions: []
---

# Best Practice <nome progetto>ion Market

## Sicurezza
- Audit trail completo tramite eventi
- Gestione KYC/AML se richiesto dalla giurisdizione
- Gestione errori e fallback per oracoli

## Performance
- Snapshotting per aggregati con molti eventi
- Proiezioni ottimizzate per query rapide
- Cache per mercati attivi

## UX/UI
- Dashboard con mercati attivi, quote aggiornate in tempo reale
- Storico personale e leaderboard
- Notifiche per chiusura mercati e payout

## Testing
- Unit test per ogni evento, proiettore, reattore
- Feature test per flussi utente (creazione mercato, scommessa, payout)
- Test di integrazione con oracoli esterni