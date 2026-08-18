<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('LogModelCreatedAction can be instantiated', function () {
<<<<<<< HEAD
    $action = new LogModelCreatedAction;

    Assert::assertInstanceOf(LogModelCreatedAction::class, $action);
});

test('LogModelCreatedAction can execute', function () {
    $modelClass = get_class(new class() extends Model
=======
    $model = new class extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(Model::class, $user);

    $action = new LogModelCreatedAction($model, $user);

    Assert::assertSame($user, $action->user);
});

test('LogModelCreatedAction can execute', function () {
    $modelClass = get_class(new class extends Model
>>>>>>> 0a02158a (.)
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    });
    $model = new $modelClass(['name' => 'Test']);
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(Model::class, $user);

<<<<<<< HEAD
    $action = new LogModelCreatedAction;
    $activity = $action->execute($model, $user);

    Assert::assertSame('created', $activity->event);
    Assert::assertSame($user->getKey(), $activity->causer_id);
=======
    $action = new LogModelCreatedAction($model, $user);

    Assert::assertInstanceOf(LogModelCreatedAction::class, $action);
>>>>>>> 0a02158a (.)
});
