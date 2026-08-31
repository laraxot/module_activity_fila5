<?php

declare(strict_types=1);

use Modules\Activity\Tests\TestCase;

/*
 * Bootstrap Pest — modulo Activity.
 *
 * `pest()->extend(TestCase::class)->in(...)` è la forma **consigliata** (XOT-5.41).
 * Non duplicare `uses(\Modules\Activity\Tests\TestCase::class)` nei file:
 * XOR → TestCaseAlreadyInUse.
 *
 * @see laravel/Modules/Xot/docs/wiki/concepts/pest5-configuring-tests.md
 */
pest()->extend(TestCase::class)->in(__DIR__.'/Unit', __DIR__.'/Feature');
