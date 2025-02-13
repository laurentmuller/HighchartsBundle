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
 * The render engine enumeration.
 *
 * @see ChartInterface::render()
 */
enum Engine: string
{
    /**
     * The JQuery engine.
     */
    case JQUERY = 'jquery';
    /**
     * The MooTools engine.
     */
    case MOOTOOLS = 'mootools';
    /**
     * No engine.
     */
    case NONE = '';
}
