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
    public const ENGINE_JQUERY = 'jquery';

    public const ENGINE_MOOTOOLS = 'mootools';

    public const ENGINE_NONE = '';

    /**
     * Render this chart for the given engine.
     *
     * @psalm-param self::ENGINE_* $engine
     */
    public function render(string $engine): string;
}
