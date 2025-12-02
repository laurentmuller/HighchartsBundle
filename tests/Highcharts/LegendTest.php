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
 * This class hold Unit Tests for the legend option.
 */
final class LegendTest extends AbstractHighchartTestCase
{
    /**
     * Align option (left/center/right).
     */
    public function testAlign(): void
    {
        $this->chart->legend['align'] = 'left';
        $regex = '/legend: \{"align":"left"\}/';
        $this->assertChartMatchesRegularExpression($regex);

        $this->chart->legend['align'] = 'center';
        $regex = '/legend: \{"align":"center"\}/';
        $this->assertChartMatchesRegularExpression($regex);

        $this->chart->legend['align'] = 'right';
        $regex = '/legend: \{"align":"right"\}/';
        $this->assertChartMatchesRegularExpression($regex);
    }

    /**
     * Enabled option (true/false).
     */
    public function testEnabledDisabled(): void
    {
        $this->chart->legend['enabled'] = false;
        $regex = '/legend: \{"enabled":false\}/';
        $this->assertChartMatchesRegularExpression($regex);

        $this->chart->legend['enabled'] = true;
        $regex = '/legend: \{"enabled":true\}/';
        $this->assertChartMatchesRegularExpression($regex);
    }

    /**
     * Layout option (horizontal/vertical).
     */
    public function testLayout(): void
    {
        $this->chart->legend['layout'] = 'horizontal';
        $regex = '/legend: \{"layout":"horizontal"\}/';
        $this->assertChartMatchesRegularExpression($regex);

        $this->chart->legend['layout'] = 'vertical';
        $regex = '/legend: \{"layout":"vertical"\}/';
        $this->assertChartMatchesRegularExpression($regex);
    }
}
