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
        $expected = '"expr":' . $script;
        self::assertStringContainsString($expected, $actual);
    }

    public function testInstance(): void
    {
        $script = 'function() {location.href = this.url;}';
        $expression = ChartExpression::instance($script);
        self::assertSame($script, $expression->getExpression());
        self::assertSame($script, (string) $expression);
    }

    public function testMagicKey(): void
    {
        $script = 'function() {location.href = this.url;}';
        $expected = \md5($script);
        $expression = ChartExpression::instance($script);
        $actual = $expression->getMagicKey();
        self::assertSame($expected, $actual);
    }

    public function testQuotedKey(): void
    {
        $script = 'function() {location.href = this.url;}';
        $expression = ChartExpression::instance($script);
        $actual = $expression->getQuotedKey();
        $expected = '"' . $expression->getMagicKey() . '"';
        self::assertSame($expected, $actual);
    }

    public function testTrimExpression(): void
    {
        $script = ' function()  {location.href  =  this.url;}  ';
        $expression = ChartExpression::instance($script);
        $expected = 'function() {location.href = this.url;}';
        $actual = $expression->getExpression();
        self::assertSame($expected, $actual);
    }
}
