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
use HighchartsBundle\Tests\AbstractChartTestCase;
use Laminas\Json\Expr;

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
        $chart->exporting['buttons'] = ['exportButton' => ['align' => 'center']];
        $regex = '/exporting: \{"buttons":\{"exportButton":\{"align":"center"\}\}\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['buttons'] = ['printButton' => ['align' => 'center']];
        $regex = '/exporting: \{"buttons":\{"printButton":\{"align":"center"\}\}\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        // backgroundColor option
        $chart->exporting['buttons'] = ['exportButton' => ['backgroundColor' => 'blue']];
        $regex = '/exporting: \{"buttons":\{"exportButton":\{"backgroundColor":"blue"\}\}\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['buttons'] = ['printButton' => ['backgroundColor' => 'blue']];
        $regex = '/exporting: \{"buttons":\{"printButton":\{"backgroundColor":"blue"\}\}\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

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
        $chart->exporting['enabled'] = true;
        $regex = '/exporting: \{"enabled":true\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['enabled'] = false;
        $regex = '/exporting: \{"enabled":false\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * filename option (string).
     */
    public function testFilename(): void
    {
        $chart = new Highchart();
        $chart->exporting['filename'] = 'graph';
        $regex = '/exporting: \{"filename":"graph"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * type option (string - image/png, image/jpeg, application/pdf or image/svg+xml).
     */
    public function testType(): void
    {
        $chart = new Highchart();
        // We need to use a Json Expr or else the slashes are escaped
        $chart->exporting['type'] = (new Expr('"image/png"'));
        $regex = '/exporting: \{"type":"image\/png"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['type'] = (new Expr('"image/jpeg"'));
        $regex = '/exporting: \{"type":"image\/jpeg"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['type'] = (new Expr('"application/pdf"'));
        $regex = '/exporting: \{"type":"application\/pdf"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['type'] = (new Expr('"image/svg+xml"'));
        $regex = '/exporting: \{"type":"image\/svg\+xml"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * url option (string).
     */
    public function testUrl(): void
    {
        $chart = new Highchart();
        // We need to use a Json Expr or else the slashes are escaped
        $chart->exporting['url'] = (new Expr('"https://www.google.com"'));
        $regex = '/exporting: \{"url":"https:\/\/www.google.com"\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * width option (integer - width in px).
     */
    public function testWidth(): void
    {
        $chart = new Highchart();
        $chart->exporting['width'] = 300;
        $regex = '/exporting: \{"width":300\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }
}
