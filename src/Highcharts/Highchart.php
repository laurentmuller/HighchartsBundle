<?php

declare(strict_types=1);

namespace HighchartsBundle\Highcharts;

/**
 * Highchart chart.
 *
 * See Highcharts documentation at http://www.highcharts.com/ref/.
 */
class Highchart extends AbstractChart
{
    public ChartOption $colorAxis;
    public ChartOption $drilldown;
    public ChartOption $noData;
    public ChartOption $pane;

    public function __construct()
    {
        parent::__construct();
        $options = ['colorAxis', 'drilldown', 'noData', 'pane'];
        foreach ($options as $option) {
            $this->initChartOption($option);
        }
    }

    protected function renderChartOptions(string &$chartJS): void
    {
        parent::renderChartOptions($chartJS);
        $chartJS .= $this->renderColorAxis();
        $chartJS .= $this->renderNoData();
        $chartJS .= $this->renderPane();
        $chartJS .= $this->renderDrilldown();
    }

    protected function renderChartStart(string &$chartJS, string $engine): void
    {
        parent::renderChartStart($chartJS, $engine);
        $chartJS .= "    const {$this->getRenderTo()} = new Highcharts.Chart({\n";
    }

    private function renderColorAxis(): string
    {
        return $this->renderCallback($this->colorAxis, 'colorAxis');
    }

    private function renderDrilldown(): string
    {
        return $this->jsonEncode($this->drilldown);
    }

    private function renderNoData(): string
    {
        return $this->renderCallback($this->noData);
    }

    private function renderPane(): string
    {
        return $this->jsonEncode($this->pane);
    }
}
