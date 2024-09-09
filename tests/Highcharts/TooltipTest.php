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

use HighchartsBundle\Highcharts\Expr;
use HighchartsBundle\Highcharts\Highchart;
use HighchartsBundle\Tests\AbstractChartTestCase;

/**
 * This class hold Unit Tests for the tooltip option.
 */
class TooltipTest extends AbstractChartTestCase
{
    /**
     * Animation option (true/false).
     */
    public function testAnimation(): void
    {
        $chart = new Highchart();
        $chart->tooltip['animation'] = 'true';
        $regex = '/tooltip: \{"animation":"true"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['animation'] = 'false';
        $regex = '/tooltip: \{"animation":"false"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * backgroundColor option (rgba).
     */
    public function testBackgroundColor(): void
    {
        $chart = new Highchart();
        $chart->tooltip['backgroundColor'] = 'rgba(255, 255, 255, .85)';
        $regex = '/tooltip: \{"backgroundColor":"rgba\(255, 255, 255, .85\)"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * borderColor option (null/auto/rgba).
     */
    public function testBorderColor(): void
    {
        $chart = new Highchart();
        $chart->tooltip['borderColor'] = 'null';
        $regex = '/tooltip: \{"borderColor":"null"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['borderColor'] = 'auto';
        $regex = '/tooltip: \{"borderColor":"auto"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['borderColor'] = 'rgba(255, 255, 255, .85)';
        $regex = '/tooltip: \{"borderColor":"rgba\(255, 255, 255, .85\)"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * borderRadius option (integer - radius in px).
     */
    public function testBorderRadius(): void
    {
        $chart = new Highchart();
        $chart->tooltip['borderRadius'] = 5;
        $regex = '/tooltip: \{"borderRadius":5\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['borderRadius'] = '5';
        $regex = '/tooltip: \{"borderRadius":"5"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * borderWidth option (integer - width in px).
     */
    public function testborderWidth(): void
    {
        $chart = new Highchart();
        $chart->tooltip['borderWidth'] = 5;
        $regex = '/tooltip: \{"borderWidth":5\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['borderWidth'] = '5';
        $regex = '/tooltip: \{"borderWidth":"5"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * enabled option (true/false).
     */
    public function testEnabled(): void
    {
        $chart = new Highchart();
        $chart->tooltip['enabled'] = 'true';
        $regex = '/tooltip: \{"enabled":"true"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['enabled'] = 'false';
        $regex = '/tooltip: \{"enabled":"false"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * Formatter option (Zend Json Expr).
     */
    public function testFormatter(): void
    {
        $chart = new Highchart();
        $func = new Expr('function () { return 1; }');
        $chart->tooltip['formatter'] = $func;
        $regex = '/tooltip: \{"formatter":function\s?\(\)\s?\{ return 1; \}\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * shadow option (true/false).
     */
    public function testShadow(): void
    {
        $chart = new Highchart();
        $chart->tooltip['shadow'] = 'true';
        $regex = '/tooltip: \{"shadow":"true"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['shadow'] = 'false';
        $regex = '/tooltip: \{"shadow":"false"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }
}
