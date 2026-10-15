<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Filament;

use Modules\Activity\Tests\Fixtures\ListLogActivitiesTranslationHarness;
use PHPUnit\Framework\Assert;

test('ListLogActivities toTranslationString normalizza stringhe e array', function (): void {
    $page = new ListLogActivitiesTranslationHarness;

    Assert::assertSame('Titolo semplice', $page->exposeToTranslationString('Titolo semplice'));
    Assert::assertSame('parte uno parte due', $page->exposeToTranslationString(['parte uno', 'parte due']));
<<<<<<< .merge_file_4cT1v4
=======
    Assert::assertSame('', $page->exposeToTranslationString(123));
>>>>>>> .merge_file_ieIfgo
});

test('ListLogActivities getFieldLabel usa fallback per chiavi sconosciute', function (): void {
    $page = new ListLogActivitiesTranslationHarness;

    Assert::assertSame('campo_custom', $page->getFieldLabel('campo_custom'));
});
