<?php

declare(strict_types=1);

<<<<<<< .merge_file_yK5TjM
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> .merge_file_MBlu46
use Modules\Activity\Actions\LogModelDeletedAction;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);

<<<<<<< .merge_file_yK5TjM
test('LogModelDeletedAction can execute for a model', function (): void {
    $model = UserFactory::new()->createOne();
    $action = new LogModelDeletedAction;
    $activity = $action->execute($model);
=======
test('LogModelDeletedAction can be instantiated', function () {
    $model = new class() extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(Model::class, $user);

    $action = new LogModelDeletedAction($model, $user);
>>>>>>> .merge_file_MBlu46

    Assert::assertSame($model->getKey(), $activity->subject_id);
});
