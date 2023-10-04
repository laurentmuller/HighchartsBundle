<?php

declare(strict_types=1);

namespace HighchartsBundle\Tests\Highcharts;

use HighchartsBundle\Highcharts\Highchart;
use HighchartsBundle\Tests\AbstractChartTestCase;
use Laminas\Json\Expr;

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
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['animation'] = 'false';
        $regex = '/tooltip: \{"animation":"false"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * backgroundColor option (rgba).
     */
    public function testBackgroundColor(): void
    {
        $chart = new Highchart();
        $chart->tooltip['backgroundColor'] = 'rgba(255, 255, 255, .85)';
        $regex = '/tooltip: \{"backgroundColor":"rgba\(255, 255, 255, .85\)"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * borderColor option (null/auto/rgba).
     */
    public function testBorderColor(): void
    {
        $chart = new Highchart();
        $chart->tooltip['borderColor'] = 'null';
        $regex = '/tooltip: \{"borderColor":"null"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['borderColor'] = 'auto';
        $regex = '/tooltip: \{"borderColor":"auto"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['borderColor'] = 'rgba(255, 255, 255, .85)';
        $regex = '/tooltip: \{"borderColor":"rgba\(255, 255, 255, .85\)"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * borderRadius option (integer - radius in px).
     */
    public function testBorderRadius(): void
    {
        $chart = new Highchart();
        $chart->tooltip['borderRadius'] = 5;
        $regex = '/tooltip: \{"borderRadius":5\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['borderRadius'] = '5';
        $regex = '/tooltip: \{"borderRadius":"5"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * borderWidth option (integer - width in px).
     */
    public function testborderWidth(): void
    {
        $chart = new Highchart();
        $chart->tooltip['borderWidth'] = 5;
        $regex = '/tooltip: \{"borderWidth":5\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['borderWidth'] = '5';
        $regex = '/tooltip: \{"borderWidth":"5"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * enabled option (true/false).
     */
    public function testEnabled(): void
    {
        $chart = new Highchart();
        $chart->tooltip['enabled'] = 'true';
        $regex = '/tooltip: \{"enabled":"true"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['enabled'] = 'false';
        $regex = '/tooltip: \{"enabled":"false"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
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
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * shadow option (true/false).
     */
    public function testShadow(): void
    {
        $chart = new Highchart();
        $chart->tooltip['shadow'] = 'true';
        $regex = '/tooltip: \{"shadow":"true"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->tooltip['shadow'] = 'false';
        $regex = '/tooltip: \{"shadow":"false"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }
}
