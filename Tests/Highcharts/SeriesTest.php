<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\Highchart;
use PHPUnit\Framework\TestCase;

/**
 * This class hold Unit Tests for the series option.
 */
class SeriesTest extends TestCase
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
        $this->assertMatchesRegularExpression('/\{"name":"Data Serie #1","data":\[1,2,4,5,6,3,8\]\}/', $chart->render());
        $this->assertMatchesRegularExpression('/\{"name":"Data Serie #2","data":\[7,3,5,1,6,5,9\]\}/', $chart->render());
    }
}
