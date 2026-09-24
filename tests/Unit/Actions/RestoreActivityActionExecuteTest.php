<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Actions;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\RestoreActivityAction;
use Webmozart\Assert\InvalidArgumentException as AssertInvalidArgumentException;

test('RestoreActivityAction aggiorna il record con le vecchie proprietà', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_Hkgd2e
    $model = new class() extends Model
=======
    $model = new class extends Model
>>>>>>> .merge_file_H8wfmB
=======
    $model = new class() extends Model
>>>>>>> a95e8f36 (.)
    {
        protected $table = 'stub_models';

        /** @var array<string, mixed> */
        public array $updatedAttributes = [];

        /**
         * @param  array<string, mixed>  $attributes
         */
        public function update(array $attributes = [], array $options = []): bool
        {
            $this->updatedAttributes = $attributes;

            return true;
        }
    };

<<<<<<< HEAD
<<<<<<< .merge_file_Hkgd2e
    (new RestoreActivityAction())->execute($model, ['name' => 'Ripristinato', 'status' => 'active']);
=======
    (new RestoreActivityAction)->execute($model, ['name' => 'Ripristinato', 'status' => 'active']);
>>>>>>> .merge_file_H8wfmB
=======
    (new RestoreActivityAction())->execute($model, ['name' => 'Ripristinato', 'status' => 'active']);
>>>>>>> a95e8f36 (.)

    expect($model->updatedAttributes)->toBe(['name' => 'Ripristinato', 'status' => 'active']);
});

test('RestoreActivityAction incapsula eccezioni di update', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_Hkgd2e
    $model = new class() extends Model
=======
    $model = new class extends Model
>>>>>>> .merge_file_H8wfmB
=======
    $model = new class() extends Model
>>>>>>> a95e8f36 (.)
    {
        protected $table = 'stub_models';

        /**
         * @param  array<string, mixed>  $attributes
         */
        public function update(array $attributes = [], array $options = []): bool
        {
            throw new Exception('db error');
        }
    };

    expect(function () use ($model): void {
<<<<<<< HEAD
<<<<<<< .merge_file_Hkgd2e
        (new RestoreActivityAction())->execute($model, ['name' => 'x']);
=======
        (new RestoreActivityAction)->execute($model, ['name' => 'x']);
>>>>>>> .merge_file_H8wfmB
=======
        (new RestoreActivityAction())->execute($model, ['name' => 'x']);
>>>>>>> a95e8f36 (.)
    })->toThrow(Exception::class);
});

test('RestoreActivityAction rifiuta oldProperties vuote', function (): void {
<<<<<<< HEAD
<<<<<<< .merge_file_Hkgd2e
    $model = new class() extends Model
=======
    $model = new class extends Model
>>>>>>> .merge_file_H8wfmB
=======
    $model = new class() extends Model
>>>>>>> a95e8f36 (.)
    {
        protected $table = 'stub_models';
    };

    expect(function () use ($model): void {
<<<<<<< HEAD
<<<<<<< .merge_file_Hkgd2e
        (new RestoreActivityAction())->execute($model, []);
=======
        (new RestoreActivityAction)->execute($model, []);
>>>>>>> .merge_file_H8wfmB
=======
        (new RestoreActivityAction())->execute($model, []);
>>>>>>> a95e8f36 (.)
    })->toThrow(AssertInvalidArgumentException::class);
});
