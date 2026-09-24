<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Actions;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Modules\Activity\Actions\ActivityMaintenanceAction;
use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\Activity\Actions\LogModelDeletedAction;
use Modules\Activity\Actions\LogModelUpdatedAction;
use Modules\Activity\Actions\LogUserLoginAction;
use Modules\Activity\Actions\LogUserLogoutAction;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

test('ActivityMaintenanceAction rifiuta giorni non positivi', function (): void {
<<<<<<< .merge_file_afrlKq
<<<<<<< HEAD
<<<<<<< .merge_file_n4hQ1n
=======
>>>>>>> a95e8f36 (.)
    expect(fn (): int => (new ActivityMaintenanceAction())->execute(0))
        ->toThrow(InvalidArgumentException::class, 'Days must be positive');

    expect(fn (): int => (new ActivityMaintenanceAction())->execute(-5))
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_PNoA3Y
    expect(fn (): int => (new ActivityMaintenanceAction)->execute(0))
        ->toThrow(InvalidArgumentException::class, 'Days must be positive');

    expect(fn (): int => (new ActivityMaintenanceAction)->execute(-5))
<<<<<<< .merge_file_afrlKq
>>>>>>> .merge_file_QUchmr
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_PNoA3Y
        ->toThrow(InvalidArgumentException::class);
});

test('LogModelCreatedAction accetta model e user opzionale', function (): void {
<<<<<<< .merge_file_afrlKq
<<<<<<< HEAD
<<<<<<< .merge_file_n4hQ1n
    $model = new class() extends Model
=======
    $model = new class extends Model
>>>>>>> .merge_file_QUchmr
=======
    $model = new class() extends Model
>>>>>>> a95e8f36 (.)
=======
    $model = new class extends Model
>>>>>>> .merge_file_PNoA3Y
    {
        protected $table = 'stub_models';
    };

    $action = new LogModelCreatedAction(model: $model);
    Assert::assertSame($model, $action->model);
    Assert::assertNull($action->user);

<<<<<<< .merge_file_afrlKq
<<<<<<< HEAD
<<<<<<< .merge_file_n4hQ1n
    $user = new class() extends Model
=======
    $user = new class extends Model
>>>>>>> .merge_file_QUchmr
=======
    $user = new class() extends Model
>>>>>>> a95e8f36 (.)
=======
    $user = new class extends Model
>>>>>>> .merge_file_PNoA3Y
    {
        protected $table = 'users';
    };
    $withUser = new LogModelCreatedAction(model: $model, user: $user);
    Assert::assertSame($user, $withUser->user);
});

test('LogModelUpdatedAction e LogModelDeletedAction accettano model', function (): void {
<<<<<<< .merge_file_afrlKq
<<<<<<< HEAD
<<<<<<< .merge_file_n4hQ1n
    $model = new class() extends Model
=======
    $model = new class extends Model
>>>>>>> .merge_file_QUchmr
=======
    $model = new class() extends Model
>>>>>>> a95e8f36 (.)
=======
    $model = new class extends Model
>>>>>>> .merge_file_PNoA3Y
    {
        protected $table = 'stub_models';

        /** @var array<string, mixed> */
        protected $attributes = ['name' => 'test'];
    };

    $updated = new LogModelUpdatedAction(model: $model);
    Assert::assertSame($model, $updated->model);

    $deleted = new LogModelDeletedAction(model: $model);
    Assert::assertSame($model, $deleted->model);
});

test('LogUserLoginAction e LogUserLogoutAction accettano User', function (): void {
<<<<<<< .merge_file_afrlKq
<<<<<<< HEAD
<<<<<<< .merge_file_n4hQ1n
    $user = new User();
=======
    $user = new User;
>>>>>>> .merge_file_QUchmr
=======
    $user = new User();
>>>>>>> a95e8f36 (.)
=======
    $user = new User;
>>>>>>> .merge_file_PNoA3Y

    $login = new LogUserLoginAction(user: $user);
    Assert::assertSame($user, $login->user);

    $logout = new LogUserLogoutAction(user: $user);
    Assert::assertSame($user, $logout->user);
});
