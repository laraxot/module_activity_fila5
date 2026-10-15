<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Unit;

use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Activity\Filament\Resources\ActivityResource\Pages\EditActivity;
use Tests\Modules\Activity\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Edit Activity', function (): void {
    test('edit activity has correct resource', function (): void {
        $page = new EditActivity;
        Assert::assertEquals(
            ActivityResource::class,
            $page::getResource()
        );
    });
});
