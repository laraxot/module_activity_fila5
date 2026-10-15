<?php

declare(strict_types=1);
use Modules\Activity\tests\TestCase;
use Modules\Xot\tests\XotBasePest;

it('uses the correct TestCase class', function () {
    /** @var TestCase $this */
    $this->assertInstanceOf(TestCase::class, $this);
});
