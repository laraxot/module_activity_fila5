<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Actions;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Actions\RestoreActivityAction;
use Modules\Activity\Tests\TestCase;
use Webmozart\Assert\InvalidArgumentException as AssertInvalidArgumentException;

uses(TestCase::class);

test('RestoreActivityAction aggiorna il record con le vecchie proprietà', function (): void {
    $model = new class() extends Model
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

    (new RestoreActivityAction())->execute($model, ['name' => 'Ripristinato', 'status' => 'active']);

    expect($model->updatedAttributes)->toBe(['name' => 'Ripristinato', 'status' => 'active']);
});

test('RestoreActivityAction incapsula eccezioni di update', function (): void {
    $model = new class() extends Model
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

    $this->expectException(Exception::class);

    (new RestoreActivityAction())->execute($model, ['name' => 'x']);
});

test('RestoreActivityAction rifiuta oldProperties vuote', function (): void {
    $model = new class() extends Model
    {
        protected $table = 'stub_models';
    };

    $this->expectException(AssertInvalidArgumentException::class);

    (new RestoreActivityAction())->execute($model, []);
});
