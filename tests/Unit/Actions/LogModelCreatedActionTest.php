<?php

declare(strict_types=1);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
uses(TestCase::class);

test('LogModelCreatedAction can be instantiated', function () {
    $model = new class extends Model
<<<<<<< HEAD
=======
=======
uses(\Modules\Activity\Tests\TestCase::class);

test('LogModelCreatedAction can be instantiated', function () {
    $model = new class() extends Model
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
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
<<<<<<< HEAD
    $modelClass = get_class(new class extends Model
=======
<<<<<<< HEAD
    $modelClass = get_class(new class extends Model
=======
    $modelClass = get_class(new class() extends Model
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    });
    $model = new $modelClass(['name' => 'Test']);
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(Model::class, $user);

    $action = new LogModelCreatedAction($model, $user);

    Assert::assertInstanceOf(LogModelCreatedAction::class, $action);
});
