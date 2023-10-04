<?php

declare(strict_types=1);

namespace HighchartsBundle\Tests\Highcharts;

use HighchartsBundle\Highcharts\Highchart;
use HighchartsBundle\Tests\AbstractChartTestCase;

/**
 * This class hold Unit Tests for the colors option.
 */
class ColorsTest extends AbstractChartTestCase
{
    /**
     * Series output.
     */
    public function testColors(): void
    {
        $chart = new Highchart();
        $chart->colors = ['#FF0000', '#00FF00', '#0000FF'];
        $regex = '/colors: \["#FF0000","#00FF00","#0000FF"\]/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }
}
