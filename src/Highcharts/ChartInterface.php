<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Highcharts;

interface ChartInterface
{
    public function render(string $engine): string;
}
