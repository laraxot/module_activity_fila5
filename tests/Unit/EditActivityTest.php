<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Activity\Filament\Resources\ActivityResource\Pages\EditActivity;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
uses(TestCase::class);

describe('Edit Activity', function (): void {
    test('edit activity has correct resource', function (): void {
        $page = new EditActivity;
<<<<<<< HEAD
=======
=======
uses(\Modules\Activity\Tests\TestCase::class);

describe('Edit Activity', function (): void {
    test('edit activity has correct resource', function (): void {
$page = new EditActivity;
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
        Assert::assertEquals(
            ActivityResource::class,
            $page::getResource()
        );
    });
});
