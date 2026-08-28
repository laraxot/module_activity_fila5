<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Activity\Filament\Resources\ActivityResource\Pages\EditActivity;
use PHPUnit\Framework\Assert;

describe('Edit Activity', function (): void {
    test('edit activity has correct resource', function (): void {
        $page = new EditActivity();
        Assert::assertEquals(
            ActivityResource::class,
            $page::getResource()
        );
    });
});
