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

namespace HighchartsBundle\Tests\Highcharts;

use HighchartsBundle\Highcharts\Highchart;
use HighchartsBundle\Tests\AbstractChartTestCase;

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
        $chart->pane['center'] = [50, 100];
        $regex = '/pane: \{"center":\[50,100\]\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        // percentage based
        $chart->pane['center'] = ['50%', '40%'];
        $regex = '/pane: \{"center":\["50%","40%"\]\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    public function testEndAngle(): void
    {
        $chart = new Highchart();
        $chart->pane['endAngle'] = 5;
        $regex = '/pane: \{"endAngle":5\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    public function testStartAngle(): void
    {
        $chart = new Highchart();
        $chart->pane['startAngle'] = 5;
        $regex = '/pane: \{"startAngle":5\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }
}
