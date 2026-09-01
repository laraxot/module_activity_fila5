---
title: "Coverage — Activity"
type: report
created: '2026-09-01'
qmd: "coverage pest activity test suite risky skipped perimetro app root"
---

# Coverage — Activity

Il precedente contenuto di questo file era uno stub rotto (`canonical:` puntava a
`Themes/docs/shared-components/coverage.txt`, file inesistente, e dichiarava
`module: theme` per un modulo, non un tema). Sostituito con la misura reale.

## Esito suite (2026-09-01)

`XDEBUG_MODE=coverage ./vendor/bin/pest Modules/Activity/tests --coverage --min=0`:

**274 passed, 168 skipped, 5 risky, 0 failed** (661 asserzioni, 408s).

## Percentuale di coverage: non misurabile da qui

Il report di `--coverage` misura `app/` **della root Laravel**, non
`Modules/Activity/app/` — problema strutturale del progetto (`phpunit.xml` include
solo `app/` root nel whitelist di coverage), non specifico di Activity. Vedi second
brain: `project-coverage-perimeter-is-app-only`. Un numero di percentuale scritto qui
sarebbe fuorviante: descriverebbe la copertura dell'app root, non del modulo.

Verificabile che i 274/168/5 sopra siano reali (non un artefatto): la suite esegue
davvero i test di Activity (nomi verificati nell'output, es.
`XotBasePestActivityTest`), il perimetro rotto riguarda solo il calcolo della
percentuale aggregata, non l'esecuzione dei test stessi.
