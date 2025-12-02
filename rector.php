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

use Rector\CodingStyle\Rector\ArrowFunction\StaticArrowFunctionRector;
use Rector\CodingStyle\Rector\Catch_\CatchExceptionNameMatchingTypeRector;
use Rector\CodingStyle\Rector\ClassLike\NewlineBetweenClassLikeStmtsRector;
use Rector\CodingStyle\Rector\ClassMethod\NewlineBeforeNewAssignSetRector;
use Rector\CodingStyle\Rector\Closure\StaticClosureRector;
use Rector\CodingStyle\Rector\Stmt\NewlineAfterStatementRector;
use Rector\Config\RectorConfig;
use Rector\PHPUnit\CodeQuality\Rector\Class_\PreferPHPUnitThisCallRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\TwigSetList;

$paths = [
    __DIR__ . '/src',
    __DIR__ . '/tests',
    __DIR__ . '/rector.php',
];

$skip = [
    PreferPHPUnitThisCallRector::class,
    // CODING STYLE
    NewlineAfterStatementRector::class,
    NewlineBeforeNewAssignSetRector::class,
    CatchExceptionNameMatchingTypeRector::class,
    NewlineBetweenClassLikeStmtsRector::class,
];

$sets = [
    // global
    SetList::PHP_82,
    SetList::CODE_QUALITY,
    SetList::CODING_STYLE,
    SetList::DEAD_CODE,
    SetList::INSTANCEOF,
    SetList::PRIVATIZATION,
    SetList::TYPE_DECLARATION,
    // PHP-Unit
    PHPUnitSetList::PHPUNIT_110,
    PHPUnitSetList::PHPUNIT_CODE_QUALITY,
    // twig
    TwigSetList::TWIG_24,
    TwigSetList::TWIG_UNDERSCORE_TO_NAMESPACE,
];

$rules = [
    // static closure and arrow functions
    StaticClosureRector::class,
    StaticArrowFunctionRector::class,
];

return RectorConfig::configure()
    ->withCache(__DIR__ . '/cache/rector')
    ->withRootFiles()
    ->withPaths($paths)
    ->withSkip($skip)
    ->withSets($sets)
    ->withRules($rules)
    ->withComposerBased(
        twig: true,
        phpunit: true,
        symfony: true,
    )->withPhpSets(
        php82: true
    )->withAttributesSets(
        symfony: true,
        phpunit: true
    );
