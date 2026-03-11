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
    private const string END_LINE = ",\n";

    // the half-space prefix
    private const string HALF_SPACE = '    ';

    // the script new line
    private const string NEW_LINE = "\n";

    // the space prefix
    private const string SPACE = '        ';

    /** Options for configuring accessibility for the chart. */
    public ChartOption $accessibility;
    /** General options for the chart. */
    public ChartOption $chart;
    /**
     * An array containing the default colors for the chart's series.
     *
     * @var string[]
     */
    public array $colors = [];
    /** The credit's label options. */
    public ChartOption $credits;
    /** The options for the exporting module. */
    public ChartOption $exporting;
    /** The global options. */
    public ChartOption $global;
    /** The language object options. */
    public ChartOption $lang;
    /** The legend is a box containing a symbol and name for each series item or point item in the chart. */
    public ChartOption $legend;
    /** The plot options is a wrapper object for config objects for each series type. */
    public ChartOption $plotOptions;
    /** The series options for specific data and the data itself. */
    public ChartOption $series;
    /** The chart's subtitle options. */
    public ChartOption $subtitle;
    /** The chart's main title options. */
    public ChartOption $title;
    /** The options for the tooltip that appears when the user hovers over a series or point. */
    public ChartOption $tooltip;
    /** The X axis or category axis options. */
    public ChartOption $xAxis;
    /** The Y axis or value axis options. */
    public ChartOption $yAxis;

    public function __construct()
    {
        $this->accessibility = ChartOption::instance('accessibility');
        $this->chart = ChartOption::instance('chart');
        $this->credits = ChartOption::instance('credits');
        $this->exporting = ChartOption::instance('exporting');
        $this->global = ChartOption::instance('global');
        $this->lang = ChartOption::instance('lang');
        $this->legend = ChartOption::instance('legend');
        $this->plotOptions = ChartOption::instance('plotOptions');
        $this->series = ChartOption::instance('series');
        $this->subtitle = ChartOption::instance('subtitle');
        $this->title = ChartOption::instance('title');
        $this->tooltip = ChartOption::instance('tooltip');
        $this->xAxis = ChartOption::instance('xAxis');
        $this->yAxis = ChartOption::instance('yAxis');
    }

    #[\Override]
    public function render(Engine $engine = Engine::JQUERY): string
    {
        $chartJS = $this->implode(
            $this->renderChartStart($engine),
            $this->renderChartCommon(),
            $this->renderChartOptions()
        );
        $chartJS = \rtrim($chartJS, self::END_LINE);
        $chartJS .= $this->renderChartEnd($engine);

        return \trim($chartJS);
    }

    /**
     * Enqueue chart expressions that must be replaced after encoding values to JSON.
     *
     * @param ChartExpression|array<array-key, mixed>|scalar $valueToEncode
     * @param array<string, ChartExpression>                 $expressions
     *
     * @return array<array-key, mixed>|scalar
     */
    protected function enqueueExpressions(mixed $valueToEncode, array &$expressions): mixed
    {
        if ($valueToEncode instanceof ChartExpression) {
            $key = $valueToEncode->getKey();
            $expressions[$key] = $valueToEncode;

            return $key;
        }

        if (\is_array($valueToEncode)) {
            /** @var ChartExpression|array<array-key, mixed>|scalar $value */
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
        if (isset($this->chart['renderTo']) && \is_string($this->chart['renderTo'])) {
            return $this->chart['renderTo'];
        }

        return 'chart';
    }

    /**
     * Join the given values.
     *
     * @param string ...$values the array of strings to implode.
     */
    protected function implode(string ...$values): string
    {
        return \implode('', $values);
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
     * @param ChartOption|array<array-key, mixed> $data
     *
     * Returns an empty string if the name or the data are empty
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

        return \sprintf('%s%s: %s%s', self::SPACE, $name, $encoded, self::END_LINE);
    }

    protected function renderAccessibility(): string
    {
        return $this->jsonEncode($this->accessibility);
    }

    protected function renderChart(): string
    {
        return $this->jsonEncode($this->chart);
    }

    protected function renderChartClass(): string
    {
        return $this->implode(
            self::NEW_LINE,
            self::HALF_SPACE,
            \sprintf('const %s = new Highcharts.%s({', $this->getRenderTo(), $this->getChartClass()),
            self::NEW_LINE
        );
    }

    protected function renderChartCommon(): string
    {
        return $this->implode(
            $this->renderChart(),
            $this->renderColors(),
            $this->renderCredits(),
            $this->renderExporting(),
            $this->renderLegend(),
            $this->renderSubtitle(),
            $this->renderTitle(),
            $this->renderXAxis(),
            $this->renderYAxis(),
            $this->renderPlotOptions(),
            $this->renderSeries(),
            $this->renderTooltip(),
            $this->renderAccessibility()
        );
    }

    protected function renderChartEnd(Engine $engine): string
    {
        $chartJS = $this->implode(
            self::NEW_LINE,
            self::HALF_SPACE,
            '});',
            self::NEW_LINE
        );
        if (Engine::NONE === $engine) {
            return $chartJS;
        }

        return $this->implode(
            $chartJS,
            '});',
            self::NEW_LINE
        );
    }

    protected function renderChartOptions(): string
    {
        return '';
    }

    protected function renderChartStart(Engine $engine): string
    {
        return $this->implode(
            $this->renderEngine($engine),
            $this->renderOptions(),
            $this->renderChartClass()
        );
    }

    protected function renderColors(): string
    {
        return $this->jsonEncode($this->colors, 'colors');
    }

    protected function renderCredits(): string
    {
        return $this->jsonEncode($this->credits);
    }

    protected function renderEngine(Engine $engine): string
    {
        return match ($engine) {
            Engine::MOOTOOLS => "window.addEvent('domready', function () {",
            Engine::JQUERY => '$(function () {',
            default => '',
        };
    }

    protected function renderExporting(): string
    {
        return $this->jsonEncode($this->exporting);
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
        return $this->jsonEncode($this->legend);
    }

    protected function renderOptions(): string
    {
        if ($this->global->isEmpty() && $this->lang->isEmpty()) {
            return '';
        }

        return $this->implode(
            self::NEW_LINE,
            self::HALF_SPACE,
            'Highcharts.setOptions({',
            self::NEW_LINE,
            $this->renderGlobal(),
            $this->renderLang(),
            self::HALF_SPACE,
            '});'
        );
    }

    protected function renderPlotOptions(): string
    {
        return $this->jsonEncode($this->plotOptions);
    }

    protected function renderSeries(): string
    {
        return $this->jsonEncode($this->series);
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
        return $this->jsonEncode($this->tooltip);
    }

    protected function renderXAxis(): string
    {
        return $this->jsonEncode($this->xAxis);
    }

    protected function renderYAxis(): string
    {
        return $this->jsonEncode($this->yAxis);
    }
}
