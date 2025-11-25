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
 * This class hold Unit Tests for the colors option.
 *
 * @extends AbstractChartTestCase<Highchart>
 */
final class ColorsTest extends AbstractChartTestCase
{
    /**
     * Series output.
     */
    public function testColors(): void
    {
        $this->chart->colors = ['#FF0000', '#00FF00', '#0000FF'];
        $regex = '/colors: \["#FF0000","#00FF00","#0000FF"\]/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    #[\Override]
    protected function createChart(): Highchart
    {
        return new Highchart();
    }
}
