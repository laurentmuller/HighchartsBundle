<?php

namespace Ob\HighchartsBundle\Highcharts;

/**
 * This class is part of the Ob/HighchartsBundle
 * See Highcharts documentation at http://www.highcharts.com/ref/#chart
 */
class ChartOption
{
    private string $option_name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->option_name = $name;
        $this->{$name} = new \stdClass();
    }

    /**
     * @param string $name
     * @param array  $value
     *
     * @return $this
     */
    public function __call(string $name, array $value): self
    {
        $option_name = $this->option_name;
        $this->{$option_name}->{$name} = $value[0];

        return $this;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name): mixed
    {
        $option_name = $this->option_name;

        return $this->{$option_name}->{$name};
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function __isset(string $name): bool
    {
        $option_name = $this->option_name;

        return isset($this->{$option_name}->{$name});
    }
}
