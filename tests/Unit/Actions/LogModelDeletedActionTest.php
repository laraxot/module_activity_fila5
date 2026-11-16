<?php

declare(strict_types=1);

use Modules\Activity\Actions\LogModelDeletedAction;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\Fixtures\LogModelDeletedActionTestModel;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('LogModelDeletedAction execute persiste deleted con subject e causer', function (): void {
    $model = new LogModelDeletedActionTestModel;
    $model->forceFill(['id' => 'deleted-1', 'name' => 'Deleted']);
    $model->exists = true;

    $user = new User;
    $user->forceFill([
        'id' => 'causer-deleted-1',
        'name' => 'Causer',
        'email' => 'causer-deleted-1@example.test',
    ]);
    $user->exists = true;

    $activity = (new LogModelDeletedAction($model, $user))->execute();

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('deleted', $activity->event);
    $subjectKey = $model->getKey();
    Assert::assertTrue(is_scalar($subjectKey));
    Assert::assertTrue(is_scalar($activity->subject_id));
    Assert::assertSame((string) $subjectKey, (string) $activity->subject_id);
    Assert::assertSame((string) $user->id, (string) $activity->causer_id);
});
