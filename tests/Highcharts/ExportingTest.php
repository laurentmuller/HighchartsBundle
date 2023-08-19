<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Laminas\Json\Expr;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Ob\HighchartsBundle\Tests\AbstractChartTestCase;

/**
 * This class hold Unit Tests for the exporting option.
 */
class ExportingTest extends AbstractChartTestCase
{
    /**
     * buttons option.
     */
    public function testButtons(): void
    {
        $chart = new Highchart();
        // align option (string - left/center/right)
        $chart->exporting->buttons(['exportButton' => ['align' => 'center']]);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"buttons":\{"exportButton":\{"align":"center"\}\}\}/'
        );

        $chart->exporting->buttons(['printButton' => ['align' => 'center']]);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"buttons":\{"printButton":\{"align":"center"\}\}\}/'
        );

        // backgroundColor option
        $chart->exporting->buttons(['exportButton' => ['backgroundColor' => 'blue']]);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"buttons":\{"exportButton":\{"backgroundColor":"blue"\}\}\}/'
        );

        $chart->exporting->buttons(['printButton' => ['backgroundColor' => 'blue']]);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"buttons":\{"printButton":\{"backgroundColor":"blue"\}\}\}/'
        );

        // borderColor option
        // borderRadius option
        // borderWidth option
        // enabled option
        // height option
        // hoverBorderColor option
        // hoverSymbolFill option
        // hoverSymbolStroke option
        // menuItems option
        // onclick option
        // symbol option
        // symbolFill option
        // symbolSize option
        // symbolStroke option (color)
        // symbolStrokeWidth option (integer - stroke width in px)
        // symbolX option (float)
        // symbolY option (float)
        // verticalAlign option (string - top/middle/bottom)
        // width option (integer - width in px)
        // x option (integer - horizontal offset in px)
        // y option (integer - vertical offset in px)
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * chartOptions option.
     */
    public function testChartOptions(): void
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * enabled option (true/false).
     */
    public function testEnabled(): void
    {
        $chart = new Highchart();
        $chart->exporting->enabled(true);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"enabled":true\}/'
        );
        $chart->exporting->enabled(false);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"enabled":false\}/'
        );
    }

    /**
     * filename option (string).
     */
    public function testFilename(): void
    {
        $chart = new Highchart();
        $chart->exporting->filename('graph');
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"filename":"graph"\}/'
        );
    }

    /**
     * type option (string - image/png, image/jpeg, application/pdf or image/svg+xml).
     */
    public function testType(): void
    {
        $chart = new Highchart();
        // We need to use a Json Expr or else the slashes are escaped
        $chart->exporting->type(new Expr('"image/png"'));
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"type":"image\/png"\}/'
        );

        $chart->exporting->type(new Expr('"image/jpeg"'));
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"type":"image\/jpeg"\}/'
        );

        $chart->exporting->type(new Expr('"application/pdf"'));
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"type":"application\/pdf"\}/'
        );

        $chart->exporting->type(new Expr('"image/svg+xml"'));
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"type":"image\/svg\+xml"\}/'
        );
    }

    /**
     * url option (string).
     */
    public function testUrl(): void
    {
        $chart = new Highchart();
        // We need to use a Json Expr or else the slashes are escaped
        $chart->exporting->url(new Expr('"http://www.google.com"'));
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"url":"http:\/\/www.google.com"\}/'
        );
    }

    /**
     * width option (integer - width in px).
     */
    public function testWidth(): void
    {
        $chart = new Highchart();
        $chart->exporting->width(300);
        $this->assertChartMatchesRegularExpression(
            $chart,
            '/exporting: \{"width":300\}/'
        );
    }
}
