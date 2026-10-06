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

final class HighstockTest extends AbstractHighstockTestCase
{
    public function testAlignTicks(): void
    {
        $this->chart->chart->alignTicks(true);
        self::assertTrue($this->chart->chart->alignTicks);
        $regex = '"alignTicks":true';
        self::assertChartMatchesRegularExpression($regex);

        $this->chart->chart->alignTicks(false);
        self::assertFalse($this->chart->chart->alignTicks);
        $regex = '"alignTicks":false';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testAnimation(): void
    {
        $this->chart->chart->animation(true);
        self::assertTrue($this->chart->chart->animation);
        $regex = '"animation":true';
        self::assertChartMatchesRegularExpression($regex);

        $this->chart->chart->animation(false);
        self::assertFalse($this->chart->chart->animation);
        $regex = '"animation":false';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testBackgroundColor(): void
    {
        $color = '#ffffff';
        $this->chart->chart->backgroundColor($color);
        self::assertSame($color, $this->chart->chart->backgroundColor);
        $regex = '"backgroundColor":"#ffffff"';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testBorderColor(): void
    {
        $color = '#4572a7';
        $this->chart->chart->borderColor($color);
        self::assertSame($color, $this->chart->chart->borderColor);
        $regex = '"borderColor":"#4572a7"';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testBorderRadius(): void
    {
        $radius = 5;
        $this->chart->chart->borderRadius($radius);
        self::assertSame($radius, $this->chart->chart->borderRadius);
        $regex = '"borderRadius":5';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testBorderWidth(): void
    {
        $width = 0;
        $this->chart->chart->borderWidth($width);
        self::assertSame($width, $this->chart->chart->borderWidth);
        $regex = '"borderWidth":0';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testClassName(): void
    {
        $class = 'extraClass';
        $this->chart->chart->className($class);
        self::assertSame($class, $this->chart->chart->className);
        $regex = '"className":"extraClass"';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testHeight(): void
    {
        $height = '300px';
        $this->chart->chart->height($height);
        self::assertSame($height, $this->chart->chart->height);
        $regex = '"height":"300px"';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testIgnoreHiddenSeries(): void
    {
        $this->chart->chart->ignoreHiddenSeries(true);
        self::assertTrue($this->chart->chart->ignoreHiddenSeries);
        $regex = '"ignoreHiddenSeries":true';
        self::assertChartMatchesRegularExpression($regex);

        $this->chart->chart->ignoreHiddenSeries(false);
        self::assertFalse($this->chart->chart->ignoreHiddenSeries);
        $regex = '"ignoreHiddenSeries":false';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testMarginBottom(): void
    {
        $margin = '150px';
        $this->chart->chart->marginBottom($margin);
        self::assertSame($margin, $this->chart->chart->marginBottom);
        $regex = '"marginBottom":"150px"';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testMarginLeft(): void
    {
        $margin = '150px';
        $this->chart->chart->marginLeft($margin);
        self::assertSame($margin, $this->chart->chart->marginLeft);
        $regex = '"marginLeft":"150px"';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testMarginRight(): void
    {
        $margin = '150px';
        $this->chart->chart->marginRight($margin);
        self::assertSame($margin, $this->chart->chart->marginRight);
        $regex = '"marginRight":"150px"';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testMarginTop(): void
    {
        $margin = '150px';
        $this->chart->chart->marginTop($margin);
        self::assertSame($margin, $this->chart->chart->marginTop);
        $regex = '"marginTop":"150px"';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testPanning(): void
    {
        $this->chart->chart->panning(true);
        self::assertTrue($this->chart->chart->panning);
        $regex = '"panning":true';
        self::assertChartMatchesRegularExpression($regex);

        $this->chart->chart->panning(false);
        self::assertFalse($this->chart->chart->panning);
        $regex = '"panning":false';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testSpacingBottom(): void
    {
        $spacing = 15;
        $this->chart->chart->spacingBottom($spacing);
        self::assertSame($spacing, $this->chart->chart->spacingBottom);
        $regex = '"spacingBottom":15';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testSpacingLeft(): void
    {
        $spacing = 10;
        $this->chart->chart->spacingLeft($spacing);
        self::assertSame($spacing, $this->chart->chart->spacingLeft);
        $regex = '"spacingLeft":10';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testSpacingRight(): void
    {
        $spacing = 10;
        $this->chart->chart->spacingRight($spacing);
        self::assertSame($spacing, $this->chart->chart->spacingRight);
        $regex = '"spacingRight":10';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testSpacingTop(): void
    {
        $spacing = 10;
        $this->chart->chart->spacingTop($spacing);
        self::assertSame($spacing, $this->chart->chart->spacingTop);
        $regex = '"spacingTop":10';
        self::assertChartMatchesRegularExpression($regex);
    }

    public function testWidth(): void
    {
        $width = '800px';
        $this->chart->chart->width($width);
        self::assertSame($width, $this->chart->chart->width);
        $regex = '"width":"800px"';
        self::assertChartMatchesRegularExpression($regex);
    }
}
