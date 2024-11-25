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
 */
class SeriesTest extends AbstractChartTestCase
{
    private array $series = [];

    /**
     * Initialises the data.
     */
    protected function setUp(): void
    {
        $this->series = [
            ['name' => 'Data #1', 'data' => [1, 2, 4, 5, 6, 3, 8]],
            ['name' => 'Data #2', 'data' => [7, 3, 5, 1, 6, 5, 9]],
        ];
    }

    /**
     * Series output.
     */
    public function testData(): void
    {
        $chart = new Highchart();
        $chart->series->merge($this->series);

        $regex = '/\{"name":"Data #1","data":\[1,2,4,5,6,3,8\]\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $regex = '/\{"name":"Data #2","data":\[7,3,5,1,6,5,9\]\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }
}
