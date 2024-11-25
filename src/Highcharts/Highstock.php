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
 * See documentation at https://www.highcharts.com/products/stock/.
 */
class Highstock extends AbstractChart
{
    public const CHART_CLASS = 'StockChart';

    /**
     * Range selector language options for accessibility.
     */
    public ChartOption $rangeSelector;

    public function __construct()
    {
        parent::__construct();
        $this->rangeSelector = ChartOption::instance('rangeSelector');
    }

    protected function getChartClass(): string
    {
        return self::CHART_CLASS;
    }

    protected function renderChartOptions(string &$chartJS): void
    {
        parent::renderChartOptions($chartJS);
        $this->renderRangeSelector($chartJS);
    }

    protected function renderRangeSelector(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->rangeSelector);
    }
}
