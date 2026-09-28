<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Filament;

use Modules\Activity\Filament\Pages\ListLogActivities;
use Modules\Activity\Filament\Resources\ActivityResource;
use PHPUnit\Framework\Assert;
use ReflectionMethod;

test('ListLogActivities toTranslationString normalizza stringhe e array', function (): void {
<<<<<<< HEAD
    $page = new class extends ListLogActivities
=======
    $page = new class() extends ListLogActivities
>>>>>>> laraxot/dev
    {
        public static function getResource(): string
        {
            return ActivityResource::class;
        }

<<<<<<< HEAD
        /** @param list<string>|string|int $value */
        public function exposeToTranslationString(string|array|int $value): string
=======
        public function exposeToTranslationString(mixed $value): string
>>>>>>> laraxot/dev
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
    $page = new class extends ListLogActivities
=======
    $page = new class() extends ListLogActivities
>>>>>>> laraxot/dev
    {
        public static function getResource(): string
        {
            return ActivityResource::class;
        }
    };

    Assert::assertSame('campo_custom', $page->getFieldLabel('campo_custom'));
});
