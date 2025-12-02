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

/**
 * This class hold Unit Tests for the pane option.
 */
final class PaneTest extends AbstractHighchartTestCase
{
    /**
     * Percentage based.
     */
    public function testCenterPercent(): void
    {
        $this->chart->pane['center'] = ['50%', '40%'];
        $regex = '/pane: \{"center":\["50%","40%"\]\}/';
        $this->assertChartMatchesRegularExpression($regex);
    }

    /**
     * Pixel based.
     */
    public function testCenterPixel(): void
    {
        $this->chart->pane['center'] = [50, 100];
        $regex = '/pane: \{"center":\[50,100\]\}/';
        $this->assertChartMatchesRegularExpression($regex);
    }

    /**
     * End angle.
     */
    public function testEndAngle(): void
    {
        $this->chart->pane['endAngle'] = 5;
        $regex = '/pane: \{"endAngle":5\}/';
        $this->assertChartMatchesRegularExpression($regex);
    }

    /**
     * Start angle.
     */
    public function testStartAngle(): void
    {
        $this->chart->pane['startAngle'] = 5;
        $regex = '/pane: \{"startAngle":5\}/';
        $this->assertChartMatchesRegularExpression($regex);
    }
}
