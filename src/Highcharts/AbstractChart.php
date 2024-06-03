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

use Laminas\Json\Expr;
use Laminas\Json\Json;

/**
 * Abstract chart.
 */
abstract class AbstractChart implements ChartInterface
{
    // the script end line
    private const END_LINE = ",\n";

    // the half-space prefix
    private const HALF_SPACE = '    ';

    // the script new line
    private const NEW_LINE = "\n";

    // the space prefix
    private const SPACE = '        ';

    // The Zend json encode options.
    private const ZEND_ENCODE_OPTIONS = ['enableJsonExprFinder' => true];

    public ChartOption $accessibility;
    public ChartOption $chart;
    /** @var string[] */
    public array $colors = [];
    public ChartOption $credits;
    public ChartOption $exporting;
    public ChartOption $global;
    public ChartOption $lang;
    public ChartOption $legend;
    public ChartOption $plotOptions;
    public ChartOption $scrollbar;
    public ChartOption $series;
    public ChartOption $subtitle;
    public ChartOption $title;
    public ChartOption $tooltip;
    public ChartOption $xAxis;
    public ChartOption $yAxis;

    public function __construct()
    {
        $this->accessibility = new ChartOption('accessibility');
        $this->chart = new ChartOption('chart');
        $this->credits = new ChartOption('credits');
        $this->exporting = new ChartOption('exporting');
        $this->global = new ChartOption('global');
        $this->lang = new ChartOption('lang');
        $this->legend = new ChartOption('legend');
        $this->plotOptions = new ChartOption('plotOptions');
        $this->scrollbar = new ChartOption('scrollbar');
        $this->series = new ChartOption('series');
        $this->subtitle = new ChartOption('subtitle');
        $this->title = new ChartOption('title');
        $this->tooltip = new ChartOption('tooltip');
        $this->xAxis = new ChartOption('xAxis');
        $this->yAxis = new ChartOption('yAxis');
    }

    public function __call(string $name, mixed $value): static
    {
        $this->$name = $value;

        return $this;
    }

    /**
     * Create an expression.
     *
     * @param string $expression the expression to represent
     *
     * @psalm-api
     */
    public static function createExpression(string $expression): Expr
    {
        // remove consecutive spaces
        $expression = (string) \preg_replace('/\s+/', ' ', \trim($expression));

        return new Expr($expression);
    }

    public function render(Engine $engine = Engine::JQUERY): string
    {
        $chartJS = '';
        $this->renderChartStart($chartJS, $engine);
        $this->renderChartCommon($chartJS);
        $this->renderChartOptions($chartJS);
        $this->renderChartEnd($chartJS, $engine);

        return \trim($chartJS);
    }

    /**
     * Gets the chart class (type) to create.
     */
    abstract protected function getChartClass(): string;

    /**
     * Gets the chart render to (target) property.
     */
    protected function getRenderTo(): string
    {
        return (string) ($this->chart->renderTo ?? 'chart');
    }

    protected function jsonEncode(ChartOption|array $data, string $name = ''): string
    {
        if ($data instanceof ChartOption) {
            $name = $data->getName();
            $data = $data->getData();
        }
        if ('' === $name || [] === $data) {
            return '';
        }

        // Zend\Json is used in place of json_encode to preserve JS anonymous functions
        $encoded = $this->isExpression($data)
            ? Json::encode(valueToEncode: $data, options: self::ZEND_ENCODE_OPTIONS)
            : (string) \json_encode($data);

        return self::SPACE . $name . ': ' . $encoded . self::END_LINE;
    }

    protected function renderAccessibility(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->accessibility);
    }

    protected function renderChart(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->chart);
    }

    protected function renderChartClass(string &$chartJS): void
    {
        $renderTo = $this->getRenderTo();
        $class = $this->getChartClass();
        $chartJS .= self::NEW_LINE . self::HALF_SPACE . "const $renderTo = new Highcharts.$class({" . self::NEW_LINE;
    }

    protected function renderChartCommon(string &$chartJS): void
    {
        $this->renderChart($chartJS);
        $this->renderColors($chartJS);
        $this->renderCredits($chartJS);
        $this->renderExporting($chartJS);
        $this->renderLegend($chartJS);
        $this->renderScrollbar($chartJS);
        $this->renderSubtitle($chartJS);
        $this->renderTitle($chartJS);
        $this->renderXAxis($chartJS);
        $this->renderYAxis($chartJS);
        $this->renderPlotOptions($chartJS);
        $this->renderSeries($chartJS);
        $this->renderTooltip($chartJS);
        $this->renderAccessibility($chartJS);
    }

    protected function renderChartEnd(string &$chartJS, Engine $engine): void
    {
        $chartJS = \rtrim($chartJS, self::END_LINE) . self::NEW_LINE . self::HALF_SPACE . '});' . self::NEW_LINE;
        if (Engine::NONE !== $engine) {
            $chartJS .= '});' . self::NEW_LINE;
        }
    }

    protected function renderChartOptions(string &$chartJS): void
    {
    }

    protected function renderChartStart(string &$chartJS, Engine $engine): void
    {
        $this->renderEngine($chartJS, $engine);
        $this->renderOptions($chartJS);
        $this->renderChartClass($chartJS);
    }

    protected function renderColors(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->colors, 'colors');
    }

    protected function renderCredits(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->credits);
    }

    protected function renderEngine(string &$chartJS, Engine $engine): void
    {
        $chartJS .= match ($engine) {
            Engine::MOOTOOLS => 'window.addEvent(\'domready\', function () {',
            Engine::JQUERY => '$(function () {',
            default => '',
        };
    }

    protected function renderExporting(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->exporting);
    }

    protected function renderGlobal(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->global);
    }

    protected function renderLang(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->lang);
    }

    protected function renderLegend(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->legend);
    }

    protected function renderOptions(string &$chartJS): void
    {
        if (!$this->global->hasData() && !$this->lang->hasData()) {
            return;
        }

        $chartJS .= self::NEW_LINE . self::HALF_SPACE . 'Highcharts.setOptions({' . self::NEW_LINE;
        $this->renderGlobal($chartJS);
        $this->renderLang($chartJS);
        $chartJS .= self::HALF_SPACE . '});';
    }

    protected function renderPlotOptions(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->plotOptions);
    }

    protected function renderScrollbar(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->scrollbar);
    }

    protected function renderSeries(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->series);
    }

    protected function renderSubtitle(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->subtitle);
    }

    protected function renderTitle(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->title);
    }

    protected function renderTooltip(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->tooltip);
    }

    protected function renderXAxis(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->xAxis);
    }

    protected function renderYAxis(string &$chartJS): void
    {
        $chartJS .= $this->jsonEncode($this->yAxis);
    }

    private function isExpression(array $values): bool
    {
        /** @psalm-var mixed $value */
        foreach ($values as $value) {
            if ($value instanceof Expr) {
                return true;
            } elseif (\is_array($value) && $this->isExpression($value)) {
                return true;
            }
        }

        return false;
    }
}
