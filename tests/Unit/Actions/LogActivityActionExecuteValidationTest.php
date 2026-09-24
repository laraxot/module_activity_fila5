<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Actions;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Modules\Activity\Actions\LogActivityAction;
<<<<<<< HEAD
<<<<<<< .merge_file_3xqlV3

test('LogActivityAction execute rifiuta user non User', function (): void {
    $nonUser = new class() extends Model
=======
use Modules\Activity\Models\Activity;

test('LogActivityAction execute rifiuta user non User', function (): void {
    $nonUser = new class extends Model
>>>>>>> .merge_file_qWiILT
=======

test('LogActivityAction execute rifiuta user non User', function (): void {
    $nonUser = new class() extends Model
>>>>>>> a95e8f36 (.)
    {
        protected $table = 'stub_users';
    };

    $action = new LogActivityAction(
        type: 'test_event',
        user: $nonUser,
    );

<<<<<<< HEAD
<<<<<<< .merge_file_3xqlV3
    expect(fn (): mixed => $action->execute())
=======
    expect(fn (): Activity => $action->execute())
>>>>>>> .merge_file_qWiILT
=======
    expect(fn (): mixed => $action->execute())
>>>>>>> a95e8f36 (.)
        ->toThrow(InvalidArgumentException::class, 'User must be an instance of User');
});

test('LogActivityAction execute accetta user null senza persistenza', function (): void {
    $action = new LogActivityAction(type: 'anonymous_event');

    expect($action->user)->toBeNull();
    expect($action->type)->toBe('anonymous_event');
});
