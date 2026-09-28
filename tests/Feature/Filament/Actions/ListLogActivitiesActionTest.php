<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
use Modules\Activity\Filament\Actions\ListLogActivitiesAction;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesActionTestPage;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesActionTestRecord;
use Modules\Activity\Tests\Fixtures\ListLogActivitiesActionTestResource;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> laraxot/dev

test('action has correct default name', function (): void {
    Assert::assertSame('list_log_activities', ListLogActivitiesAction::getDefaultName());
});

test('action tooltip is translated correctly', function () {
    $action = ListLogActivitiesAction::make();

    Assert::assertSame('list_log_activities', $action->getTooltip());
});

test('action is configured correctly', function (): void {
    $action = ListLogActivitiesAction::make();

    Assert::assertSame('list_log_activities', $action->getName());
    Assert::assertSame('heroicon-o-clock', $action->getIcon());
    Assert::assertSame('gray', $action->getColor());
});

test('action generates correct URL for activity log page', function (): void {
    $action = ListLogActivitiesAction::make();

    $livewire = ListLogActivitiesActionTestPage::usingResource(ListLogActivitiesActionTestResource::class);
<<<<<<< HEAD
    $record = new ListLogActivitiesActionTestRecord;
=======
    $record = new ListLogActivitiesActionTestRecord();
>>>>>>> laraxot/dev

    $action->livewire($livewire);
    $action->record($record);

    $url = $action->getUrl();
    Assert::assertNotNull($url);
    Assert::assertStringContainsString('log-activity', $url);
    Assert::assertStringContainsString('test-record-key', $url);
});
