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

namespace HighchartsBundle\Tests\Twig;

use HighchartsBundle\Highcharts\Highchart;
use HighchartsBundle\Twig\HighchartsExtension;
use PHPUnit\Framework\TestCase;

/**
 * This class hold Unit Tests for the Twig extension.
 */
class TwigTest extends TestCase
{
    /**
     * Chart rendering using the twig extension.
     */
    public function testTwigExtension(): void
    {
        $chart = new Highchart();
        $extension = new HighchartsExtension();
        // render with jquery (default)
        $actual = $extension->chart($chart);
        self::assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );

        // render with jquery explicitly
        $actual = $extension->chart($chart, 'jquery');
        self::assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );

        // render with mootools
        $actual = $extension->chart($chart, 'mootools');
        self::assertMatchesRegularExpression(
            '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );
    }

    public function testTwigFunctions(): void
    {
        $extension = new HighchartsExtension();
        $functions = $extension->getFunctions();
        self::assertCount(1, $functions);
        self::assertArrayHasKey(0, $functions);
        $function = $functions[0];
        self::assertSame('chart', $function->getName());
    }
}
