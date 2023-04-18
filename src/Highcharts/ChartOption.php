<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Highcharts;

/**
 * This class is part of the Ob/HighchartsBundle
 * See Highcharts documentation at http://www.highcharts.com/ref/#chart.
 *
 * @property object|array chart
 * @property object|array colorAxis
 * @property object|array credit
 * @property object|array drilldown
 * @property object|array exporting
 * @property object|array global
 * @property object|array lang
 * @property object|array legend
 * @property object|array nodata
 * @property object|array pane
 * @property object|array plotOptions
 * @property object|array rangeSelector
 * @property object|array scrollbar
 * @property object|array subtitle
 * @property object|array title
 * @property object|array tooltip
 * @property object|array xAxis
 * @property object|array yAxis
 */
#[\AllowDynamicProperties]
class ChartOption
{
    public function __construct(private readonly string $name)
    {
        $option_name = $this->name;
        $this->{$option_name} = new \stdClass();
    }

    public function __call(string $name, array $value): self
    {
        $option_name = $this->name;
        $this->{$option_name}->{$name} = $value[0];

        return $this;
    }

    public function __get(string $name): mixed
    {
        $option_name = $this->name;

        return $this->{$option_name}->{$name};
    }

    public function __isset(string $name): bool
    {
        $option_name = $this->name;

        return isset($this->{$option_name}->{$name});
    }
}
