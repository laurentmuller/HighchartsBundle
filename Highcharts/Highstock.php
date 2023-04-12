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
    public function render(string $engine = 'jquery'): string
    {
        $chartJS = '';
        // engine
        $chartJS .= $this->renderEngine($engine);
        // options
        $chartJS .= $this->renderOptions();
        $chartJS .= "\n    var " . ($this->chart->renderTo ?? 'chart') . " = new Highcharts.StockChart({\n";

        // Chart Option
        $chartJS .= $this->renderWithJavascriptCallback($this->chart->chart, 'chart');

        // Colors
        $chartJS .= $this->renderColors();

        // Credits
        $chartJS .= $this->renderCredits();

        // Exporting
        $chartJS .= $this->renderWithJavascriptCallback($this->exporting->exporting, 'exporting');

        // Labels

        // Legend
        $chartJS .= $this->renderWithJavascriptCallback($this->legend->legend, 'legend');

        // Loading
        // Navigation

        // PlotOptions
        $chartJS .= $this->renderWithJavascriptCallback($this->plotOptions->plotOptions, 'plotOptions');

        // RangeSelector
        $chartJS .= $this->renderWithJavascriptCallback($this->rangeSelector->rangeSelector, 'rangeSelector');

        // Scrollbar
        $chartJS .= $this->renderScrollbar();

        // Series
        $chartJS .= $this->renderWithJavascriptCallback($this->series, 'series');

        // Subtitle
        $chartJS .= $this->renderSubtitle();

        // Title
        $chartJS .= $this->renderTitle();

        // Tooltip
        $chartJS .= $this->renderWithJavascriptCallback($this->tooltip->tooltip, 'tooltip');

        // xAxis
        $chartJS .= $this->renderXAxis();

        // yAxis
        $chartJS .= $this->renderYAxis();

        // trim last trailing comma and close parenthesis
        $chartJS = \rtrim($chartJS, ",\n") . "\n    });\n";

        if ('' !== $engine) {
            $chartJS .= "});\n";
        }

        return \trim($chartJS);
    }
}
