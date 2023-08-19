<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\Highchart;
use Ob\HighchartsBundle\Tests\AbstractChartTestCase;

/**
 * This class hold Unit Tests for the global option.
 */
class GlobalTest extends AbstractChartTestCase
{
    /**
     * useUTC option (true/false).
     */
    public function testGlobal(): void
    {
        $chart = new Highchart();
        $chart->global->useUTC('true');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/global: \{"useUTC":"true"\}/'
        );

        // $chart->global->useUTC('false');
        $chart->global['useUTC'] = 'false';
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/global: \{"useUTC":"false"\}/'
        );
    }

    /**
     * noData option (string).
     */
    public function testLang(): void
    {
        $chart = new Highchart();
        $chart->lang->noData('No data to display');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/"noData":"No data to display"/'
        );
    }
}
