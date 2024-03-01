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

use HighchartsBundle\Highcharts\AbstractChart;
use HighchartsBundle\Highcharts\Highchart;
use PHPUnit\Framework\TestCase;

/**
 * This class hold Unit Tests for the chart expression.
 */
class ExpressionTest extends TestCase
{
    public function testCreateExpression(): void
    {
        $expected = 'function() {location.href = this.url;}';
        $expression = AbstractChart::createExpression($expected);
        self::assertSame($expected, (string) $expression);
    }

    /**
     * Used only for code coverage.
     */
    public function testIsExpression(): void
    {
        $chart = new Highchart();
        $credits = $chart->credits;
        $expression = 'function() {location.href = this.url;}';
        $credits['test'] = [
            'entry' => 'entry',
            'expr' => AbstractChart::createExpression($expression),
        ];

        $actual = $chart->render();
        self::assertNotEmpty($actual);
    }
}
