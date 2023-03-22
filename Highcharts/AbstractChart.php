<?php

namespace Ob\HighchartsBundle\Highcharts;

use Laminas\Json\Json;

abstract class AbstractChart
{
    // Default options
    public ChartOption $chart;
    public ChartOption $credits;
    public ChartOption $global;
    public ChartOption $labels;
    public ChartOption $lang;
    public ChartOption $legend;
    public ChartOption $loading;
    public ChartOption $plotOptions;
    public ChartOption $rangeSelector;
    public ChartOption $point;
    public ChartOption $drilldown;
    public ChartOption $subtitle;
    public ChartOption $title;
    public ChartOption $tooltip;
    public ChartOption|array|null $xAxis;
    public ChartOption|array|null $yAxis;
    public ChartOption $exporting;
    public ChartOption $navigation;
    public ChartOption $pane;
    public ChartOption $scrollbar;

    public array $colors;
    public array $series;
    public array $symbols;

    public function __construct()
    {
        $chartOptions = array('chart', 'credits', 'global', 'labels', 'lang', 'legend', 'loading', 'plotOptions',
            'rangeSelector', 'point', 'subtitle', 'title', 'tooltip', 'xAxis', 'yAxis', 'pane', 'exporting',
            'navigation', 'drilldown', 'scrollbar');

        foreach ($chartOptions as $option) {
            $this->initChartOption($option);
        }

        $arrayOptions = array('colors', 'series', 'symbols');

        foreach ($arrayOptions as $option) {
            $this->initArrayOption($option);
        }
    }

    abstract public function render(): string;

    public function __call(string $name, mixed $value): static
    {
        $this->$name = $value;

        return $this;
    }

    protected function initChartOption(string $name): void
    {
        $this->{$name} = new ChartOption($name);
    }

    protected function initArrayOption(string $name): void
    {
        $this->{$name} = array();
    }

    protected function renderWithJavascriptCallback(ChartOption|array|null $chartOption, string $name): string
    {
        if ($chartOption instanceof ChartOption) {
            return $this->renderObjectWithCallback($chartOption, $name);
        } else if (is_array($chartOption)) {
            return $this->renderArrayWithCallback($chartOption, $name);
        } else {
            return "";
        }
    }

    protected function renderArrayWithCallback(array $chartOption, string $name): string
    {
        $result = "";

        if (!empty($chartOption)) {
            // Zend\Json is used in place of json_encode to preserve JS anonymous functions
            $result .= $name . ": " . Json::encode($chartOption[0], false, array('enableJsonExprFinder' => true)) . ", \n";
        }

        return $result;
    }

    protected function renderObjectWithCallback(ChartOption $chartOption, string $name): string
    {
        $result = "";

        if (get_object_vars($chartOption)) {
            // Zend\Json is used in place of json_encode to preserve JS anonymous functions
            $result .= $name . ": " . Json::encode($chartOption, false, array('enableJsonExprFinder' => true)) . ",\n";
        }

        return $result;
    }

    protected function renderEngine(string $engine): string
    {
        return match($engine) {
            'mootools' => 'window.addEvent(\'domready\', function () {',
            'jquery' => "$(function () {",
            default => "",
        };
    }

    protected function renderColors(): string
    {
        if (!empty($this->colors)) {
            return "colors: " . json_encode($this->colors) . ",\n";
        }

        return "";
    }

    protected function renderCredits(): string
    {
        if (get_object_vars($this->credits->credits)) {
            return "credits: " . json_encode($this->credits->credits) . ",\n";
        }

        return "";
    }

    protected function renderSubtitle(): string
    {
        if (get_object_vars($this->subtitle->subtitle)) {
            return "subtitle: " . json_encode($this->subtitle->subtitle) . ",\n";
        }

        return "";
    }

    protected function renderTitle(): string
    {
        if (get_object_vars($this->title->title)) {
            return "title: " . json_encode($this->title->title) . ",\n";
        }

        return "";
    }

    protected function renderXAxis(): string
    {
        if (is_array($this->xAxis)) {
            return $this->renderWithJavascriptCallback($this->xAxis, "xAxis");
        } elseif ($this->xAxis instanceof ChartOption) {
            return $this->renderWithJavascriptCallback($this->xAxis->xAxis, "xAxis");
        } else {
            return "";
        }
    }

    /**
     * @return string
     */
    protected function renderYAxis(): string
    {
        if (is_array($this->yAxis)) {
            return $this->renderWithJavascriptCallback($this->yAxis, "yAxis");
        } elseif ($this->yAxis instanceof ChartOption) {
            return $this->renderWithJavascriptCallback($this->yAxis->yAxis, "yAxis");
        } else {
            return "";
        }
    }

    protected function renderOptions(): string
    {
        $result = "";

        if (get_object_vars($this->global->global) || get_object_vars($this->lang->lang)) {
            $result .= "\n    Highcharts.setOptions({";
            $result .= $this->renderGlobal();
            $result .= $this->renderLang();
            $result .= "    });\n";
        }

        return $result;
    }

    protected function renderGlobal(): string
    {
        if (get_object_vars($this->global->global)) {
            return "global: " . json_encode($this->global->global) . ",\n";
        }

        return "";
    }

    protected function renderLang(): string
    {
        if (get_object_vars($this->lang->lang)) {
            return "lang: " . json_encode($this->lang->lang) . ",\n";
        }

        return "";
    }

    protected function renderScrollbar(): string
    {
        if (get_object_vars($this->scrollbar->scrollbar)) {
            return 'scrollbar: ' . json_encode($this->scrollbar->scrollbar) . ",\n";
        }

        return '';
    }
}
