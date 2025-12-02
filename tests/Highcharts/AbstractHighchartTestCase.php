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

namespace HighchartsBundle\Tests\Highcharts;

use HighchartsBundle\Highcharts\Highchart;
use HighchartsBundle\Tests\AbstractChartTestCase;

/**
 * @extends AbstractChartTestCase<Highchart>
 */
abstract class AbstractHighchartTestCase extends AbstractChartTestCase
{
    #[\Override]
    final protected function createChart(): Highchart
    {
        return new Highchart();
    }
}
