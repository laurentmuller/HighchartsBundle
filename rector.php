<?php
/*
 * This file is part of the Calculation package.
 *
 * (c) bibi.nu <bibi@bibi.nu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;
use Rector\Symfony\Set\TwigSetList;

return static function (RectorConfig $rectorConfig): void {
    // bootstrap files
    $rectorConfig->bootstrapFiles([__DIR__ . '/vendor/autoload.php']);

    // paths
    $rectorConfig->paths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

    // rules to skip
    $rectorConfig->skip([
        Rector\PHPUnit\Rector\Class_\AddSeeTestAnnotationRector::class,
        Rector\CodeQuality\Rector\PropertyFetch\ExplicitMethodCallOverMagicGetSetRector::class => [
            __DIR__ . '/Tests/Highcharts/ChartOptionTest.php',
        ],
    ]);

    // rules to apply
    $rectorConfig->sets([
        // global
        SetList::PHP_82,
        SetList::CODE_QUALITY,
        // PHP-Unit
        PHPUnitSetList::PHPUNIT_100,
        PHPUnitSetList::PHPUNIT_EXCEPTION,
        PHPUnitSetList::PHPUNIT_CODE_QUALITY,
        PHPUnitSetList::ANNOTATIONS_TO_ATTRIBUTES,
        // Symfony
        SymfonySetList::SYMFONY_62,
        SymfonySetList::SYMFONY_CODE_QUALITY,
        SymfonySetList::ANNOTATIONS_TO_ATTRIBUTES,
        SymfonySetList::SYMFONY_CONSTRUCTOR_INJECTION,
        // twig
        TwigSetList::TWIG_240,
        TwigSetList::TWIG_UNDERSCORE_TO_NAMESPACE,
    ]);
};