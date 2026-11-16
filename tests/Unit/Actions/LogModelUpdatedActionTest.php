<?php

declare(strict_types=1);

<<<<<<< .merge_file_WbYfjs
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> .merge_file_YbaH57
use Modules\Activity\Actions\LogModelUpdatedAction;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);

<<<<<<< .merge_file_WbYfjs
test('LogModelUpdatedAction can execute for a model', function (): void {
    $model = UserFactory::new()->createOne();
    $action = new LogModelUpdatedAction;
    $activity = $action->execute($model);
=======
test('LogModelUpdatedAction can be instantiated', function () {
    $model = new class() extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(Model::class, $user);

    $action = new LogModelUpdatedAction($model, $user);
>>>>>>> .merge_file_YbaH57

    Assert::assertSame($model->getKey(), $activity->subject_id);
});
