<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Unit;

use Modules\Activity\Filament\Pages\Concerns\CanPaginate;
use Tests\Modules\Activity\Fixtures\CanPaginateHarness;
use Tests\Modules\Activity\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Can Paginate', function (): void {
    test('trait exists', function (): void {
        Assert::assertTrue(trait_exists(CanPaginate::class));
    });

    test('trait has pagination methods', function (): void {
        // Check that trait has required methods
        $methods = [
            'updatedRecordsPerPage',
            'getRecordsPerPage',
            'getTablePage',
            'getDefaultRecordsPerPageSelectOption',
            'getPaginationPageName',
            'getPerPageSessionKey',
            'paginateQuery',
            'getRecordsPerPageSelectOptions',
        ];

        foreach ($methods as $method) {
            Assert::assertTrue(
                method_exists(CanPaginate::class, $method),
                "Method {$method} should exist in CanPaginate trait"
            );
        }
    });

    test('default pagination options return array', function (): void {
        $options = (new CanPaginateHarness)->exposeOptions();
        Assert::assertEquals([10, 25, 50], $options);
    });
});
