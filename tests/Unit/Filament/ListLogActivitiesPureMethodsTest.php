<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Unit\Filament;

use Tests\Modules\Activity\Fixtures\ListLogActivitiesTranslationHarness;
use PHPUnit\Framework\Assert;

test('ListLogActivities toTranslationString normalizza stringhe e array', function (): void {
    $page = new ListLogActivitiesTranslationHarness;

    Assert::assertSame('Titolo semplice', $page->exposeToTranslationString('Titolo semplice'));
    Assert::assertSame('parte uno parte due', $page->exposeToTranslationString(['parte uno', 'parte due']));
});

test('ListLogActivities getFieldLabel usa fallback per chiavi sconosciute', function (): void {
    $page = new ListLogActivitiesTranslationHarness;

    Assert::assertSame('campo_custom', $page->getFieldLabel('campo_custom'));
});
