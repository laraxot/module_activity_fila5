<?php
namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Tests\TestCase;
use Modules\Activity\Models\Activity;

it('has main model class', function () {
    expect(class_exists(Activity::class))->toBeTrue();
});
