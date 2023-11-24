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
        // render with jquery
        $this->assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $extension->chart($chart)
        );
        // render with jquery explicitly
        $this->assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $extension->chart($chart, 'jquery')
        );
        // render with mootools
        $this->assertMatchesRegularExpression(
            '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $extension->chart($chart, 'mootools')
        );
    }
}
