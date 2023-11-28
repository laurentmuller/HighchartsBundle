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

namespace HighchartsBundle\Tests\Highstock;

use HighchartsBundle\Highcharts\Highstock;
use HighchartsBundle\Tests\AbstractChartTestCase;

class ColorsTest extends AbstractChartTestCase
{
    public function testColors(): void
    {
        $chart = new Highstock();
        $colors = ['#FF0000', '#00FF00', '#0000FF'];
        $chart->colors = $colors;
        $regex = '/colors: \["#FF0000","#00FF00","#0000FF"\]/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }
}
