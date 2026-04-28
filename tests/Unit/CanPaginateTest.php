<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Filament\Pages\Concerns\CanPaginate;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CanPaginateTest extends TestCase
{
    #[Test]
    public function trait_exists(): void
    {
        // @var mixed assertTrue(trait_exists(CanPaginate::class;
    }

    #[Test]
    public function trait_has_pagination_methods(): void
    {
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
            // @var mixed assertTrue(
                method_exists(CanPaginate::class, $method),
                "Method {$method} should exist in CanPaginate trait"
            );
        }
    }

    #[Test]
    public function default_pagination_options_return_array(): void
    {
        // Test the default pagination options via reflection
        $trait = new class {
            use CanPaginate;

            public function testGetRecordsPerPageSelectOptions(): array
            {
                return // @var mixed getRecordsPerPageSelectOptions(;
            }
        };

        $options = $trait->testGetRecordsPerPageSelectOptions();
        // @var mixed assertEquals([10, 25, 50], $options;
    }
}
