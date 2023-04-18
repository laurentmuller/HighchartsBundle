<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highstock;

use Ob\HighchartsBundle\Highcharts\Highstock;
use PHPUnit\Framework\TestCase;

class ChartTest extends TestCase
{
    protected ?Highstock $chart = null;

    protected function setUp(): void
    {
        $this->chart = new Highstock();
    }

    public function testAlignTicks(): void
    {
        $this->assertNotNull($this->chart);
        $this->chart->chart->alignTicks(true);
        $this->assertTrue($this->chart->chart->alignTicks);
        $this->assertMatchesRegularExpression('/"alignTicks":true/', $this->chart->render());
        $this->chart->chart->alignTicks(false);
        $this->assertFalse($this->chart->chart->alignTicks);
        $this->assertMatchesRegularExpression('/"alignTicks":false/', $this->chart->render());
    }

    public function testAnimation(): void
    {
        $this->assertNotNull($this->chart);
        $this->chart->chart->animation(true);
        $this->assertTrue($this->chart->chart->animation);
        $this->assertMatchesRegularExpression('/"animation":true/', $this->chart->render());
        $this->chart->chart->animation(false);
        $this->assertFalse($this->chart->chart->animation);
        $this->assertMatchesRegularExpression('/"animation":false/', $this->chart->render());
    }

    public function testBackgroundColor(): void
    {
        $this->assertNotNull($this->chart);
        $color = '#ffffff';
        $this->chart->chart->backgroundColor($color);
        $this->assertSame($color, $this->chart->chart->backgroundColor);
        $this->assertMatchesRegularExpression('/"backgroundColor":"#ffffff"/', $this->chart->render());
    }

    public function testBorderColor(): void
    {
        $this->assertNotNull($this->chart);
        $color = '#4572a7';
        $this->chart->chart->borderColor($color);
        $this->assertSame($color, $this->chart->chart->borderColor);
        $this->assertMatchesRegularExpression('/"borderColor":"#4572a7"/', $this->chart->render());
    }

    public function testBorderRadius(): void
    {
        $this->assertNotNull($this->chart);
        $radius = 5;
        $this->chart->chart->borderRadius($radius);
        $this->assertSame($radius, $this->chart->chart->borderRadius);
        $this->assertMatchesRegularExpression('/"borderRadius":5/', $this->chart->render());
    }

    public function testBorderWidth(): void
    {
        $this->assertNotNull($this->chart);
        $width = 0;
        $this->chart->chart->borderWidth($width);
        $this->assertSame($width, $this->chart->chart->borderWidth);
        $this->assertMatchesRegularExpression('/"borderWidth":0/', $this->chart->render());
    }

    public function testClassName(): void
    {
        $this->assertNotNull($this->chart);
        $class = 'extraClass';
        $this->chart->chart->className($class);
        $this->assertSame($class, $this->chart->chart->className);
        $this->assertMatchesRegularExpression('/"className":"extraClass"/', $this->chart->render());
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
        $this->assertMatchesRegularExpression('/"height":"300px"/', $this->chart->render());
    }

    public function testIgnoreHiddenSeries(): void
    {
        $this->assertNotNull($this->chart);
        $this->chart->chart->ignoreHiddenSeries(true);
        $this->assertTrue($this->chart->chart->ignoreHiddenSeries);
        $this->assertMatchesRegularExpression('/"ignoreHiddenSeries":true/', $this->chart->render());
        $this->chart->chart->ignoreHiddenSeries(false);
        $this->assertFalse($this->chart->chart->ignoreHiddenSeries);
        $this->assertMatchesRegularExpression('/"ignoreHiddenSeries":false/', $this->chart->render());
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
        $this->assertMatchesRegularExpression('/"marginBottom":"150px"/', $this->chart->render());
    }

    public function testMarginLeft(): void
    {
        $this->assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginLeft($margin);
        $this->assertSame($margin, $this->chart->chart->marginLeft);
        $this->assertMatchesRegularExpression('/"marginLeft":"150px"/', $this->chart->render());
    }

    public function testMarginRight(): void
    {
        $this->assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginRight($margin);
        $this->assertSame($margin, $this->chart->chart->marginRight);
        $this->assertMatchesRegularExpression('/"marginRight":"150px"/', $this->chart->render());
    }

    public function testMarginTop(): void
    {
        $this->assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginTop($margin);
        $this->assertSame($margin, $this->chart->chart->marginTop);
        $this->assertMatchesRegularExpression('/"marginTop":"150px"/', $this->chart->render());
    }

    public function testPanning(): void
    {
        $this->assertNotNull($this->chart);
        $this->chart->chart->panning(true);
        $this->assertTrue($this->chart->chart->panning);
        $this->assertMatchesRegularExpression('/"panning":true/', $this->chart->render());
        $this->chart->chart->panning(false);
        $this->assertFalse($this->chart->chart->panning);
        $this->assertMatchesRegularExpression('/"panning":false/', $this->chart->render());
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
        $this->assertMatchesRegularExpression('/"spacingBottom":15/', $this->chart->render());
    }

    public function testSpacingLeft(): void
    {
        $this->assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingLeft($spacing);
        $this->assertSame($spacing, $this->chart->chart->spacingLeft);
        $this->assertMatchesRegularExpression('/"spacingLeft":10/', $this->chart->render());
    }

    public function testSpacingRight(): void
    {
        $this->assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingRight($spacing);
        $this->assertSame($spacing, $this->chart->chart->spacingRight);
        $this->assertMatchesRegularExpression('/"spacingRight":10/', $this->chart->render());
    }

    public function testSpacingTop(): void
    {
        $this->assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingTop($spacing);
        $this->assertSame($spacing, $this->chart->chart->spacingTop);
        $this->assertMatchesRegularExpression('/"spacingTop":10/', $this->chart->render());
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
        $this->assertMatchesRegularExpression('/"width":"800px"/', $this->chart->render());
    }

    public function testZoomType(): void
    {
        $this->markTestIncomplete();
    }
}
