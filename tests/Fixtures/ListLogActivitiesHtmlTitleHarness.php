<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Fixtures;

use Illuminate\Contracts\Support\Htmlable;

final class ListLogActivitiesHtmlTitleHarness extends ListLogActivitiesPageHarness
{
    public function getRecordTitle(): Htmlable
    {
        return new HtmlableRecordTitle;
    }
}
