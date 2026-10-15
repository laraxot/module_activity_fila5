<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;

/**
 * Test harness for ListLogActivities translation methods.
 * Provides a minimal test fixture for translation and field label methods.
 */
class ListLogActivitiesTranslationHarness extends Model
{
    /**
     * Convert value to translation string format.
     *
     * @param  string|array<int, string>  $value
     */
    public function exposeToTranslationString(string|array $value): string
    {
        if (is_string($value)) {
            return $value;
        }

        return implode(' ', $value);
    }

    /**
     * Get field label with fallback to field name.
     *
     * @param  string  $fieldName
     */
    public function getFieldLabel(string $fieldName): string
    {
        return $fieldName;
    }
}