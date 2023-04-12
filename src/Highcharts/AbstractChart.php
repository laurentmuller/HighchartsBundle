<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Highcharts;

use Laminas\Json\Json;

abstract class AbstractChart
{
    // Default options
    public ChartOption $chart;
    public array $colors;
    public ChartOption $credits;
    public ChartOption $exporting;
    public ChartOption $global;
    public ChartOption $labels;
    public ChartOption $lang;
    public ChartOption $legend;
    public ChartOption $loading;
    public ChartOption $navigation;
    public ChartOption $plotOptions;
    public ChartOption $point;
    public ChartOption $scrollbar;
    public array $series;
    public ChartOption $subtitle;
    public array $symbols;
    public ChartOption $title;
    public ChartOption $tooltip;
    public ChartOption|array|null $xAxis;
    public ChartOption|array|null $yAxis;

    public function __construct()
    {
        $options = ['chart', 'credits', 'global', 'labels', 'lang', 'legend', 'loading', 'plotOptions',
            'point', 'subtitle', 'title', 'tooltip', 'xAxis', 'yAxis',  'exporting', 'navigation',
            'scrollbar'];
        foreach ($options as $option) {
            $this->initChartOption($option);
        }

        $options = ['colors', 'series', 'symbols'];
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

    protected function renderArrayWithCallback(array $chartOption, string $name): string
    {
        $result = '';

        if (!empty($chartOption)) {
            // Zend\Json is used in place of json_encode to preserve JS anonymous functions
            $result .= $name . ': ' . Json::encode($chartOption[0], false, ['enableJsonExprFinder' => true]) . ", \n";
        }

        return $result;
    }

    protected function renderChartCommon(string &$chartJS): void
    {
        // Chart
        $chartJS .= $this->renderWithJavascriptCallback($this->chart->chart, 'chart');

        // Colors
        $chartJS .= $this->renderColors();

        // Credits
        $chartJS .= $this->renderCredits();

        // Exporting
        $chartJS .= $this->renderWithJavascriptCallback($this->exporting->exporting, 'exporting');

        // Legend
        $chartJS .= $this->renderWithJavascriptCallback($this->legend->legend, 'legend');

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
        $chartJS .= $this->renderWithJavascriptCallback($this->plotOptions->plotOptions, 'plotOptions');

        // Series
        $chartJS .= $this->renderWithJavascriptCallback($this->series, 'series');

        // Tooltip
        $chartJS .= $this->renderWithJavascriptCallback($this->tooltip->tooltip, 'tooltip');
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
        if (!empty($this->colors)) {
            return 'colors: ' . \json_encode($this->colors) . ",\n";
        }

        return '';
    }

    protected function renderCredits(): string
    {
        if (\get_object_vars($this->credits->credits)) {
            return 'credits: ' . \json_encode($this->credits->credits) . ",\n";
        }

        return '';
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
        if (\get_object_vars($this->global->global)) {
            return 'global: ' . \json_encode($this->global->global) . ",\n";
        }

        return '';
    }

    protected function renderLang(): string
    {
        if (\get_object_vars($this->lang->lang)) {
            return 'lang: ' . \json_encode($this->lang->lang) . ",\n";
        }

        return '';
    }

    protected function renderObjectWithCallback(object $chartOption, string $name): string
    {
        $result = '';

        if (\get_object_vars($chartOption)) {
            // Zend\Json is used in place of json_encode to preserve JS anonymous functions
            $result .= $name . ': ' . Json::encode($chartOption, false, ['enableJsonExprFinder' => true]) . ",\n";
        }

        return $result;
    }

    protected function renderOptions(): string
    {
        $result = '';

        if (\get_object_vars($this->global->global) || \get_object_vars($this->lang->lang)) {
            $result .= "\n    Highcharts.setOptions({";
            $result .= $this->renderGlobal();
            $result .= $this->renderLang();
            $result .= "    });\n";
        }

        return $result;
    }

    protected function renderScrollbar(): string
    {
        if (\get_object_vars($this->scrollbar->scrollbar)) {
            return 'scrollbar: ' . \json_encode($this->scrollbar->scrollbar) . ",\n";
        }

        return '';
    }

    protected function renderSubtitle(): string
    {
        if (\get_object_vars($this->subtitle->subtitle)) {
            return 'subtitle: ' . \json_encode($this->subtitle->subtitle) . ",\n";
        }

        return '';
    }

    protected function renderTitle(): string
    {
        if (\get_object_vars($this->title->title)) {
            return 'title: ' . \json_encode($this->title->title) . ",\n";
        }

        return '';
    }

    protected function renderWithJavascriptCallback(object|array|null $chartOption, string $name): string
    {
        if (\is_object($chartOption)) {
            return $this->renderObjectWithCallback($chartOption, $name);
        } elseif (\is_array($chartOption)) {
            return $this->renderArrayWithCallback($chartOption, $name);
        } else {
            return '';
        }
    }

    protected function renderXAxis(): string
    {
        if (\is_object($this->xAxis)) {
            return $this->renderWithJavascriptCallback($this->xAxis->xAxis, 'xAxis');
        } elseif (\is_array($this->xAxis)) {
            return $this->renderWithJavascriptCallback($this->xAxis, 'xAxis');
        } else {
            return '';
        }
    }

    protected function renderYAxis(): string
    {
        if (\is_object($this->yAxis)) {
            return $this->renderWithJavascriptCallback($this->yAxis->yAxis, 'yAxis');
        } elseif (\is_array($this->yAxis)) {
            return $this->renderWithJavascriptCallback($this->yAxis, 'yAxis');
        } else {
            return '';
        }
    }
}
