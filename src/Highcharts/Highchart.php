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
class Highchart extends AbstractChart
{
    public ChartOption|array $colorAxis;
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

        $chartJS .= $this->renderColorAxis();
        $chartJS .= $this->renderNoData();
        $chartJS .= $this->renderPane();
        $chartJS .= $this->renderDrilldown();
    }

    protected function renderChartStart(string &$chartJS, string $engine): void
    {
        parent::renderChartStart($chartJS, $engine);

        $chartJS .= "\n    var " . ($this->chart->renderTo ?? 'chart') . " = new Highcharts.Chart({\n";
    }

    private function renderColorAxis(): string
    {
        if ($this->colorAxis instanceof ChartOption) {
            return $this->renderOptionWithCallback($this->colorAxis);
        }

        return $this->renderArrayWithCallback($this->colorAxis, 'colorAxis');
    }

    private function renderDrilldown(): string
    {
        return $this->jsonEncode($this->drilldown);
    }

    private function renderNoData(): string
    {
        return $this->renderOptionWithCallback($this->noData);
    }

    private function renderPane(): string
    {
        return $this->jsonEncode($this->pane);
    }
}
