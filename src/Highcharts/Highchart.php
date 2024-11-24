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
 */
class Highchart extends AbstractChart
{
    public const CHART_CLASS = 'Chart';

    /**
     * The color axis options for series.
     */
    public ChartOption $colorAxis;
    /**
     * The options for drill down.
     */
    public ChartOption $drilldown;
    /**
     * The options for displaying a message when not data.
     */
    public ChartOption $noData;
    /**
     * The pane options serves as a container for axes and backgrounds.
     */
    public ChartOption $pane;

    public function __construct()
    {
        parent::__construct();
        $this->colorAxis = ChartOption::instance('colorAxis');
        $this->drilldown = ChartOption::instance('drilldown');
        $this->noData = ChartOption::instance('noData');
        $this->pane = ChartOption::instance('pane');
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
