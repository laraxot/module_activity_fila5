---
title: "Use Case Shop – Event Sourcing e Console Commands"
type: index
status: draft
updated: 2026-10-23
tags: [docs, activity, use_cases]
qmd: "use case shop   event sourcing e console commands activity"
---
# Use Case Shop – Event Sourcing e Console Commands

## Introduzione
Questo modulo implementa la gestione di uno shop tramite event sourcing, aggregate root e proiezioni, ispirandosi alle best practice di progetti open source come [event-sourcing-with-laravel](https://github.com/cnastasi/event-sourcing-with-laravel).

## Obiettivi
- Tracciabilità completa delle modifiche a carrelli, ordini e pagamenti
- Separazione della logica di business tramite eventi e aggregate
- Audit trail e rollback garantiti
- Performance e scalabilità tramite proiezioni ottimizzate

## Console Commands Principali
- `activity:shop:create-cart {userId}` – Crea un nuovo carrello
- `activity:shop:add-item {cartUuid} {itemId} {quantity} {price}` – Aggiunge un articolo
- `activity:shop:checkout {cartUuid}` – Completa un ordine
- Altri: gestione prodotti, replenishment, reportistica (vedi esempi nei file dedicati)

## Esempi di Utilizzo
```bash
php artisan activity:shop:create-cart 12345
php artisan activity:shop:add-item cart_12345_xxx item_001 2 19.99
php artisan activity:shop:checkout cart_12345_xxx
```

## Aggregate Root e Eventi
- **CartAggregate**: gestisce aggiunta/rimozione articoli, checkout
- **OrderAggregate**: gestisce creazione ordine, pagamento, spedizione
- **Eventi**: `CartItemAdded`, `CartItemRemoved`, `CartCheckedOut`, `OrderPlaced`, `OrderPaid`, `OrderShipped`, `PaymentReceived`, `PaymentFailed`

## Proiezioni
- **CartProjection**: stato attuale del carrello
- **OrderHistoryProjection**: storico ordini per utente
- **ProductInventoryProjection**: stock prodotti

## Flusso Operativo
1. Comando CLI → 2. Aggregate → 3. Evento → 4. Proiettore → 5. Modello di lettura → 6. UI/API

| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [docs/readme-en.md](../../readme-en.md) |
| 📚 Wiki tecnica | [./docs/wiki/](../..) |

---
**Questa documentazione è neutra e riutilizzabile, senza riferimenti a progetti specifici, e segue le regole di neutralità e modularità.**