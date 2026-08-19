<?php

declare(strict_types=1);

/*
 * Bootstrap Pest — modulo Activity (pilota pest()->extend, story 3.10).
 *
 * Preferibile a require_once PestStubs.php — plugin ufficiali Pest 5
 * forniscono actingAs/livewire a runtime.
 *
 * @see laravel/Modules/Activity/docs/stories/3.10.activity-pest-extend-bootstrap.story.md
 * @see laravel/Modules/Xot/docs/wiki/concepts/pest5-configuring-tests.md
 */

pest()->extend(\Modules\Activity\Tests\TestCase::class)->in('Unit/Bootstrap');
