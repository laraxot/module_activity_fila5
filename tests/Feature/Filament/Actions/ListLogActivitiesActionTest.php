<?php

declare(strict_types=1);
use Modules\Activity\Filament\Actions\ListLogActivitiesAction;
use Tests\Modules\Activity\Fixtures\ListLogActivitiesActionTestPage;
use Tests\Modules\Activity\Fixtures\ListLogActivitiesActionTestRecord;
use Tests\Modules\Activity\Fixtures\ListLogActivitiesActionTestResource;
use Tests\Modules\Activity\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

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
    $record = new ListLogActivitiesActionTestRecord;

    $action->livewire($livewire);
    $action->record($record);

    $url = $action->getUrl();
    Assert::assertNotNull($url);
    Assert::assertStringContainsString('log-activity', $url);
    Assert::assertStringContainsString('test-record-key', $url);
});
