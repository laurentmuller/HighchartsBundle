<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Highcharts;

/**
 * This class is part of the Ob/HighchartsBundle
 * See Highcharts documentation at http://www.highcharts.com/ref/.
 *
 * @method Highchart colors(array $colors)
 * @method Highchart series(array $series)
 */
class Highchart extends AbstractChart implements ChartInterface
{
    public ChartOption|array|null $colorAxis;
    public ChartOption $drilldown;
    public ChartOption $noData;
    public ChartOption $pane;

    public function __construct()
    {
        parent::__construct();
        $this->initChartOption('colorAxis');
        $this->initChartOption('drilldown');
        $this->initChartOption('noData');
        $this->initChartOption('pane');
    }

    protected function renderChartOptions(string &$chartJS): void
    {
        parent::renderChartOptions($chartJS);

        // Color Axis
        $chartJS .= $this->renderColorAxis();
        // noData
        $chartJS .= $this->renderWithJavascriptCallback($this->noData->noData, 'noData');
        // Pane
        $chartJS .= $this->renderPane();
        // Drilldown
        $chartJS .= $this->renderDrilldown();
    }

    protected function renderChartStart(string &$chartJS, string $engine): void
    {
        parent::renderChartStart($chartJS, $engine);

        $chartJS .= "\n    var " . ($this->chart->renderTo ?? 'chart') . " = new Highcharts.Chart({\n";
    }

    private function renderColorAxis(): string
    {
        if (\is_array($this->colorAxis)) {
            return $this->renderWithJavascriptCallback($this->colorAxis, 'colorAxis');
        } elseif (\is_object($this->colorAxis)) {
            return $this->renderWithJavascriptCallback($this->colorAxis->colorAxis, 'colorAxis');
        } else {
            return '';
        }
    }

    private function renderDrilldown(): string
    {
        if (\get_object_vars($this->drilldown->drilldown)) {
            return 'drilldown: ' . \json_encode($this->drilldown->drilldown) . ",\n";
        }

        return '';
    }

    private function renderPane(): string
    {
        if (\get_object_vars($this->pane->pane)) {
            return 'pane: ' . \json_encode($this->pane->pane) . ",\n";
        }

        return '';
    }
}
