<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\Highchart;
use Ob\HighchartsBundle\Tests\AbstractChartTestCase;

/**
 * This class hold Unit Tests for the Highchart Class.
 */
class HighchartTest extends AbstractChartTestCase
{
    /**
     * Render chart using jQuery.
     */
    public function testJquery(): void
    {
        $chart = new Highchart();
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*var chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/'
        );
    }

    /**
     * Render chart using Mootools.
     */
    public function testMooTools(): void
    {
        $chart = new Highchart();
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*var chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            'mootools'
        );
    }

    /**
     * Render chart without library wrapper.
     */
    public function testNoEngine(): void
    {
        $chart = new Highchart();
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/var chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);/',
            ''
        );
    }

    /**
     * Magic getters and setters.
     */
    public function testSetGet(): void
    {
        $chart = new Highchart();
        $chart->credits->enabled(false);
        $this->assertFalse($chart->credits->enabled);
        $chart->credits->enabled(true);
        $this->assertTrue($chart->credits->enabled);
    }
}
