# Activity - Product Roadmap

> Documento vivente. Modulo.
> Maturita' stimata: 60% implementato, 40% gap residuo.

## Visione di avanzamento

Questo roadmap traduce il PRD in sequenza di rilascio per **Activity**, che nel progetto copre: tracciamento attivita', audit e storico azioni.

## Orizzonte 0-30 giorni

- chiudere i gap P0 descritti in [PRD](prd.md)
- riallineare codice, test e documentazione
- rimuovere le ambiguita' tra stato reale e stato percepito

## Orizzonte 30-90 giorni

- consolidare test, osservabilita' e metriche
- completare le superfici utente o admin critiche
- ridurre le dipendenze manuali o i fallback fragili

## Orizzonte 90-180 giorni

- estendere le capacita' avanzate solo dopo convergenza del core
- migliorare UX, automazioni e operativita'

## Milestone

### M1 - Convergenza Core
- focus: contratto funzionale minimo affidabile
- target completamento: 80%

### M2 - Superfici Vere
- focus: UI, API e processi allineati al backend reale
- target completamento: 90%

### M3 - Eccellenza Operativa
- focus: qualita', osservabilita', performance e governance
- target completamento: 95%+

## Dipendenze

<<<<<<< HEAD
- [PRD](prd.md)
- [Product Strategy](product-strategy.md)
- [Sprint Planning Meeting](sprint-planning-meeting.md)
- [Indice centrale](../../../../docs/project/PRODUCT_DOCS_INDEX_2026_03_12.md)
=======
### Q4 2026 - Scale & Intelligence

| Week | Milestone | Deliverables |
|------|-----------|--------------|
| W37-40 | Performance at Scale | - Horizontal scaling<br>- Data partitioning<br>- Archive strategies<br>- Query optimization |
| W41-44 | ML-Powered Insights | - Pattern recognition<br>- Forecastive analytics<br>- Automated alerts<br>- Behavioral baselines |
| W45-48 | API & Ecosystem | - Public API launch<br>- Developer documentation<br>- SDK releases<br>- Partner integrations |

---

## Now / Next / Later Framework

### NOW (Current Sprint)

- [ ] Complete event capture for core user actions
- [ ] Implement efficient storage with proper indexing
- [ ] Build admin activity dashboard
- [ ] Add search and filter capabilities
- [ ] Resolve PHPStan errors
- [ ] Write comprehensive tests

### NEXT (Next 4-8 Weeks)

- [ ] Real-time activity feed with WebSocket
- [ ] Alerting system for suspicious activity
- [ ] User behavior analytics dashboard
- [ ] Export and reporting enhancements
- [ ] Webhook integrations

### LATER (Next Quarter+)

- [ ] ML-powered anomaly detection
- [ ] Advanced compliance features
- [ ] Public API for activity data
- [ ] Cross-module activity correlation
- [ ] Forecastive behavior modeling

---

## Milestones and Dependencies

| Milestone | Target Date | Dependencies | Success Criteria |
|-----------|-------------|--------------|------------------|
| **M1: Core Tracking Live** | March 31, 2026 | - Event schema<br>- Storage layer | - All user actions tracked<br>- Query performance <100ms |
| **M2: Admin Dashboard** | May 31, 2026 | - Core tracking<br>- UI components | - Admins can search/filter activities<br>- Export working |
| **M3: Real-Time Alerts** | August 31, 2026 | - WebSocket infra<br>- Alert engine | - Alerts fire within 5 seconds<br>- <1% false positive rate |
| **M4: Compliance Ready** | November 30, 2026 | - Audit features<br>- Legal review | - SOC2 audit passed<br>- GDPR compliance verified |

---

## Module Dependencies

| Module | Type | Criticality | Notes |
|--------|------|-------------|-------|
| **User** | Required | Critical | User identification |
| **Tenant** | Required | High | Multi-tenancy isolation |
| **Notify** | Optional | Medium | Alert notifications |
| **Geo** | Optional | Low | Geographic tracking |

---

## Resource Allocation

| Role | Allocation | Responsibilities |
|------|------------|------------------|
| **Backend Engineers** | 1.5 FTE | Core development |
| **Frontend Engineers** | 0.5 FTE | Admin UI |
| **QA Engineer** | 0.25 FTE | Testing |
| **DevOps** | 0.25 FTE | Infrastructure |

---

## Success Metrics

| Metric | Q1 Target | Q2 Target | Q3 Target | Q4 Target |
|--------|-----------|-----------|-----------|-----------|
| **Events Captured/Day** | 100K | 500K | 1M | 5M |
| **Query Latency (p95)** | 200ms | 150ms | 100ms | 50ms |
| **Storage Efficiency** | Baseline | -20% | -30% | -40% |
| **Alert Accuracy** | N/A | 95% | 97% | 99% |

---

*Last Updated: March 12, 2026*
>>>>>>> 4fd30195 (chore: update project dependencies and improve configuration)
