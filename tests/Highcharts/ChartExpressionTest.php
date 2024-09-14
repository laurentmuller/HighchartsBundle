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

use HighchartsBundle\Highcharts\ChartExpression;
use HighchartsBundle\Highcharts\Highchart;
use PHPUnit\Framework\TestCase;

/**
 * This class hold Unit Tests for the chart expression.
 */
class ChartExpressionTest extends TestCase
{
    public function testInjectExpression(): void
    {
        $script = 'function() {location.href = this.url;}';
        $expression = ChartExpression::instance($script);
        $encodedValue = \sprintf('"%s"', $expression->getMagicKey());
        $actual = $expression->injectExpression($encodedValue);
        self::assertSame($script, $actual);
    }

    public function testInstance(): void
    {
        $expression = 'function() {location.href = this.url;}';
        $actual = ChartExpression::instance($expression);
        self::assertSame($expression, (string) $actual);
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
            'expr' => ChartExpression::instance($expression),
        ];

        $actual = $chart->render();
        self::assertNotEmpty($actual);
    }
}
