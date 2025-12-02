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
use HighchartsBundle\Highcharts\Engine;
use PHPUnit\Framework\TestCase;

/**
 * @template TChart of ChartInterface
 */
abstract class AbstractChartTestCase extends TestCase
{
    /**
     * @var TChart
     */
    protected ChartInterface $chart;

    #[\Override]
    protected function setUp(): void
    {
        $this->chart = $this->createChart();
    }

    /**
     * @param TChart|null $chart
     */
    protected function assertChartMatchesRegularExpression(
        string $pattern,
        ?ChartInterface $chart = null,
        Engine $engine = Engine::JQUERY
    ): void {
        $chart ??= $this->chart;
        $actual = $chart->render($engine);
        self::assertMatchesRegularExpression($pattern, $actual);
    }

    /**
     * @return TChart
     */
    abstract protected function createChart(): ChartInterface;
}
