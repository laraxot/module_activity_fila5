<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

<<<<<<< HEAD
=======
<<<<<<< .merge_file_e4lpAG
<<<<<<< HEAD
<<<<<<< .merge_file_g2Nn1V
=======
>>>>>>> a95e8f36 (.)
final class ListLogActivitiesNonSchemaFormResource
{
    public static function form(mixed $schema): object
    {
        return new \stdClass();
    }

    public static function canRestore(mixed $record): bool
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_I8erai
>>>>>>> laraxot/dev
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

final class ListLogActivitiesNonSchemaFormResource
{
    public static function form(Schema $schema): object
    {
        return new \stdClass;
    }

    public static function canRestore(Model $record): bool
<<<<<<< HEAD
=======
<<<<<<< .merge_file_e4lpAG
>>>>>>> .merge_file_2EtWpe
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_I8erai
>>>>>>> laraxot/dev
    {
        return false;
    }
}
