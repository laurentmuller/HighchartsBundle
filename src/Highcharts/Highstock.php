<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Highcharts;

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

    protected function renderChartOptions(string &$chartJS): void
    {
        parent::renderChartOptions($chartJS);
        $chartJS .= $this->renderRangeSelector();
    }

    protected function renderChartStart(string &$chartJS, string $engine): void
    {
        parent::renderChartStart($chartJS, $engine);
        $chartJS .= "    const {$this->getRenderTo()} = new Highcharts.StockChart({\n";
    }

    protected function renderRangeSelector(): string
    {
        return $this->renderCallback($this->rangeSelector);
    }
}
