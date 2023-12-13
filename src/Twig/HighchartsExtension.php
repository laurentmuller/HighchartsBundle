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

/**
 * Twig extension to render charts.
 */
class HighchartsExtension extends AbstractExtension
{
    /**
     * Render the given chart with the given engine.
     *
     * @psalm-param ChartInterface::ENGINE_* $engine
     */
    public function chart(ChartInterface $chart, string $engine = ChartInterface::ENGINE_JQUERY): string
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
