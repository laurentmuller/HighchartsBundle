<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Laminas\Json\Expr;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Ob\HighchartsBundle\Tests\AbstractChartTestCase;

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
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"animation":"true"\}/'
        );

        $chart->tooltip['animation'] = 'false';
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"animation":"false"\}/'
        );
    }

    /**
     * backgroundColor option (rgba).
     */
    public function testBackgroundColor(): void
    {
        $chart = new Highchart();
        $chart->tooltip['backgroundColor'] = 'rgba(255, 255, 255, .85)';
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"backgroundColor":"rgba\(255, 255, 255, .85\)"\}/'
        );
    }

    /**
     * borderColor option (null/auto/rgba).
     */
    public function testBorderColor(): void
    {
        $chart = new Highchart();
        $chart->tooltip->borderColor('null');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"borderColor":"null"\}/'
        );

        $chart->tooltip->borderColor('auto');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"borderColor":"auto"\}/'
        );

        $chart->tooltip->borderColor('rgba(255, 255, 255, .85)');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"borderColor":"rgba\(255, 255, 255, .85\)"\}/'
        );
    }

    /**
     * borderRadius option (integer - radius in px).
     */
    public function testBorderRadius(): void
    {
        $chart = new Highchart();
        $chart->tooltip->borderRadius(5);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"borderRadius":5\}/'
        );

        $chart->tooltip->borderRadius('5');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"borderRadius":"5"\}/'
        );
    }

    /**
     * borderWidth option (integer - width in px).
     */
    public function testborderWidth(): void
    {
        $chart = new Highchart();
        $chart->tooltip->borderWidth(5);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"borderWidth":5\}/'
        );

        $chart->tooltip->borderWidth('5');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"borderWidth":"5"\}/'
        );
    }

    /**
     * enabled option (true/false).
     */
    public function testEnabled(): void
    {
        $chart = new Highchart();
        $chart->tooltip->enabled('true');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"enabled":"true"\}/'
        );

        $chart->tooltip->enabled('false');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"enabled":"false"\}/'
        );
    }

    /**
     * Formatter option (Zend Json Expr).
     */
    public function testFormatter(): void
    {
        $chart = new Highchart();
        $func = new Expr('function () { return 1; }');
        $chart->tooltip->formatter($func);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"formatter":function\s?\(\)\s?\{ return 1; \}\}/'
        );
    }

    /**
     * shadow option (true/false).
     */
    public function testShadow(): void
    {
        $chart = new Highchart();
        $chart->tooltip->shadow('true');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"shadow":"true"\}/'
        );

        $chart->tooltip->shadow('false');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/tooltip: \{"shadow":"false"\}/'
        );
    }
}
