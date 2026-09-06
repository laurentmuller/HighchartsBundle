<?php

/*
 * This file is part of the HighchartsBundle package.
 *
 * (c) bibi.nu <bibi@bibi.nu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Rector\CodingStyle\Rector\Catch_\CatchExceptionNameMatchingTypeRector;
use Rector\CodingStyle\Rector\ClassLike\NewlineBetweenClassLikeStmtsRector;
use Rector\CodingStyle\Rector\ClassMethod\NewlineBeforeNewAssignSetRector;
use Rector\CodingStyle\Rector\Stmt\NewlineAfterStatementRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveParentDelegatingConstructorRector;
use Rector\PHPUnit\CodeQuality\Rector\Class_\PreferPHPUnitThisCallRector;
use Rector\PHPUnit\CodeQuality\Rector\ClassMethod\NoSetupWithParentCallOverrideRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\SetList;

$paths = [
    __DIR__ . '/src',
    __DIR__ . '/tests',
    __DIR__ . '/rector.php',
];

$skip = [
    // allow self::functions for PHP unit
    PreferPHPUnitThisCallRector::class,
    // no space before or after statements
    NewlineAfterStatementRector::class,
    NewlineBeforeNewAssignSetRector::class,
    // don't separate constants
    NewlineBetweenClassLikeStmtsRector::class,
    // don't rename exception
    CatchExceptionNameMatchingTypeRector::class,
    // allow delegate constructor
    RemoveParentDelegatingConstructorRector::class,
    // allow override attribute for setUp method in tests
    NoSetupWithParentCallOverrideRector::class,
];

$sets = [
    // global
    SetList::CODE_QUALITY,
    SetList::CODING_STYLE,
    SetList::DEAD_CODE,
    SetList::PRIVATIZATION,
    SetList::TYPE_DECLARATION,
    // PHP-Unit
    PHPUnitSetList::PHPUNIT_CODE_QUALITY,
    PHPUnitSetList::PHPUNIT_MOCK_TO_STUB,
    PHPUnitSetList::PHPUNIT_NARROW_ASSERTS,
];

return RectorConfig::configure()
    ->withCache(__DIR__ . '/cache/rector')
    ->withRootFiles()
    ->reportUnusedSkips()
    ->withPhpSets(php83: true)
    ->withPaths($paths)
    ->withSkip($skip)
    ->withSets($sets)
    ->withComposerBased(
        twig: true,
        phpunit: true,
        symfony: true,
    )->withAttributesSets(
        symfony: true,
        phpunit: true
    );
