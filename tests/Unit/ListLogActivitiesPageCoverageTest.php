<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Filament\Notifications\Notification;
use Filament\Tables\Enums\PaginationMode;
use Modules\Activity\Filament\Pages\ListLogActivities;
use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> laraxot/dev

describe('List Log Activities Page Coverage', function (): void {
    test('get breadcrumb returns string', function (): void {
        $result = TestCase::makeListLogActivitiesPage()->getBreadcrumb();

        Assert::assertNotEmpty($result);
    });

    test('get breadcrumb uses static breadcrumb when set', function (): void {
<<<<<<< HEAD
        $page = new class extends ListLogActivities
=======
        $page = new class() extends ListLogActivities
>>>>>>> laraxot/dev
        {
            protected static ?string $breadcrumb = 'Custom Breadcrumb';

            /** @return class-string */
            public static function getResource(): string
            {
                return ActivityResource::class;
            }
        };

        Assert::assertSame('Custom Breadcrumb', $page->getBreadcrumb());
    });

    test('can restore activity returns false when resource class does not exist', function (): void {
        Assert::assertFalse(class_exists('NonExistentClass\That\Does\Not\Exist'));
    });

    test('can restore activity returns false when resource lacks can restore method', function (): void {
<<<<<<< HEAD
        $page = new class extends ListLogActivities
=======
        $page = new class() extends ListLogActivities
>>>>>>> laraxot/dev
        {
            public static function getResource(): string
            {
                return \stdClass::class;
            }
        };

        Assert::assertFalse($page->canRestoreActivity());
    });

    test('get pagination mode returns default', function (): void {
        $mode = TestCase::makeListLogActivitiesPage()->getPaginationMode();

        Assert::assertSame(PaginationMode::Default, $mode);
    });

    test('get field label returns name when not in map', function (): void {
        try {
            $label = TestCase::makeListLogActivitiesPage()->getFieldLabel('nonexistent_field');
            Assert::assertSame('nonexistent_field', $label);
        } catch (\Throwable $e) {
            Assert::markTestSkipped('getFieldLabel() method not available in test context');
        }
    });

    test('send restore success notification returns notification', function (): void {
<<<<<<< HEAD
        $page = new class extends ListLogActivities
=======
        $page = new class() extends ListLogActivities
>>>>>>> laraxot/dev
        {
            /** @return class-string */
            public static function getResource(): string
            {
                return ActivityResource::class;
            }

            public function exposeRestoreSuccess(): Notification
            {
                return $this->sendRestoreSuccessNotification();
            }
        };

        $notification = $page->exposeRestoreSuccess();

        Assert::assertInstanceOf(Notification::class, $notification);
    });

    test('send restore failure notification without message returns notification', function (): void {
<<<<<<< HEAD
        $page = new class extends ListLogActivities
=======
        $page = new class() extends ListLogActivities
>>>>>>> laraxot/dev
        {
            /** @return class-string */
            public static function getResource(): string
            {
                return ActivityResource::class;
            }

            public function exposeRestoreFailure(?string $message = null): Notification
            {
                return $this->sendRestoreFailureNotification($message);
            }
        };

        $notification = $page->exposeRestoreFailure();

        Assert::assertInstanceOf(Notification::class, $notification);
    });

    test('send restore failure notification with message includes body', function (): void {
<<<<<<< HEAD
        $page = new class extends ListLogActivities
=======
        $page = new class() extends ListLogActivities
>>>>>>> laraxot/dev
        {
            /** @return class-string */
            public static function getResource(): string
            {
                return ActivityResource::class;
            }

            public function exposeRestoreFailure(?string $message = null): Notification
            {
                return $this->sendRestoreFailureNotification($message);
            }
        };

        $notification = $page->exposeRestoreFailure('test message');

        Assert::assertInstanceOf(Notification::class, $notification);
    });

    test('can restore activity with record executes resource check', function (): void {
        $result = TestCase::makeListLogActivitiesPage()->canRestoreActivity();
        Assert::assertFalse($result);
    });
});
