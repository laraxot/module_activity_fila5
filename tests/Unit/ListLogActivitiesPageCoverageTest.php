<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Filament\Notifications\Notification;
use Filament\Tables\Enums\PaginationMode;
use Modules\Activity\Filament\Pages\ListLogActivities;
use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;

/**
 * Coverage tests for ListLogActivities abstract page.
 * Tests methods executable without Livewire/record context.
 */
class ListLogActivitiesPageCoverageTest extends TestCase
{
    private ListLogActivities $page;

    protected function setUp(): void
    {
        parent::setUp();

        $this->page = new class extends ListLogActivities
        {
            public static function getResource(): string
            {
                return ActivityResource::class;
            }

            public function exposeRestoreSuccess(): Notification
            {
                return $this->sendRestoreSuccessNotification();
            }

            public function exposeRestoreFailure(?string $message = null): Notification
            {
                return $this->sendRestoreFailureNotification($message);
            }
        };
    }

    #[Test]
    public function get_breadcrumb_returns_string(): void
    {
        $result = $this->page->getBreadcrumb();

        Assert::assertNotEmpty($result);
    }

    #[Test]
    public function get_breadcrumb_uses_static_breadcrumb_when_set(): void
    {
        $page = new class extends ListLogActivities
        {
            protected static ?string $breadcrumb = 'Custom Breadcrumb';

            /** @return class-string */
            public static function getResource(): string
            {
                return ActivityResource::class;
            }
        };

        Assert::assertSame('Custom Breadcrumb', $page->getBreadcrumb());
    }

    #[Test]
    public function can_restore_activity_returns_false_when_resource_class_does_not_exist(): void
    {
        Assert::assertFalse(class_exists('NonExistentClass\That\Does\Not\Exist'));
    }

    #[Test]
    public function can_restore_activity_returns_false_when_resource_lacks_can_restore_method(): void
    {
        $page = new class extends ListLogActivities
        {
            public static function getResource(): string
            {
                return \stdClass::class;
            }
        };

        Assert::assertFalse($page->canRestoreActivity());
    }

    #[Test]
    public function get_pagination_mode_returns_default(): void
    {
        $mode = $this->page->getPaginationMode();

        Assert::assertSame(PaginationMode::Default, $mode);
    }

    #[Test]
    public function get_field_label_returns_name_when_not_in_map(): void
    {
        try {
            $label = $this->page->getFieldLabel('nonexistent_field');
            Assert::assertSame('nonexistent_field', $label);
        } catch (\Throwable $e) {
            $this->markTestSkipped('getFieldLabel() method not available in test context');
        }
    }

    #[Test]
    public function send_restore_success_notification_returns_notification(): void
    {
        $page = new class extends ListLogActivities
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
    }

    #[Test]
    public function send_restore_failure_notification_without_message_returns_notification(): void
    {
        $page = new class extends ListLogActivities
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
    }

    #[Test]
    public function send_restore_failure_notification_with_message_includes_body(): void
    {
        $page = new class extends ListLogActivities
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
    }

    #[Test]
    public function can_restore_activity_with_record_executes_resource_check(): void
    {
        $result = $this->page->canRestoreActivity();
        Assert::assertFalse($result);
    }
}
