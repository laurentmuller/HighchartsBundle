<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\Highchart;
use Ob\HighchartsBundle\Tests\AbstractChartTestCase;

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
        $colors = ['#FF0000', '#00FF00', '#0000FF'];
        $chart->colors($colors);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/colors: \[\["#FF0000","#00FF00","#0000FF"\]\]/'
        );
    }
}
