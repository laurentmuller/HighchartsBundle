<?php

declare(strict_types=1);

namespace HighchartsBundle\Highcharts;

use Laminas\Json\Expr;
use Laminas\Json\Json;

/**
 * Abstract chart.
 */
abstract class AbstractChart implements ChartInterface
{
    // the script end line
    private const END_LINE = ",\n";

    // the space prefix
    private const SPACE = '        ';

    // The Zend json encode options.
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

    /**
     * Create an expression.
     *
     * @param string $expression the expression to represent
     * @param bool   $trim       true to trim whitespaces and new lines
     */
    protected function createExpression(string $expression, bool $trim = true): Expr
    {
        if ($trim) {
            $expression = (string) \preg_replace('/\s+/', ' ', \trim($expression));
        }

        return new Expr($expression);
    }

    /**
     * Gets the chart render to (target) property.
     */
    protected function getRenderTo(): string
    {
        return (string) ($this->chart->renderTo ?? 'chart');
    }

    protected function initArrayOption(string $name): void
    {
        $this->{$name} = [];
    }

    protected function initChartOption(string $name): void
    {
        $this->{$name} = new ChartOption($name);
    }

    protected function jsonEncode(ChartOption|array $data, string $name = ''): string
    {
        if ($data instanceof ChartOption) {
            $name = $data->getName();
            $data = $data->getData();
        }
        if ([] === $data) {
            return '';
        }

        $encoded = \json_encode($data);

        return self::SPACE . "$name: $encoded" . self::END_LINE;
    }

    protected function renderCallback(ChartOption|array $data, string $name = ''): string
    {
        if ($data instanceof ChartOption) {
            $name = $data->getName();
            $data = $data->getData();
        }
        if ([] === $data) {
            return '';
        }

        // Zend\Json is used in place of json_encode to preserve JS anonymous functions
        $encoded = Json::encode(valueToEncode: $data, options: self::ZEND_ENCODE_OPTIONS);

        return self::SPACE . "$name: $encoded" . self::END_LINE;
    }

    protected function renderChart(): string
    {
        return $this->renderCallback($this->chart);
    }

    protected function renderChartCommon(string &$chartJS): void
    {
        $chartJS .= $this->renderChart();
        $chartJS .= $this->renderColors();
        $chartJS .= $this->renderCredits();
        $chartJS .= $this->renderExporting();
        $chartJS .= $this->renderLegend();
        $chartJS .= $this->renderScrollbar();
        $chartJS .= $this->renderSubtitle();
        $chartJS .= $this->renderTitle();
        $chartJS .= $this->renderXAxis();
        $chartJS .= $this->renderYAxis();
        $chartJS .= $this->renderPlotOptions();
        $chartJS .= $this->renderSeries();
        $chartJS .= $this->renderTooltip();
    }

    protected function renderChartEnd(string &$chartJS, string $engine): void
    {
        // trim last trailing comma and close parenthesis
        $chartJS = \rtrim($chartJS, self::END_LINE) . "\n    });\n";
        if ('' !== $engine) {
            $chartJS .= "});\n";
        }
    }

    protected function renderChartOptions(string &$chartJS): void
    {
    }

    protected function renderChartStart(string &$chartJS, string $engine): void
    {
        $chartJS .= $this->renderEngine($engine);
        $chartJS .= $this->renderOptions();
    }

    protected function renderColors(): string
    {
        return $this->jsonEncode($this->colors, 'colors');
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

    protected function renderExporting(): string
    {
        return $this->renderCallback($this->exporting);
    }

    protected function renderGlobal(): string
    {
        return $this->jsonEncode($this->global);
    }

    protected function renderLang(): string
    {
        return $this->jsonEncode($this->lang);
    }

    protected function renderLegend(): string
    {
        return $this->renderCallback($this->legend);
    }

    protected function renderOptions(): string
    {
        if (!$this->global->hasData() && !$this->lang->hasData()) {
            return '';
        }

        $result = "\n    Highcharts.setOptions({\n";
        $result .= $this->renderGlobal();
        $result .= $this->renderLang();

        return $result . "    });\n";
    }

    protected function renderPlotOptions(): string
    {
        return $this->renderCallback($this->plotOptions);
    }

    protected function renderScrollbar(): string
    {
        return $this->jsonEncode($this->scrollbar);
    }

    protected function renderSeries(): string
    {
        return $this->renderCallback($this->series, 'series');
    }

    protected function renderSubtitle(): string
    {
        return $this->jsonEncode($this->subtitle);
    }

    protected function renderTitle(): string
    {
        return $this->jsonEncode($this->title);
    }

    protected function renderTooltip(): string
    {
        return $this->renderCallback($this->tooltip);
    }

    protected function renderXAxis(): string
    {
        return $this->renderCallback($this->xAxis, 'xAxis');
    }

    protected function renderYAxis(): string
    {
        return $this->renderCallback($this->yAxis, 'yAxis');
    }
}
