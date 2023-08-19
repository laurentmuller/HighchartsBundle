<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests;

use Ob\HighchartsBundle\Highcharts\ChartInterface;
use PHPUnit\Framework\TestCase;

class AbstractChartTestCase extends TestCase
{
    protected function assertChartMatchesRegularExpression(ChartInterface $chart, string $regex, string $engine = 'jquery'): void
    {
        $result = $chart->render($engine);
        $this->assertMatchesRegularExpression($regex, $result);
    }
}
