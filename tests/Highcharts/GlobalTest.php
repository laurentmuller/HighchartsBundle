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
 * This class hold Unit Tests for the global option.
 *
 * @extends AbstractChartTestCase<Highchart>
 */
final class GlobalTest extends AbstractChartTestCase
{
    /**
     * useUTC option (true/false).
     */
    public function testGlobal(): void
    {
        $this->chart->global['useUTC'] = 'true';
        $regex = '/global: \{"useUTC":"true"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        // $chart->global->useUTC('false');
        $this->chart->global['useUTC'] = 'false';
        $regex = '/global: \{"useUTC":"false"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * noData option (string).
     */
    public function testLang(): void
    {
        $this->chart->lang['noData'] = 'No data to display';
        $regex = '/"noData":"No data to display"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    #[\Override]
    protected function createChart(): Highchart
    {
        return new Highchart();
    }
}
