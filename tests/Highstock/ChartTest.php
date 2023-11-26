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

namespace HighchartsBundle\Tests\Highstock;

use HighchartsBundle\Highcharts\Highstock;
use HighchartsBundle\Tests\AbstractChartTestCase;

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
        $regex = '/"alignTicks":true/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->chart->alignTicks(false);
        $this->assertFalse($this->chart->chart->alignTicks);
        $regex = '/"alignTicks":false/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testAnimation(): void
    {
        $this->assertNotNull($this->chart);
        $this->chart->chart->animation(true);
        $this->assertTrue($this->chart->chart->animation);
        $regex = '/"animation":true/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->chart->animation(false);
        $this->assertFalse($this->chart->chart->animation);
        $regex = '/"animation":false/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testBackgroundColor(): void
    {
        $this->assertNotNull($this->chart);
        $color = '#ffffff';
        $this->chart->chart->backgroundColor($color);
        $this->assertSame($color, $this->chart->chart->backgroundColor);
        $regex = '/"backgroundColor":"#ffffff"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testBorderColor(): void
    {
        $this->assertNotNull($this->chart);
        $color = '#4572a7';
        $this->chart->chart->borderColor($color);
        $this->assertSame($color, $this->chart->chart->borderColor);
        $regex = '/"borderColor":"#4572a7"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testBorderRadius(): void
    {
        $this->assertNotNull($this->chart);
        $radius = 5;
        $this->chart->chart->borderRadius($radius);
        $this->assertSame($radius, $this->chart->chart->borderRadius);
        $regex = '/"borderRadius":5/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testBorderWidth(): void
    {
        $this->assertNotNull($this->chart);
        $width = 0;
        $this->chart->chart->borderWidth($width);
        $this->assertSame($width, $this->chart->chart->borderWidth);
        $regex = '/"borderWidth":0/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testClassName(): void
    {
        $this->assertNotNull($this->chart);
        $class = 'extraClass';
        $this->chart->chart->className($class);
        $this->assertSame($class, $this->chart->chart->className);
        $regex = '/"className":"extraClass"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testHeight(): void
    {
        $this->assertNotNull($this->chart);
        $height = '300px';
        $this->chart->chart->height($height);
        $this->assertSame($height, $this->chart->chart->height);
        $regex = '/"height":"300px"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testIgnoreHiddenSeries(): void
    {
        $this->assertNotNull($this->chart);
        $this->chart->chart->ignoreHiddenSeries(true);
        $this->assertTrue($this->chart->chart->ignoreHiddenSeries);
        $regex = '/"ignoreHiddenSeries":true/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->chart->ignoreHiddenSeries(false);
        $this->assertFalse($this->chart->chart->ignoreHiddenSeries);
        $regex = '/"ignoreHiddenSeries":false/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testMarginBottom(): void
    {
        $this->assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginBottom($margin);
        $this->assertSame($margin, $this->chart->chart->marginBottom);
        $regex = '/"marginBottom":"150px"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testMarginLeft(): void
    {
        $this->assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginLeft($margin);
        $this->assertSame($margin, $this->chart->chart->marginLeft);
        $regex = '/"marginLeft":"150px"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testMarginRight(): void
    {
        $this->assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginRight($margin);
        $this->assertSame($margin, $this->chart->chart->marginRight);
        $regex = '/"marginRight":"150px"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testMarginTop(): void
    {
        $this->assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginTop($margin);
        $this->assertSame($margin, $this->chart->chart->marginTop);
        $regex = '/"marginTop":"150px"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testPanning(): void
    {
        $this->assertNotNull($this->chart);
        $this->chart->chart->panning(true);
        $this->assertTrue($this->chart->chart->panning);
        $regex = '/"panning":true/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->chart->panning(false);
        $this->assertFalse($this->chart->chart->panning);
        $regex = '/"panning":false/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testSpacingBottom(): void
    {
        $this->assertNotNull($this->chart);
        $spacing = 15;
        $this->chart->chart->spacingBottom($spacing);
        $this->assertSame($spacing, $this->chart->chart->spacingBottom);
        $regex = '/"spacingBottom":15/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testSpacingLeft(): void
    {
        $this->assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingLeft($spacing);
        $this->assertSame($spacing, $this->chart->chart->spacingLeft);
        $regex = '/"spacingLeft":10/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testSpacingRight(): void
    {
        $this->assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingRight($spacing);
        $this->assertSame($spacing, $this->chart->chart->spacingRight);
        $regex = '/"spacingRight":10/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testSpacingTop(): void
    {
        $this->assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingTop($spacing);
        $this->assertSame($spacing, $this->chart->chart->spacingTop);
        $regex = '/"spacingTop":10/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testWidth(): void
    {
        $this->assertNotNull($this->chart);
        $width = '800px';
        $this->chart->chart->width($width);
        $this->assertSame($width, $this->chart->chart->width);
        $regex = '/"width":"800px"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }
}
