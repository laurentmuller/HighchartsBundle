<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Highcharts;

/**
 * This class is part of the Ob/HighchartsBundle.
 *
 * See Highcharts documentation at http://www.highcharts.com/ref/.
 *
 * @psalm-suppress PropertyNotSetInConstructor
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

        $chartJS .= $this->renderOptionWithCallback($this->rangeSelector);
    }

    protected function renderChartStart(string &$chartJS, string $engine): void
    {
        parent::renderChartStart($chartJS, $engine);

        $chartJS .= "\n    var " . ($this->chart->renderTo ?? 'chart') . " = new Highcharts.StockChart({\n";
    }
}
