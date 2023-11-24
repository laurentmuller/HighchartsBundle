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

namespace HighchartsBundle\Twig;

use HighchartsBundle\Highcharts\ChartInterface;
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
