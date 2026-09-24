<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;

final class ListLogActivitiesMountablePage extends ListLogActivitiesPageHarness
{
    public function resolveRecord(int|string|Model $key): Model
    {
<<<<<<< HEAD
        $subject = new ActivitySubjectHarness;
=======
<<<<<<< .merge_file_9KQLb4
<<<<<<< HEAD
<<<<<<< .merge_file_MGYFYX
        $subject = new ActivitySubjectHarness();
=======
        $subject = new ActivitySubjectHarness;
>>>>>>> .merge_file_iYpXhJ
=======
        $subject = new ActivitySubjectHarness();
>>>>>>> a95e8f36 (.)
=======
        $subject = new ActivitySubjectHarness;
>>>>>>> .merge_file_aHuPql
>>>>>>> laraxot/dev
        $subject->forceFill(['id' => (string) $key, 'name' => 'mounted']);
        $subject->exists = true;

        return $subject;
    }

    public function getDefaultRecordsPerPageSelectOption(): int
    {
        return 10;
    }
}
