<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highstock;

use Ob\HighchartsBundle\Highcharts\Highstock;
use PHPUnit\Framework\TestCase;

class ColorsTest extends TestCase
{
    public function testColors(): void
    {
        $chart = new Highstock();
        $colors = ['#FF0000', '#00FF00', '#0000FF'];
        $chart->colors($colors);
        $this->assertMatchesRegularExpression('/colors: \[\["#FF0000","#00FF00","#0000FF"\]\]/', $chart->render());
    }
}
