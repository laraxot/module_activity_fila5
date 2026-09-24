<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Filament;

use Modules\Activity\Filament\Pages\ListLogActivities;
use Modules\Activity\Filament\Resources\ActivityResource;
use PHPUnit\Framework\Assert;
use ReflectionMethod;

test('ListLogActivities toTranslationString normalizza stringhe e array', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_yyQG2k
    $page = new class() extends ListLogActivities
=======
    $page = new class extends ListLogActivities
>>>>>>> .merge_file_k0etVW
=======
    $page = new class() extends ListLogActivities
>>>>>>> a95e8f36 (.)
    {
        public static function getResource(): string
        {
            return ActivityResource::class;
        }

<<<<<<< HEAD
<<<<<<< .merge_file_yyQG2k
        public function exposeToTranslationString(mixed $value): string
=======
        /** @param list<string>|string|int $value */
        public function exposeToTranslationString(string|array|int $value): string
>>>>>>> .merge_file_k0etVW
=======
        public function exposeToTranslationString(mixed $value): string
>>>>>>> a95e8f36 (.)
        {
            $method = new ReflectionMethod(ListLogActivities::class, 'toTranslationString');
            $method->setAccessible(true);

            /** @var string $result */
            $result = $method->invoke($this, $value);

            return $result;
        }
    };

    Assert::assertSame('Titolo semplice', $page->exposeToTranslationString('Titolo semplice'));
    Assert::assertSame('parte uno parte due', $page->exposeToTranslationString(['parte uno', 'parte due']));
    Assert::assertSame('', $page->exposeToTranslationString(123));
});

test('ListLogActivities getFieldLabel usa fallback per chiavi sconosciute', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_yyQG2k
    $page = new class() extends ListLogActivities
=======
    $page = new class extends ListLogActivities
>>>>>>> .merge_file_k0etVW
=======
    $page = new class() extends ListLogActivities
>>>>>>> a95e8f36 (.)
    {
        public static function getResource(): string
        {
            return ActivityResource::class;
        }
    };

    Assert::assertSame('campo_custom', $page->getFieldLabel('campo_custom'));
});
