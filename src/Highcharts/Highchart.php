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
 * See documentation at https://www.highcharts.com/products/highcharts/.
 *
 * @psalm-suppress PropertyNotSetInConstructor
 */
class Highchart extends AbstractChart
{
    public const CHART_CLASS = 'Chart';

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
        return self::CHART_CLASS;
    }

    protected function renderChartOptions(string &$chartJS): void
    {
        parent::renderChartOptions($chartJS);
        $this->renderColorAxis($chartJS);
        $this->renderDrilldown($chartJS);
        $this->renderNoData($chartJS);
        $this->renderPane($chartJS);
    }

    private function renderColorAxis(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->colorAxis);
    }

    private function renderDrilldown(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->drilldown);
    }

    private function renderNoData(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->noData);
    }

    private function renderPane(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->pane);
    }
}
