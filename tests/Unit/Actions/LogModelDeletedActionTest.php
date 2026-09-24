<?php

declare(strict_types=1);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelDeletedAction;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
uses(TestCase::class);

test('LogModelDeletedAction can be instantiated', function () {
    $model = new class extends Model
<<<<<<< HEAD
=======
=======
uses(\Modules\Activity\Tests\TestCase::class);

test('LogModelDeletedAction can be instantiated', function () {
    $model = new class() extends Model
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(Model::class, $user);

    $action = new LogModelDeletedAction($model, $user);

    Assert::assertSame($user, $action->user);
});
