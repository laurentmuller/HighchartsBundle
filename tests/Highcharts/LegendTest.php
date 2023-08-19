<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\Highchart;
use Ob\HighchartsBundle\Tests\AbstractChartTestCase;

/**
 * This class hold Unit Tests for the legend option.
 */
class LegendTest extends AbstractChartTestCase
{
    /**
     * Align option (left/center/right).
     */
    public function testAlign(): void
    {
        $chart = new Highchart();
        $chart->legend->align('left');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/legend: \{"align":"left"\}/'
        );
        $chart->legend->align('center');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/legend: \{"align":"center"\}/'
        );
        $chart->legend->align('right');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/legend: \{"align":"right"\}/'
        );
    }

    /**
     * Enabled option (true/false).
     */
    public function testEnabledDisabled(): void
    {
        $chart = new Highchart();
        $chart->legend->enabled(false);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/legend: \{"enabled":false\}/'
        );
        $chart->legend->enabled(true);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/legend: \{"enabled":true\}/'
        );
    }

    /**
     * Layout option (horizontal/vertical).
     */
    public function testLayout(): void
    {
        $chart = new Highchart();
        $chart->legend->layout('horizontal');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/legend: \{"layout":"horizontal"\}/'
        );
        $chart->legend->layout('vertical');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/legend: \{"layout":"vertical"\}/'
        );
    }
}
