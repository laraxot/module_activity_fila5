<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\ValueObject\PhpVersion;

>>>>>>> 35d8cf69 (Initial commit)
/**
 * Standard Rector Configuration for Laravel Modules
 *
 * Minimal configuration compatible with base Rector installation
 * Updated: 2025-11-24
 */
<<<<<<< HEAD
return static function ($rectorConfig): void {
=======
return static function (RectorConfig $rectorConfig): void {
>>>>>>> 35d8cf69 (Initial commit)
    // Paths to analyze
    $rectorConfig->paths([
        __DIR__,
    ]);

    // Paths to skip
    $rectorConfig->skip([
        __DIR__.'/vendor',
        __DIR__.'/docs',
        __DIR__.'/tests/coverage',
    ]);

    // PHP version target
<<<<<<< HEAD
    $rectorConfig->phpVersion(80100);

    // Rule sets
    $rectorConfig->sets([
        __DIR__ . '/../../vendor/rector/rector/config/set/level/up-to-php81.php',
        'code-quality',
        'dead-code',
        'early-return',
=======
    $rectorConfig->phpVersion(PhpVersion::PHP_81);

    // Rule sets
    $rectorConfig->sets([
        // PHP 8.1 compatibility
        LevelSetList::UP_TO_PHP_81,

        // Code quality improvements
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,
>>>>>>> 35d8cf69 (Initial commit)

        // Type declarations (commented - enable carefully)
        // SetList::TYPE_DECLARATION,

        // Coding style
        // SetList::CODING_STYLE,
    ]);

    // Import names for cleaner code
    $rectorConfig->importNames();

    // Import short classes
    $rectorConfig->importShortClasses(false);
};
