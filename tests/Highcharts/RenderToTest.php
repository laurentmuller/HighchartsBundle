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
 * This class hold Unit Tests for the 'renderTo' property.
 */
class RenderToTest extends AbstractChartTestCase
{
    public function testWithDefault(): void
    {
        $chart = new Highchart();
        $regex = '/const chart = new Highcharts/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    public function testWithValue(): void
    {
        $chart = new Highchart();
        $chart->chart['renderTo'] = 'myChart';
        $regex = '/const myChart = new Highcharts/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }
}
