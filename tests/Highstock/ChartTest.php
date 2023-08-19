<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highstock;

use Ob\HighchartsBundle\Highcharts\Highstock;
use Ob\HighchartsBundle\Tests\AbstractChartTestCase;

class ChartTest extends AbstractChartTestCase
{
    private ?Highstock $chart = null;

    protected function setUp(): void
    {
        $this->chart = new Highstock();
    }

    public function testAlignTicks(): void
    {
        $this->assertNotNull($this->chart);
        $this->chart->chart->alignTicks(true);
        $this->assertTrue($this->chart->chart->alignTicks);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"alignTicks":true/'
        );

        $this->chart->chart->alignTicks(false);
        $this->assertFalse($this->chart->chart->alignTicks);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"alignTicks":false/'
        );
    }

    public function testAnimation(): void
    {
        $this->assertNotNull($this->chart);
        $this->chart->chart->animation(true);
        $this->assertTrue($this->chart->chart->animation);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"animation":true/'
        );

        $this->chart->chart->animation(false);
        $this->assertFalse($this->chart->chart->animation);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"animation":false/'
        );
    }

    public function testBackgroundColor(): void
    {
        $this->assertNotNull($this->chart);
        $color = '#ffffff';
        $this->chart->chart->backgroundColor($color);
        $this->assertSame($color, $this->chart->chart->backgroundColor);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"backgroundColor":"#ffffff"/'
        );
    }

    public function testBorderColor(): void
    {
        $this->assertNotNull($this->chart);
        $color = '#4572a7';
        $this->chart->chart->borderColor($color);
        $this->assertSame($color, $this->chart->chart->borderColor);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"borderColor":"#4572a7"/'
        );
    }

    public function testBorderRadius(): void
    {
        $this->assertNotNull($this->chart);
        $radius = 5;
        $this->chart->chart->borderRadius($radius);
        $this->assertSame($radius, $this->chart->chart->borderRadius);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"borderRadius":5/'
        );
    }

    public function testBorderWidth(): void
    {
        $this->assertNotNull($this->chart);
        $width = 0;
        $this->chart->chart->borderWidth($width);
        $this->assertSame($width, $this->chart->chart->borderWidth);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"borderWidth":0/'
        );
    }

    public function testClassName(): void
    {
        $this->assertNotNull($this->chart);
        $class = 'extraClass';
        $this->chart->chart->className($class);
        $this->assertSame($class, $this->chart->chart->className);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"className":"extraClass"/'
        );
    }

    public function testEvents(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testHeight(): void
    {
        $this->assertNotNull($this->chart);
        $height = '300px';
        $this->chart->chart->height($height);
        $this->assertSame($height, $this->chart->chart->height);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"height":"300px"/'
        );
    }

    public function testIgnoreHiddenSeries(): void
    {
        $this->assertNotNull($this->chart);
        $this->chart->chart->ignoreHiddenSeries(true);
        $this->assertTrue($this->chart->chart->ignoreHiddenSeries);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"ignoreHiddenSeries":true/'
        );

        $this->chart->chart->ignoreHiddenSeries(false);
        $this->assertFalse($this->chart->chart->ignoreHiddenSeries);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"ignoreHiddenSeries":false/'
        );
    }

    public function testMargin(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testMarginBottom(): void
    {
        $this->assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginBottom($margin);
        $this->assertSame($margin, $this->chart->chart->marginBottom);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"marginBottom":"150px"/'
        );
    }

    public function testMarginLeft(): void
    {
        $this->assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginLeft($margin);
        $this->assertSame($margin, $this->chart->chart->marginLeft);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"marginLeft":"150px"/'
        );
    }

    public function testMarginRight(): void
    {
        $this->assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginRight($margin);
        $this->assertSame($margin, $this->chart->chart->marginRight);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"marginRight":"150px"/'
        );
    }

    public function testMarginTop(): void
    {
        $this->assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginTop($margin);
        $this->assertSame($margin, $this->chart->chart->marginTop);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"marginTop":"150px"/'
        );
    }

    public function testPanning(): void
    {
        $this->assertNotNull($this->chart);
        $this->chart->chart->panning(true);
        $this->assertTrue($this->chart->chart->panning);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"panning":true/'
        );

        $this->chart->chart->panning(false);
        $this->assertFalse($this->chart->chart->panning);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"panning":false/'
        );
    }

    public function testPlotBackgroundColor(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testPlotBackgroundImage(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testPlotBorderColor(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testPlotBorderWidth(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testPlotShadow(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testReflow(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testRenderTo(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testSelectionMarkerFIll(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testShadow(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testSpacing(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testSpacingBottom(): void
    {
        $this->assertNotNull($this->chart);
        $spacing = 15;
        $this->chart->chart->spacingBottom($spacing);
        $this->assertSame($spacing, $this->chart->chart->spacingBottom);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"spacingBottom":15/'
        );
    }

    public function testSpacingLeft(): void
    {
        $this->assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingLeft($spacing);
        $this->assertSame($spacing, $this->chart->chart->spacingLeft);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"spacingLeft":10/'
        );
    }

    public function testSpacingRight(): void
    {
        $this->assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingRight($spacing);
        $this->assertSame($spacing, $this->chart->chart->spacingRight);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"spacingRight":10/'
        );
    }

    public function testSpacingTop(): void
    {
        $this->assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingTop($spacing);
        $this->assertSame($spacing, $this->chart->chart->spacingTop);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"spacingTop":10/'
        );
    }

    public function testStyle(): void
    {
        $this->assertNotNull($this->chart);
        $this->markTestIncomplete();
    }

    public function testType(): void
    {
        $this->markTestIncomplete();
    }

    public function testWidth(): void
    {
        $this->assertNotNull($this->chart);
        $width = '800px';
        $this->chart->chart->width($width);
        $this->assertSame($width, $this->chart->chart->width);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"width":"800px"/'
        );
    }

    public function testZoomType(): void
    {
        $this->markTestIncomplete();
    }
}
