<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Highcharts;

/**
 * This class is part of the Ob/HighchartsBundle
 * See Highcharts documentation at http://www.highcharts.com/ref/.
 *
 * @method Highstock colors(array $colors)
 * @method Highstock series(array $series)
 */
class Highstock extends AbstractChart implements ChartInterface
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

        // RangeSelector
        $chartJS .= $this->renderWithJavascriptCallback($this->rangeSelector->rangeSelector, 'rangeSelector');
    }

    protected function renderChartStart(string &$chartJS, string $engine): void
    {
        parent::renderChartStart($chartJS, $engine);

        $chartJS .= "\n    var " . ($this->chart->renderTo ?? 'chart') . " = new Highcharts.StockChart({\n";
    }
}
