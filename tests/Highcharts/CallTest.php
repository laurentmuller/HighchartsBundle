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
use PHPUnit\Framework\TestCase;

class CallTest extends TestCase
{
    public function testCallColors(): void
    {
        $name = 'colors';
        $expected = [];
        $chart = new Highchart();
        $chart->__call($name, $expected);
        $actual = $chart->colors;
        self::assertSame($expected, $actual);
    }
}
