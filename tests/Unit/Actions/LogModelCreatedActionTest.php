<?php

declare(strict_types=1);

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('LogModelCreatedAction can execute for a model', function (): void {
    $model = UserFactory::new()->createOne();
    $action = new LogModelCreatedAction;
    $activity = $action->execute($model);

    Assert::assertSame($model->getKey(), $activity->subject_id);
});

test('LogModelCreatedAction accepts any Eloquent model', function (): void {
    $model = new class extends Model
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
    $action = new LogModelCreatedAction;
    $activity = $action->execute($model);

    Assert::assertSame('created', $activity->event);
});
