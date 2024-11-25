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
 * Chart interface.
 */
interface ChartInterface
{
    /**
     * Render this chart for the given engine.
     */
    public function render(Engine $engine): string;
}
