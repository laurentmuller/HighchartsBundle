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
 * This class hold Unit Tests for the legend option.
 *
 * @extends AbstractChartTestCase<Highchart>
 */
final class LegendTest extends AbstractChartTestCase
{
    /**
     * Align option (left/center/right).
     */
    public function testAlign(): void
    {
        $this->chart->legend['align'] = 'left';
        $regex = '/legend: \{"align":"left"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->legend['align'] = 'center';
        $regex = '/legend: \{"align":"center"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->legend['align'] = 'right';
        $regex = '/legend: \{"align":"right"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * Enabled option (true/false).
     */
    public function testEnabledDisabled(): void
    {
        $this->chart->legend['enabled'] = false;
        $regex = '/legend: \{"enabled":false\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->legend['enabled'] = true;
        $regex = '/legend: \{"enabled":true\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * Layout option (horizontal/vertical).
     */
    public function testLayout(): void
    {
        $this->chart->legend['layout'] = 'horizontal';
        $regex = '/legend: \{"layout":"horizontal"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->legend['layout'] = 'vertical';
        $regex = '/legend: \{"layout":"vertical"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    #[\Override]
    protected function createChart(): Highchart
    {
        return new Highchart();
    }
}
