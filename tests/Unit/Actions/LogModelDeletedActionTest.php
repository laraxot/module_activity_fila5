<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelDeletedAction;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('LogModelDeletedAction can be instantiated', function () {
    $action = new LogModelDeletedAction;

    Assert::assertInstanceOf(LogModelDeletedAction::class, $action);
});

test('LogModelDeletedAction logs activity with the given user as causer', function () {
    $modelClass = get_class(new class() extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    });
    $model = new $modelClass(['name' => 'Test']);
    $user = UserFactory::new()->createOne();

    $action = new LogModelDeletedAction;
    $activity = $action->execute($model, $user);

    Assert::assertSame('deleted', $activity->event);
    Assert::assertSame($user->getKey(), $activity->causer_id);
});
