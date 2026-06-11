<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Activity\Filament\Resources\ActivityResource\Pages\EditActivity;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;

class EditActivityTest extends TestCase
{
    #[Test]
    public function edit_activity_has_correct_resource(): void
    {
        $page = new EditActivity;
        Assert::assertEquals(
            ActivityResource::class,
            $page::getResource()
        );
    }
}
