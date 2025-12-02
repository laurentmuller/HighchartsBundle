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
 * This class hold Unit Tests for the 'renderTo' property.
 */
final class RenderToTest extends AbstractHighchartTestCase
{
    public function testWithDefault(): void
    {
        $regex = '/const chart = new Highcharts/';
        $this->assertChartMatchesRegularExpression($regex);
    }

    public function testWithValue(): void
    {
        $this->chart->chart['renderTo'] = 'myChart';
        $regex = '/const myChart = new Highcharts/';
        $this->assertChartMatchesRegularExpression($regex);
    }
}
