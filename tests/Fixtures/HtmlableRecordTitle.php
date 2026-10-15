<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Fixtures;

use Illuminate\Contracts\Support\Htmlable;

final class HtmlableRecordTitle implements Htmlable
{
    public function toHtml(): string
    {
        return '<b>HTML</b>';
    }
}
