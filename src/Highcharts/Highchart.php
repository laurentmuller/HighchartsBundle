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

    protected function getChartClass(): string
    {
        return 'Chart';
    }

    protected function renderChartOptions(string &$chartJS): void
    {
        parent::renderChartOptions($chartJS);
        $chartJS .= $this->renderColorAxis();
        $chartJS .= $this->renderNoData();
        $chartJS .= $this->renderPane();
        $chartJS .= $this->renderDrilldown();
    }

    private function renderColorAxis(): string
    {
        return $this->renderCallback($this->colorAxis);
    }

    private function renderDrilldown(): string
    {
        return $this->renderCallback($this->drilldown);
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
