<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
use Illuminate\Database\Schema\Blueprint;
use Modules\Activity\Models\Snapshot;
use Modules\Xot\Database\Migrations\XotBaseMigration;

<<<<<<< HEAD
return new class extends XotBaseMigration
=======
return new class() extends XotBaseMigration
>>>>>>> laraxot/dev
{
    protected ?string $model_class = Snapshot::class;

    public function up(): void
    {
        $this->tableCreate(
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->uuid('aggregate_uuid');
                $table->unsignedInteger('aggregate_version');
                $table->jsonb('state');
                $table->index('aggregate_uuid');
            },
        );

        $this->tableUpdate(
            function (Blueprint $table) {
                $this->updateTimestamps($table, false);
            },
        );
    }
};
