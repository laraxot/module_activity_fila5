---
title: Accessor delegation pattern
module: Activity
<<<<<<< .merge_file_09YdUY
=======
type: note
status: draft
updated: 2026-10-08
tags: [docs, activity, wiki]
qmd: "accessor delegation pattern (sacro) activity"
>>>>>>> .merge_file_vjIN9e
---

# Accessor Delegation Pattern (SACRO)

Questo documento descrive il pattern di delegazione per gli accessor Eloquent con auto-persistenza, parte degli standard architetturali del modulo.

## Descrizione

Il pattern separa l'orchestrazione dell'accessor dalla logica di calcolo pura. Questo garantisce testabilità, performance e pulizia del codice.

### Struttura

1.  **Accessor (`getSomeValueAttribute`)**: Gestisce il controllo della cache (DB), l'orchestrazione e la persistenza silenziosa.
2.  **Metodo Puro (`getSomeValue`)**: Contiene la logica di calcolo complessa, senza dipendenze dal DB o effetti collaterali. Deve essere posizionato **vicino** all'accessor per facilità di lettura.

## Esempio

```php
protected function getSomeValueAttribute(?float $value): ?float
{
    if (is_float($value)) {
        return $value;
    }

    $result = $this->getSomeValue();

    if ($this->exists) {
        static::withoutEvents(function () use ($result): void {
            $this->update(['some_value' => $result]);
        });
    }

    return $result;
}

protected function getSomeValue(): float
{
    // Logica complessa...
    return 42.0;
}
```

---
**Riferimenti**:
- [Documento Canonico AI Agents](../../../../.agents/docs/accessor-auto-persistence.md)
- [00-INDEX.md](00-INDEX.md)
