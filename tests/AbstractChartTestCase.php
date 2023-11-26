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

namespace HighchartsBundle\Tests;

use HighchartsBundle\Highcharts\ChartInterface;
use PHPUnit\Framework\TestCase;

class AbstractChartTestCase extends TestCase
{
    /**
     * @psalm-param ChartInterface::ENGINE_* $engine
     */
    protected function assertChartMatchesRegularExpression(ChartInterface $chart, string $regex, string $engine = 'jquery'): void
    {
        $result = $chart->render($engine);
        $this->assertMatchesRegularExpression($regex, $result);
    }
}
