<?php

declare(strict_types=1);

/*
 * Bootstrap Pest — modulo Activity.
 *
 * Nessun binding globale: ogni file di test dichiara da solo il proprio
 * TestCase con la forma nuda `\Modules\Activity\Tests\TestCase::class`.
 *
 * Il binding per cartella (pest()->extend->in / uses->in) e' vietato qui:
 * lega una directory a un TestCase e fa esplodere con
 * Pest\Exceptions\TestCaseAlreadyInUse ogni file che dichiara il proprio.
 *
 * @see laravel/Modules/Xot/docs/wiki/concepts/pest5-configuring-tests.md
 */
