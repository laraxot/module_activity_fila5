<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelUpdatedAction;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('LogModelUpdatedAction can be instantiated', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $action = new LogModelUpdatedAction;

    Assert::assertInstanceOf(LogModelUpdatedAction::class, $action);
});

test('LogModelUpdatedAction logs activity with the given user as causer', function () {
    $modelClass = get_class(new class() extends Model
=======
    $model = new class extends Model
>>>>>>> 0a02158a (.)
=======
    $model = new class extends Model
>>>>>>> 35d8cf69 (Initial commit)
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
<<<<<<< HEAD
<<<<<<< HEAD
    });
    $model = new $modelClass(['name' => 'Test']);
    $user = UserFactory::new()->createOne();

    $action = new LogModelUpdatedAction;
    $activity = $action->execute($model, $user);

    Assert::assertSame('updated', $activity->event);
    Assert::assertSame($user->getKey(), $activity->causer_id);
=======
=======
>>>>>>> 35d8cf69 (Initial commit)
    };
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(Model::class, $user);

    $action = new LogModelUpdatedAction($model, $user);

    Assert::assertSame($user, $action->user);
<<<<<<< HEAD
>>>>>>> 0a02158a (.)
=======
>>>>>>> 35d8cf69 (Initial commit)
});
