<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Illuminate\Contracts\Support\Htmlable;

final class ListLogActivitiesHtmlTitleHarness extends ListLogActivitiesPageHarness
{
    public function getRecordTitle(): Htmlable
    {
<<<<<<< .merge_file_hKemKG
<<<<<<< HEAD
<<<<<<< .merge_file_U73rNp
        return new HtmlableRecordTitle();
=======
        return new HtmlableRecordTitle;
>>>>>>> .merge_file_VEed0F
=======
        return new HtmlableRecordTitle();
>>>>>>> a95e8f36 (.)
=======
        return new HtmlableRecordTitle;
>>>>>>> .merge_file_h8dq68
    }
}
