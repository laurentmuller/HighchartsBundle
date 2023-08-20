<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\Highchart;
use Ob\HighchartsBundle\Tests\AbstractChartTestCase;

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
            ['name' => 'Data Serie #1', 'data' => [1, 2, 4, 5, 6, 3, 8]],
            ['name' => 'Data Serie #2', 'data' => [7, 3, 5, 1, 6, 5, 9]],
        ];
    }

    /**
     * Series output.
     */
    public function testData(): void
    {
        $chart = new Highchart();
        $chart->series($this->series);

        $regex = '/\{"name":"Data Serie #1","data":\[1,2,4,5,6,3,8\]\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $regex = '/\{"name":"Data Serie #2","data":\[7,3,5,1,6,5,9\]\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }
}
