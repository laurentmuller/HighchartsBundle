<?php

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\Highchart;
use Zend\Json\Expr;
use PHPUnit\Framework\TestCase;

/**
 * This class hold Unit tests for the tooltip option
 */
class TooltipTest extends TestCase
{
    /**
     * Animation option (true/false)
     */
    public function testAnimation()
    {
        $chart = new Highchart();

        $chart->tooltip->animation("true");
        $this->assertMatchesRegularExpression('/tooltip: \{"animation":"true"\}/', $chart->render());

        $chart->tooltip->animation("false");
        $this->assertMatchesRegularExpression('/tooltip: \{"animation":"false"\}/', $chart->render());
    }

    /**
     * backgroundColor option (rgba)
     */
    public function testBackgroundColor()
    {
        $chart = new Highchart();

        $chart->tooltip->backgroundColor("rgba(255, 255, 255, .85)");
        $this->assertMatchesRegularExpression('/tooltip: \{"backgroundColor":"rgba\(255, 255, 255, .85\)"\}/', $chart->render());
    }

    /**
     * borderColor option (null/auto/rgba)
     */
    public function testBorderColor()
    {
        $chart = new Highchart();

        $chart->tooltip->borderColor('null');
        $this->assertMatchesRegularExpression('/tooltip: \{"borderColor":"null"\}/', $chart->render());

        $chart->tooltip->borderColor('auto');
        $this->assertMatchesRegularExpression('/tooltip: \{"borderColor":"auto"\}/', $chart->render());

        $chart->tooltip->borderColor('rgba(255, 255, 255, .85)');
        $this->assertMatchesRegularExpression('/tooltip: \{"borderColor":"rgba\(255, 255, 255, .85\)"\}/', $chart->render());
    }

    /**
     * borderRadius option (integer - radius in px)
     */
    public function testBorderRadius()
    {
        $chart = new Highchart();

        $chart->tooltip->borderRadius(5);
        $this->assertMatchesRegularExpression('/tooltip: \{"borderRadius":5\}/', $chart->render());

        $chart->tooltip->borderRadius("5");
        $this->assertMatchesRegularExpression('/tooltip: \{"borderRadius":"5"\}/', $chart->render());
    }

    /**
     * borderWidth option (integer - width in px)
     */
    public function testborderWidth()
    {
        $chart = new Highchart();

        $chart->tooltip->borderWidth(5);
        $this->assertMatchesRegularExpression('/tooltip: \{"borderWidth":5\}/', $chart->render());

        $chart->tooltip->borderWidth("5");
        $this->assertMatchesRegularExpression('/tooltip: \{"borderWidth":"5"\}/', $chart->render());
    }

    /**
     * enabled option (true/false)
     */
    public function testEnabled()
    {
        $chart = new Highchart();

        $chart->tooltip->enabled("true");
        $this->assertMatchesRegularExpression('/tooltip: \{"enabled":"true"\}/', $chart->render());

        $chart->tooltip->enabled("false");
        $this->assertMatchesRegularExpression('/tooltip: \{"enabled":"false"\}/', $chart->render());
    }

    /**
     * Formatter option (Zend Json Expr)
     */
    public function testFormatter()
    {
        $chart = new Highchart();

        $func = new Expr('function () { return 1; }');

        $chart->tooltip->formatter($func);
        $this->assertMatchesRegularExpression('/tooltip: \{"formatter":function\s?\(\)\s?\{ return 1; \}\}/', $chart->render());
    }

    /**
     * shadow option (true/false)
     */
    public function testShadow()
    {
        $chart = new Highchart();

        $chart->tooltip->shadow("true");
        $this->assertMatchesRegularExpression('/tooltip: \{"shadow":"true"\}/', $chart->render());

        $chart->tooltip->shadow("false");
        $this->assertMatchesRegularExpression('/tooltip: \{"shadow":"false"\}/', $chart->render());
    }
}
