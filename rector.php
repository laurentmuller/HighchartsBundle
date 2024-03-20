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

use Rector\Config\RectorConfig;
use Rector\PHPUnit\CodeQuality\Rector\Class_\AddSeeTestAnnotationRector;
use Rector\PHPUnit\CodeQuality\Rector\Class_\PreferPHPUnitThisCallRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;
use Rector\Symfony\Set\SymfonySetList;
use Rector\Symfony\Set\TwigSetList;

return RectorConfig::configure()
    ->withBootstrapFiles([
        __DIR__ . '/vendor/autoload.php',
    ])->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
        __DIR__ . '/rector.php',
    ])->withSkip([
        AddSeeTestAnnotationRector::class,
        PreferPHPUnitThisCallRector::class,
        DisallowedEmptyRuleFixerRector::class,
    ])->withSets([
        // global
        SetList::PHP_82,
        SetList::CODE_QUALITY,
        // PHP-Unit
        PHPUnitSetList::PHPUNIT_100,
        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
        PHPUnitSetList::ANNOTATIONS_TO_ATTRIBUTES,
        // Symfony
        SymfonySetList::SYMFONY_63,
        SymfonySetList::SYMFONY_CODE_QUALITY,
        SymfonySetList::ANNOTATIONS_TO_ATTRIBUTES,
        SymfonySetList::SYMFONY_CONSTRUCTOR_INJECTION,
        // twig
        TwigSetList::TWIG_240,
        TwigSetList::TWIG_UNDERSCORE_TO_NAMESPACE,
    ]);
