<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

<<<<<<< .merge_file_QDEvBL
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
=======
use Modules\Activity\Filament\Pages\ListLogActivities;
use Modules\Activity\Filament\Resources\ActivityResource;
use ReflectionMethod;
use Webmozart\Assert\Assert;

/**
 * Pagina ListLogActivities con risorsa ActivityResource che espone il metodo privato toTranslationString
 * (classe con nome, non anonima).
 */
final class ListLogActivitiesTranslationHarness extends ListLogActivities
{
    public static function getResource(): string
    {
        return ActivityResource::class;
    }

    /**
     * @param  list<string>|string|int  $value
     */
    public function exposeToTranslationString(string|array|int $value): string
    {
        $method = new ReflectionMethod(ListLogActivities::class, 'toTranslationString');
        $method->setAccessible(true);

        $result = $method->invoke($this, $value);
        Assert::string($result);

        return $result;
    }
}
>>>>>>> .merge_file_mcOKeW
