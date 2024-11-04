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

    /**
     * Options for configuring accessibility for the chart.
     */
    public ChartOption $accessibility;
    /**
     * General options for the chart.
     */
    public ChartOption $chart;
    /**
     * An array containing the default colors for the chart's series.
     *
     * @var string[]
     */
    public array $colors = [];
    /**
     * The credit's label options.
     */
    public ChartOption $credits;
    /**
     * The options for the exporting module.
     */
    public ChartOption $exporting;
    /**
     * The global options.
     */
    public ChartOption $global;
    /**
     * The language object options.
     */
    public ChartOption $lang;
    /**
     * The legend is a box containing a symbol and name for each series item or point item in the chart.
     */
    public ChartOption $legend;
    /**
     * The plot options is a wrapper object for config objects for each series type.
     */
    public ChartOption $plotOptions;
    /**
     * The series options for specific data and the data itself.
     */
    public ChartOption $series;
    /**
     * The chart's subtitle options.
     */
    public ChartOption $subtitle;
    /**
     * The chart's main title options.
     */
    public ChartOption $title;
    /**
     * The options for the tooltip that appears when the user hovers over a series or point.
     */
    public ChartOption $tooltip;
    /**
     * The X axis or category axis options.
     */
    public ChartOption $xAxis;
    /**
     * The Y axis or value axis options.
     */
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
     * Enqueue chart expressions that must be replaced after encoding values to JSON.
     *
     * @param ChartExpression|array|scalar   $valueToEncode
     * @param array<string, ChartExpression> $expressions
     *
     * @return array|scalar
     */
    protected function enqueueExpressions(mixed $valueToEncode, array &$expressions): mixed
    {
        if ($valueToEncode instanceof ChartExpression) {
            $key = $valueToEncode->getMagicKey();
            $expressions[$key] = $valueToEncode;

            return $key;
        }

        if (\is_array($valueToEncode)) {
            /** @phpstan-var ChartExpression|array|scalar $value */
            foreach ($valueToEncode as $key => $value) {
                $valueToEncode[$key] = $this->enqueueExpressions($value, $expressions);
            }
        }

        return $valueToEncode;
    }

    /**
     * Gets the chart class (type) to create.
     */
    abstract protected function getChartClass(): string;

    /**
     * Gets where the chart must be rendered to (the 'div' target).
     */
    protected function getRenderTo(): string
    {
        return (string) ($this->chart->renderTo ?? 'chart');
    }

    /**
     * Inject chart expressions into the encoded value.
     *
     * @param array<string, ChartExpression> $expressions
     */
    protected function injectExpressions(string $encodedValue, array $expressions): string
    {
        $search = \array_map(
            static fn (ChartExpression $expression): string => $expression->getQuotedKey(),
            $expressions
        );
        $replace = \array_map(
            static fn (ChartExpression $expression): string => $expression->getExpression(),
            $expressions
        );

        return \str_replace($search, $replace, $encodedValue);
    }

    /**
     * Encode the given option or array to JSON.
     *
     * Returns an empty string if the name or the data are empty.
     */
    protected function jsonEncode(ChartOption|array $data, string $name = ''): string
    {
        if ($data instanceof ChartOption) {
            $name = $data->getName();
            $data = $data->getData();
        }
        if ('' === $name || [] === $data) {
            return '';
        }

        $expressions = [];
        $data = $this->enqueueExpressions($data, $expressions);
        $encoded = (string) \json_encode($data, \JSON_UNESCAPED_SLASHES);
        if ([] !== $expressions) {
            $encoded = $this->injectExpressions($encoded, $expressions);
        }

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
}
