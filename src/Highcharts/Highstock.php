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

namespace HighchartsBundle\Highcharts;

/**
 * Highstock chart.
 *
 * See Highcharts documentation at http://www.highcharts.com/ref/.
 */
class Highstock extends AbstractChart
{
    public ChartOption $rangeSelector;

    public function __construct()
    {
        parent::__construct();
        $this->initChartOption('rangeSelector');
    }

    protected function getChartClass(): string
    {
        return 'StockChart';
    }

    protected function renderChartOptions(string &$chartJS): void
    {
        parent::renderChartOptions($chartJS);
        $chartJS .= $this->renderRangeSelector();
    }

    protected function renderRangeSelector(): string
    {
        return $this->renderCallback($this->rangeSelector);
    }
}
