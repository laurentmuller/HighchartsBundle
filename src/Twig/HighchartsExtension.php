<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Twig;

use Ob\HighchartsBundle\Highcharts\ChartInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class HighchartsExtension extends AbstractExtension
{
    public function chart(ChartInterface $chart, string $engine = 'jquery'): string
    {
        return $chart->render($engine);
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('chart', $this->chart(...), ['is_safe' => ['html']]),
        ];
    }
}
