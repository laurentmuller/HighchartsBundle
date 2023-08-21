<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Twig;

use Ob\HighchartsBundle\Highcharts\Highchart;
use Ob\HighchartsBundle\Twig\HighchartsExtension;
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
