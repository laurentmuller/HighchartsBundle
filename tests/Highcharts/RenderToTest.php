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
 *
 * @extends AbstractChartTestCase<Highchart>
 */
final class RenderToTest extends AbstractChartTestCase
{
    public function testWithDefault(): void
    {
        $regex = '/const chart = new Highcharts/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testWithValue(): void
    {
        $this->chart->chart['renderTo'] = 'myChart';
        $regex = '/const myChart = new Highcharts/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    #[\Override]
    protected function createChart(): Highchart
    {
        return new Highchart();
    }
}
