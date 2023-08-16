<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Highcharts;

use Laminas\Json\Json;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 */
abstract class AbstractChart implements ChartInterface
{
    /**
     * The Zend json encode options.
     */
    private const ZEND_ENCODE_OPTIONS = ['enableJsonExprFinder' => true];

    public ChartOption $chart;
    public array $colors;
    public ChartOption $credits;
    public ChartOption $exporting;
    public ChartOption $global;
    public ChartOption $lang;
    public ChartOption $legend;
    public ChartOption $plotOptions;
    public ChartOption $scrollbar;
    public array $series;
    public ChartOption $subtitle;
    public ChartOption $title;
    public ChartOption $tooltip;
    public ChartOption|array $xAxis;
    public ChartOption|array $yAxis;

    public function __construct()
    {
        //  options
        $options = [
            'chart', 'credits', 'exporting', 'global',  'lang',
            'legend', 'plotOptions', 'scrollbar', 'subtitle',
            'title', 'tooltip', 'xAxis', 'yAxis',
        ];
        foreach ($options as $option) {
            $this->initChartOption($option);
        }

        // arrays
        $options = ['colors', 'series'];
        foreach ($options as $option) {
            $this->initArrayOption($option);
        }
    }

    public function __call(string $name, mixed $value): static
    {
        $this->$name = $value;

        return $this;
    }

    public function render(string $engine = 'jquery'): string
    {
        $chartJS = '';
        $this->renderChartStart($chartJS, $engine);
        $this->renderChartCommon($chartJS);
        $this->renderChartOptions($chartJS);
        $this->renderChartEnd($chartJS, $engine);

        return \trim($chartJS);
    }

    protected function initArrayOption(string $name): void
    {
        $this->{$name} = [];
    }

    protected function initChartOption(string $name): void
    {
        $this->{$name} = new ChartOption($name);
    }

    protected function jsonEncode(ChartOption $chartOption): string
    {
        if ($chartOption->hasData()) {
            return $chartOption->getName() . ': ' . \json_encode($chartOption->getData()) . ",\n";
        }

        return '';
    }

    protected function renderArrayWithCallback(array $data, string $name): string
    {
        if ([] !== $data) {
            // Zend\Json is used in place of json_encode to preserve JS anonymous functions
            return $name . ': ' . Json::encode($data, false, self::ZEND_ENCODE_OPTIONS) . ", \n";
        }

        return '';
    }

    protected function renderChartCommon(string &$chartJS): void
    {
        // Chart
        $chartJS .= $this->renderOptionWithCallback($this->chart);

        // Colors
        $chartJS .= $this->renderColors();

        // Credits
        $chartJS .= $this->renderCredits();

        // Exporting
        $chartJS .= $this->renderOptionWithCallback($this->exporting);

        // Legend
        $chartJS .= $this->renderOptionWithCallback($this->legend);

        // Scrollbar
        $chartJS .= $this->renderScrollbar();

        // Subtitle
        $chartJS .= $this->renderSubtitle();

        // Title
        $chartJS .= $this->renderTitle();

        // xAxis
        $chartJS .= $this->renderXAxis();

        // yAxis
        $chartJS .= $this->renderYAxis();

        // PlotOptions
        $chartJS .= $this->renderOptionWithCallback($this->plotOptions);

        // Series
        $chartJS .= $this->renderArrayWithCallback($this->series, 'series');

        // Tooltip
        $chartJS .= $this->renderOptionWithCallback($this->tooltip);
    }

    protected function renderChartEnd(string &$chartJS, string $engine): void
    {
        // trim last trailing comma and close parenthesis
        $chartJS = \rtrim($chartJS, ",\n") . "\n    });\n";

        if ('' !== $engine) {
            $chartJS .= "});\n";
        }
    }

    protected function renderChartOptions(string &$chartJS): void
    {
    }

    protected function renderChartStart(string &$chartJS, string $engine): void
    {
        // engine
        $chartJS .= $this->renderEngine($engine);
        // options
        $chartJS .= $this->renderOptions();
    }

    protected function renderColors(): string
    {
        if ([] !== $this->colors) {
            return 'colors: ' . \json_encode($this->colors) . ",\n";
        }

        return '';
    }

    protected function renderCredits(): string
    {
        return $this->jsonEncode($this->credits);
    }

    protected function renderEngine(string $engine): string
    {
        return match ($engine) {
            'mootools' => 'window.addEvent(\'domready\', function () {',
            'jquery' => '$(function () {',
            default => '',
        };
    }

    protected function renderGlobal(): string
    {
        return $this->jsonEncode($this->global);
    }

    protected function renderLang(): string
    {
        return $this->jsonEncode($this->lang);
    }

    protected function renderOptions(): string
    {
        $result = '';
        if ($this->global->hasData() || $this->lang->hasData()) {
            $result .= "\n    Highcharts.setOptions({";
            $result .= $this->renderGlobal();
            $result .= $this->renderLang();
            $result .= "    });\n";
        }

        return $result;
    }

    protected function renderOptionWithCallback(ChartOption $chartOption): string
    {
        return $this->renderArrayWithCallback($chartOption->getData(), $chartOption->getName());
    }

    protected function renderScrollbar(): string
    {
        return $this->jsonEncode($this->scrollbar);
    }

    protected function renderSubtitle(): string
    {
        return $this->jsonEncode($this->subtitle);
    }

    protected function renderTitle(): string
    {
        return $this->jsonEncode($this->title);
    }

    protected function renderXAxis(): string
    {
        if ($this->xAxis instanceof ChartOption) {
            return $this->renderOptionWithCallback($this->xAxis);
        }

        return $this->renderArrayWithCallback($this->xAxis, 'xAxis');
    }

    protected function renderYAxis(): string
    {
        if ($this->yAxis instanceof ChartOption) {
            return $this->renderOptionWithCallback($this->yAxis);
        }

        return $this->renderArrayWithCallback($this->yAxis, 'yAxis');
    }
}
