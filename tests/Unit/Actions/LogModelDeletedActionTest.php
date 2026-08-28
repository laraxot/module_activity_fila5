<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelDeletedAction;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;

test('LogModelDeletedAction can be instantiated', function () {
    $model = new class() extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(Model::class, $user);

    $action = new LogModelDeletedAction($model, $user);

    Assert::assertSame($user, $action->user);
});
