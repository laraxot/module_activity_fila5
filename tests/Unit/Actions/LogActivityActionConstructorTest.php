<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Actions;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Modules\Activity\Actions\LogActivityAction;
use PHPUnit\Framework\Assert;

test('LogActivityAction rifiuta type vuoto nel costruttore', function (): void {
    expect(fn (): LogActivityAction => new LogActivityAction(type: ''))
        ->toThrow(InvalidArgumentException::class, 'Type cannot be empty');
});

test('LogActivityAction accetta parametri opzionali nel costruttore', function (): void {
<<<<<<< .merge_file_OXqg3w
<<<<<<< HEAD
<<<<<<< .merge_file_XPfzto
    $model = new class() extends Model
=======
    $model = new class extends Model
>>>>>>> .merge_file_JRTtqB
=======
    $model = new class() extends Model
>>>>>>> a95e8f36 (.)
=======
    $model = new class extends Model
>>>>>>> .merge_file_sPpsTD
    {
        protected $table = 'stub_models';
    };

    $action = new LogActivityAction(
        type: 'test_event',
        user: $model,
        subject: $model,
        properties: ['foo' => 'bar'],
        description: 'Descrizione test',
    );

    Assert::assertSame('test_event', $action->type);
    Assert::assertSame($model, $action->user);
    Assert::assertSame($model, $action->subject);
    Assert::assertSame(['foo' => 'bar'], $action->properties);
    Assert::assertSame('Descrizione test', $action->description);
});
