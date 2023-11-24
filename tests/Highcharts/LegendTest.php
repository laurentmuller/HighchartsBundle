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
 */
class LegendTest extends AbstractChartTestCase
{
    /**
     * Align option (left/center/right).
     */
    public function testAlign(): void
    {
        $chart = new Highchart();
        $chart->legend['align'] = 'left';
        $regex = '/legend: \{"align":"left"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->legend['align'] = 'center';
        $regex = '/legend: \{"align":"center"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->legend['align'] = 'right';
        $regex = '/legend: \{"align":"right"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * Enabled option (true/false).
     */
    public function testEnabledDisabled(): void
    {
        $chart = new Highchart();
        $chart->legend['enabled'] = false;
        $regex = '/legend: \{"enabled":false\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->legend['enabled'] = true;
        $regex = '/legend: \{"enabled":true\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * Layout option (horizontal/vertical).
     */
    public function testLayout(): void
    {
        $chart = new Highchart();
        $chart->legend['layout'] = 'horizontal';
        $regex = '/legend: \{"layout":"horizontal"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->legend['layout'] = 'vertical';
        $regex = '/legend: \{"layout":"vertical"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }
}
