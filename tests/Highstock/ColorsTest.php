<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highstock;

use Ob\HighchartsBundle\Highcharts\Highstock;
use Ob\HighchartsBundle\Tests\AbstractChartTestCase;

class ColorsTest extends AbstractChartTestCase
{
    public function testColors(): void
    {
        $chart = new Highstock();
        $colors = ['#FF0000', '#00FF00', '#0000FF'];
        $chart->colors($colors);
        $regex = '/colors: \[\["#FF0000","#00FF00","#0000FF"\]\]/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }
}
