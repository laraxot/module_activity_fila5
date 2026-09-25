<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Activity\Models\TestModel;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
return new class () extends XotBaseMigration {
=======
return new class extends XotBaseMigration
{
>>>>>>> laraxot/dev
    protected ?string $model_class = TestModel::class;

    public function up(): void
    {
        $this->tableCreate(function (Blueprint $table): void {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }
};
