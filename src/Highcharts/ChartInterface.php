<?php

declare(strict_types=1);

namespace HighchartsBundle\Highcharts;

interface ChartInterface
{
    public function render(string $engine): string;
}
