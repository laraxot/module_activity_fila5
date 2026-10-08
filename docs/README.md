# Activity

[![Module](https://img.shields.io/badge/Module-Activity-8B0000.svg)]()
[![Laravel](https://img.shields.io/badge/Laravel-13-red?style=for-the-badge)](https://laravel.com/)](https://laravel.com/)
[![Filament](https://img.shields.io/badge/Filament-5-ffab00?style=for-the-badge)](https://filamentphp.com/)](https://filamentphp.com/)
[![PHP](https://img.shields.io/badge/PHP-8.4+-777BB4?style=for-the-badge)](https://php.net/)](https://php.net/)
[![PHP](https://img.shields.io/badge/PHP-8.4+-777BB4?style=for-the-badge)](https://php.net/)](https://phpstan.org/)
[![PSR-12](https://img.shields.io/badge/Code-PSR--12-blue?style=for-the-badge)](https://www.php-fig.org/psr/psr-12/)](https://www.php-fig.org/psr/psr-12/)
[![Architecture](https://img.shields.io/badge/Architecture-Modular-purple?style=for-the-badge)](https://martinfowler.com/articles/paradigm-shifts.html)]()
]()

> **Core module for the FixCity Platform.**

## Perché esiste

Core module for the FixCity Platform.

## Superpoteri

- Modular component with XotBase patterns
- Professional-grade implementation
- Integrated with FixCity Platform

## Documentazione

| Lingua | Link |
|--------|------|
| 🇮🇹 Presentazione | Questo file (`README.md`) |
| 🇬🇧 Business card | [docs/readme-en.md](./docs/readme-en.md) |
| 📚 Wiki tecnica | [./docs/wiki/](./docs/) |

---

**Modulo** `Activity` · **Laraxot** · **FixCity Platform** · PHPStan 10 · Filament 5## 🎛️ **Filament Integration**

- **ListLogActivitiesAction** - Action per visualizzare lo storico attività da tabella Resource
- **ListLogActivities** - Pagina dettaglio log con paginazione custom
- **ActivityServiceProvider** - Registrazione moduli, route, view, traduzioni

=======
>>>>>>> 77d3d692 (.)---
title: "Activity Module Documentation"
type: documentation
tags: [module, documentation]
created: 2026-06-05
updated: 2026-06-05
---

# Modulo Activity

## Overview

Il modulo **Activity** fa parte dell'ecosistema Laraxot PTVX.

## Scopo

<<<<<<< HEAD
Fornisce audit trail e activity logging basato su `spatie/laravel-activitylog` ed `spatie/laravel-event-sourcing`. Espone `LogActivityAction` (`app/Actions/LogActivityAction.php`) come entrypoint per registrare eventi (type, causer, subject, properties) e risorse Filament per consultare/analizzare i log.=======
Questo modulo gestisce [DESCRIZIONE SPECIFICA DA COMPLETARE].
>>>>>>> 35d8cf69 (Initial commit)

## Struttura

```
Activity/
├── app/
│   ├── Models/
│   ├── Filament/
│   └── ...
├── docs/
├── lang/
└── resources/
```

## Dipendenze

- [Xot Base](../Xot/docs/)
- [User Module](../User/docs/) (se usa autenticazione)
- [Tenant Module](../Tenant/docs/) (se multi-tenant)

## Collegamenti

- [Documentazione Root](../../../docs/ACTIVITY_MODULE.md)
- [Regole Architecture](../Xot/docs/architecture/)

## Backlinks

- [Indice Moduli](../README.md)

## TODO

- [ ] Completare descrizione funzionalità
- [ ] Documentare modelli principali
- [ ] Documentare risorse Filament
- [ ] Aggiungere esempi codice

## AI Workflows
- [AI Methodologies](./ai-methodologies.md)
>>>>>>> laraxot/dev
