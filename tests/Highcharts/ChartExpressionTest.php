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

class ChartExpressionTest extends TestCase
{
    public function testContainsExpression(): void
    {
        $chart = new Highchart();
        $script = 'function() {location.href = this.url;}';
        $expression = ChartExpression::instance($script);
        $chart->credits['test'] = [
            'entry' => 'entry',
            'expr' => $expression,
        ];

        $actual = $chart->render();
        self::assertStringContainsString($script, $actual);
    }

    public function testEnqueue(): void
    {
        /** @var \SplQueue<ChartExpression> $expressions */
        $expressions = new \SplQueue();
        $script = 'function() {location.href = this.url;}';
        $actual = ChartExpression::instance($script);
        $actual->enqueue($expressions);
        self::assertCount(1, $expressions);
        self::assertSame($expressions[0], $actual);
    }

    public function testInject(): void
    {
        $script = 'function() {location.href = this.url;}';
        $expression = ChartExpression::instance($script);
        $encodedValue = \sprintf('"%s"', $expression->getMagicKey());
        $actual = $expression->inject($encodedValue);
        self::assertSame($script, $actual);
    }

    public function testInstance(): void
    {
        $script = 'function() {location.href = this.url;}';
        $expression = ChartExpression::instance($script);
        self::assertSame($script, $expression->getExpression());
        self::assertSame($script, (string) $expression);
    }
}
