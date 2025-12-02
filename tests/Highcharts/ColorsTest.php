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

/**
 * This class hold Unit Tests for the colors option.
 */
final class ColorsTest extends AbstractHighchartTestCase
{
    public function testColors(): void
    {
        $this->chart->colors = ['#FF0000', '#00FF00', '#0000FF'];
        $regex = '/colors: \["#FF0000","#00FF00","#0000FF"\]/';
        $this->assertChartMatchesRegularExpression($regex);
    }
}
