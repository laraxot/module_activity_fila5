<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Filament\Actions\ListLogActivitiesAction;
use Modules\Activity\Tests\TestCase;
use Modules\Xot\Filament\Actions\XotBaseAction;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
uses(TestCase::class);

describe('List Log Activities Action', function (): void {
    test('_extends_xot_base_action', function (): void {
        $action = new ListLogActivitiesAction('test');
<<<<<<< HEAD
=======
=======
uses(\Modules\Activity\Tests\TestCase::class);

describe('List Log Activities Action', function (): void {
    test('_extends_xot_base_action', function (): void {
$action = new ListLogActivitiesAction('test');
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
        Assert::assertInstanceOf(XotBaseAction::class, $action);
    });

    test('_has_correct_default_name', function (): void {
<<<<<<< HEAD
        $action = new ListLogActivitiesAction('list_log_activities');
=======
<<<<<<< HEAD
        $action = new ListLogActivitiesAction('list_log_activities');
=======
$action = new ListLogActivitiesAction('list_log_activities');
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
        Assert::assertEquals('list_log_activities', $action->getDefaultName());
    });

    test('_is_icon_button', function (): void {
<<<<<<< HEAD
        $action = ListLogActivitiesAction::make('test');
=======
<<<<<<< HEAD
        $action = ListLogActivitiesAction::make('test');
=======
$action = ListLogActivitiesAction::make('test');
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
        // The setUp method configures iconButton
        Assert::assertTrue($action->isIconButton());
    });

    test('_has_heroicon_o_clock_icon', function (): void {
<<<<<<< HEAD
        $action = ListLogActivitiesAction::make('test');
=======
<<<<<<< HEAD
        $action = ListLogActivitiesAction::make('test');
=======
$action = ListLogActivitiesAction::make('test');
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
        // Check icon was set in setUp
        $icon = $action->getIcon();
        Assert::assertEquals('heroicon-o-clock', $icon);
    });

    test('_has_gray_color', function (): void {
<<<<<<< HEAD
        $action = ListLogActivitiesAction::make('test');
=======
<<<<<<< HEAD
        $action = ListLogActivitiesAction::make('test');
=======
$action = ListLogActivitiesAction::make('test');
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
        $color = $action->getColor();
        Assert::assertEquals('gray', $color);
    });
});
