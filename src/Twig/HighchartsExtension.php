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
use HighchartsBundle\Highcharts\Engine;
use Twig\Error\SyntaxError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

/**
 * Twig extension to render charts.
 */
class HighchartsExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('chart', $this->chart(...), ['is_safe' => ['html']]),
        ];
    }

    /**
     * Render the given chart with the given engine.
     *
     * @throws SyntaxError if the engine is a string and the corresponding enumeration cannot be found
     */
    private function chart(ChartInterface $chart, Engine|string $engine = Engine::JQUERY): string
    {
        if (\is_string($engine)) {
            $engine = $this->parseEngine($engine);
        }

        return $chart->render($engine);
    }

    /**
     * @throws SyntaxError
     */
    private function parseEngine(string $engine): Engine
    {
        try {
            return Engine::from($engine);
        } catch (\ValueError $e) {
            throw new SyntaxError(\sprintf('Invalid chart engine: "%s".', $engine), previous: $e);
        }
    }
}
