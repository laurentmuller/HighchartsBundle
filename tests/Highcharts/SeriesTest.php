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
 * This class hold Unit Tests for the series option.
 *
 * @extends AbstractChartTestCase<Highchart>
 */
final class SeriesTest extends AbstractChartTestCase
{
    /**
     * Series output.
     */
    public function testData(): void
    {
        $series = [
            ['name' => 'Data #1', 'data' => [1, 2, 4, 5, 6, 3, 8]],
            ['name' => 'Data #2', 'data' => [7, 3, 5, 1, 6, 5, 9]],
        ];

        $this->chart->series->merge($series);

        $regex = '/\{"name":"Data #1","data":\[1,2,4,5,6,3,8\]\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $regex = '/\{"name":"Data #2","data":\[7,3,5,1,6,5,9\]\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    #[\Override]
    protected function createChart(): Highchart
    {
        return new Highchart();
    }
}
