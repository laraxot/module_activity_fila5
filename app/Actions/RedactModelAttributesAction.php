<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;

/**
 * Rimuove attributi sensibili prima della persistenza nel log attività.
 */
class RedactModelAttributesAction
{
    use QueueableAction;

    private const SENSITIVE_KEYS = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    /**
     * @param  array<string, mixed>  $attributes
     *
     * @return array<string, mixed>
     */
    public function execute(array $attributes): array
    {
        /** @var array<string, mixed> $redacted */
        $redacted = Arr::except($attributes, self::SENSITIVE_KEYS);

        return $redacted;
    }
}
