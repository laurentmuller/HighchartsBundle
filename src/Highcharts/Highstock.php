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
    public const string CHART_CLASS = 'StockChart';

    /** Range selector language options for accessibility. */
    public ChartOption $rangeSelector;

    public function __construct()
    {
        parent::__construct();
        $this->rangeSelector = ChartOption::instance('rangeSelector');
    }

    #[\Override]
    protected function getChartClass(): string
    {
        return self::CHART_CLASS;
    }

    #[\Override]
    protected function renderChartOptions(): string
    {
        return $this->implode(
            parent::renderChartOptions(),
            $this->renderRangeSelector()
        );
    }

    protected function renderRangeSelector(): string
    {
        return $this->jsonEncode($this->rangeSelector);
    }
}
