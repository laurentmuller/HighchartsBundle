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

    #[\Override]
    protected function setUp(): void
    {
        $this->chart = new Highstock();
    }

    public function testAlignTicks(): void
    {
        self::assertNotNull($this->chart);
        $this->chart->chart->alignTicks(true);
        self::assertTrue($this->chart->chart->alignTicks);
        $regex = '/"alignTicks":true/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->chart->alignTicks(false);
        self::assertFalse($this->chart->chart->alignTicks);
        $regex = '/"alignTicks":false/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testAnimation(): void
    {
        self::assertNotNull($this->chart);
        $this->chart->chart->animation(true);
        self::assertTrue($this->chart->chart->animation);
        $regex = '/"animation":true/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->chart->animation(false);
        self::assertFalse($this->chart->chart->animation);
        $regex = '/"animation":false/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testBackgroundColor(): void
    {
        self::assertNotNull($this->chart);
        $color = '#ffffff';
        $this->chart->chart->backgroundColor($color);
        self::assertSame($color, $this->chart->chart->backgroundColor);
        $regex = '/"backgroundColor":"#ffffff"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testBorderColor(): void
    {
        self::assertNotNull($this->chart);
        $color = '#4572a7';
        $this->chart->chart->borderColor($color);
        self::assertSame($color, $this->chart->chart->borderColor);
        $regex = '/"borderColor":"#4572a7"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testBorderRadius(): void
    {
        self::assertNotNull($this->chart);
        $radius = 5;
        $this->chart->chart->borderRadius($radius);
        self::assertSame($radius, $this->chart->chart->borderRadius);
        $regex = '/"borderRadius":5/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testBorderWidth(): void
    {
        self::assertNotNull($this->chart);
        $width = 0;
        $this->chart->chart->borderWidth($width);
        self::assertSame($width, $this->chart->chart->borderWidth);
        $regex = '/"borderWidth":0/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testClassName(): void
    {
        self::assertNotNull($this->chart);
        $class = 'extraClass';
        $this->chart->chart->className($class);
        self::assertSame($class, $this->chart->chart->className);
        $regex = '/"className":"extraClass"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testHeight(): void
    {
        self::assertNotNull($this->chart);
        $height = '300px';
        $this->chart->chart->height($height);
        self::assertSame($height, $this->chart->chart->height);
        $regex = '/"height":"300px"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testIgnoreHiddenSeries(): void
    {
        self::assertNotNull($this->chart);
        $this->chart->chart->ignoreHiddenSeries(true);
        self::assertTrue($this->chart->chart->ignoreHiddenSeries);
        $regex = '/"ignoreHiddenSeries":true/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->chart->ignoreHiddenSeries(false);
        self::assertFalse($this->chart->chart->ignoreHiddenSeries);
        $regex = '/"ignoreHiddenSeries":false/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testMarginBottom(): void
    {
        self::assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginBottom($margin);
        self::assertSame($margin, $this->chart->chart->marginBottom);
        $regex = '/"marginBottom":"150px"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testMarginLeft(): void
    {
        self::assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginLeft($margin);
        self::assertSame($margin, $this->chart->chart->marginLeft);
        $regex = '/"marginLeft":"150px"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testMarginRight(): void
    {
        self::assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginRight($margin);
        self::assertSame($margin, $this->chart->chart->marginRight);
        $regex = '/"marginRight":"150px"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testMarginTop(): void
    {
        self::assertNotNull($this->chart);
        $margin = '150px';
        $this->chart->chart->marginTop($margin);
        self::assertSame($margin, $this->chart->chart->marginTop);
        $regex = '/"marginTop":"150px"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testPanning(): void
    {
        self::assertNotNull($this->chart);
        $this->chart->chart->panning(true);
        self::assertTrue($this->chart->chart->panning);
        $regex = '/"panning":true/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->chart->panning(false);
        self::assertFalse($this->chart->chart->panning);
        $regex = '/"panning":false/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testSpacingBottom(): void
    {
        self::assertNotNull($this->chart);
        $spacing = 15;
        $this->chart->chart->spacingBottom($spacing);
        self::assertSame($spacing, $this->chart->chart->spacingBottom);
        $regex = '/"spacingBottom":15/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testSpacingLeft(): void
    {
        self::assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingLeft($spacing);
        self::assertSame($spacing, $this->chart->chart->spacingLeft);
        $regex = '/"spacingLeft":10/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testSpacingRight(): void
    {
        self::assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingRight($spacing);
        self::assertSame($spacing, $this->chart->chart->spacingRight);
        $regex = '/"spacingRight":10/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testSpacingTop(): void
    {
        self::assertNotNull($this->chart);
        $spacing = 10;
        $this->chart->chart->spacingTop($spacing);
        self::assertSame($spacing, $this->chart->chart->spacingTop);
        $regex = '/"spacingTop":10/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testWidth(): void
    {
        self::assertNotNull($this->chart);
        $width = '800px';
        $this->chart->chart->width($width);
        self::assertSame($width, $this->chart->chart->width);
        $regex = '/"width":"800px"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }
}
