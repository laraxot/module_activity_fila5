---
title: "domain model"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "domain model"
issues: []
discussions: []
---

# Modello di Dominio - <nome progetto>ion Market

## Aggregate
- **Market**: rappresenta un mercato predittivo
- **Bet**: rappresenta una scommessa
- **Outcome**: rappresenta un possibile esito

## Eventi
- `MarketCreated`
- `BetPlaced`
- `MarketClosed`
- `PayoutProcessed`

## Comandi
- `CreateMarket`
- `PlaceBet`
- `CloseMarket`
- `ProcessPayout`

## Proiezioni
- **MarketStatus**: stato attuale dei mercati
- **UserBalance**: saldo utente aggiornato in tempo reale
- **BetHistory**: storico delle scommesse

## Esempio di evento
```php
class BetPlaced implements ShouldBeStored
{
    public function __construct(
        public string $marketUuid,
        public string $userUuid,
        public float $amount,
        public string $outcome
    ) {}
}
```