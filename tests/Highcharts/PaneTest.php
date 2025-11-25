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
 *
 * @extends AbstractChartTestCase<Highchart>
 */
final class PaneTest extends AbstractChartTestCase
{
    /**
     * Percentage based.
     */
    public function testCenterPercent(): void
    {
        $this->chart->pane['center'] = ['50%', '40%'];
        $regex = '/pane: \{"center":\["50%","40%"\]\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * Pixel based.
     */
    public function testCenterPixel(): void
    {
        $this->chart->pane['center'] = [50, 100];
        $regex = '/pane: \{"center":\[50,100\]\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * End angle.
     */
    public function testEndAngle(): void
    {
        $this->chart->pane['endAngle'] = 5;
        $regex = '/pane: \{"endAngle":5\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * Start angle.
     */
    public function testStartAngle(): void
    {
        $this->chart->pane['startAngle'] = 5;
        $regex = '/pane: \{"startAngle":5\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    #[\Override]
    protected function createChart(): Highchart
    {
        return new Highchart();
    }
}
