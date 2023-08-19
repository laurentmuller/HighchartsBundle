<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\Highchart;
use Ob\HighchartsBundle\Tests\AbstractChartTestCase;

/**
 * This class hold Unit Tests for the pane option.
 */
class PaneTest extends AbstractChartTestCase
{
    public function testBackground(): void
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    public function testCenter(): void
    {
        $chart = new Highchart();
        // pixel based
        $chart->pane->center([50, 100]);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/pane: \{"center":\[50,100\]\}/'
        );
        // percentage based
        $chart->pane->center(['50%', '40%']);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/pane: \{"center":\["50%","40%"\]\}/'
        );
    }

    public function testEndAngle(): void
    {
        $chart = new Highchart();
        $chart->pane->endAngle(5);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/pane: \{"endAngle":5\}/'
        );
    }

    public function testStartAngle(): void
    {
        $chart = new Highchart();
        $chart->pane->startAngle(5);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/pane: \{"startAngle":5\}/'
        );
    }
}