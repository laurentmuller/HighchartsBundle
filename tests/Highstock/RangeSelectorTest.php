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

use HighchartsBundle\Highcharts\ChartOption;
use HighchartsBundle\Highcharts\Highstock;
use HighchartsBundle\Tests\AbstractChartTestCase;

final class RangeSelectorTest extends AbstractChartTestCase
{
    private ?Highstock $chart = null;
    private ?ChartOption $range = null;

    #[\Override]
    protected function setUp(): void
    {
        $this->chart = new Highstock();
        $this->range = $this->chart->rangeSelector;
    }

    public function testButtons(): void
    {
        $buttons = [[
            'type' => 'month',
            'count' => 3,
            'text' => '3m',
        ]];
        self::assertNotNull($this->chart);
        self::assertNotNull($this->range);
        $this->range->buttons($buttons);
        self::assertSame($buttons, $this->range->buttons);
        $regex = '/"buttons":\[{"type":"month","count":3,"text":"3m"}\]/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testButtonSpacing(): void
    {
        $spacing = 0;
        self::assertNotNull($this->chart);
        self::assertNotNull($this->range);
        $this->range->buttonSpacing($spacing);
        self::assertSame($spacing, $this->range->buttonSpacing);
        $regex = '/"buttonSpacing":0/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testEnabled(): void
    {
        self::assertNotNull($this->chart);
        self::assertNotNull($this->range);
        $this->range->enabled(true);
        self::assertTrue($this->range->enabled);
        $regex = '/"enabled":true/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->range->enabled(false);
        self::assertFalse($this->range->enabled);
        $regex = '/"enabled":false/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputBoxBorderColor(): void
    {
        $color = 'silver';
        self::assertNotNull($this->chart);
        self::assertNotNull($this->range);
        $this->range->inputBoxBorderColor($color);
        self::assertSame($color, $this->range->inputBoxBorderColor);
        $regex = '/"inputBoxBorderColor":"silver"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputBoxHeight(): void
    {
        $height = 16;
        self::assertNotNull($this->chart);
        self::assertNotNull($this->range);
        $this->range->inputBoxHeight($height);
        self::assertSame($height, $this->range->inputBoxHeight);
        $regex = '/"inputBoxHeight":16/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputBoxWidth(): void
    {
        $width = 16;
        self::assertNotNull($this->chart);
        self::assertNotNull($this->range);
        $this->range->inputBoxWidth($width);
        self::assertSame($width, $this->range->inputBoxWidth);
        $regex = '/"inputBoxWidth":16/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputDateFormat(): void
    {
        $format = '%b %e, %Y';
        self::assertNotNull($this->chart);
        self::assertNotNull($this->range);
        $this->range->inputDateFormat($format);
        self::assertSame($format, $this->range->inputDateFormat);
        $regex = '/"inputDateFormat":"%b %e, %Y"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputEditDateFormat(): void
    {
        $format = '%b %e, %Y';
        self::assertNotNull($this->chart);
        self::assertNotNull($this->range);
        $this->range->inputEditDateFormat($format);
        self::assertSame($format, $this->range->inputEditDateFormat);
        $regex = '/"inputEditDateFormat":"%b %e, %Y"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testinputEnabled(): void
    {
        self::assertNotNull($this->chart);
        self::assertNotNull($this->range);
        $this->range->inputEnabled(true);
        self::assertTrue($this->range->inputEnabled);
        $regex = '/"inputEnabled":true/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->range->inputEnabled(false);
        self::assertFalse($this->range->inputEnabled);
        $regex = '/"inputEnabled":false/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputPosition(): void
    {
        $position = [
            'align' => 'right',
        ];
        self::assertNotNull($this->chart);
        self::assertNotNull($this->range);
        $this->range->position($position);
        self::assertSame($position, $this->range->position);
        $regex = '/"position":{"align":"right"}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testSelected(): void
    {
        $index = 3;
        self::assertNotNull($this->chart);
        self::assertNotNull($this->range);
        $this->range->selected($index);
        self::assertSame($index, $this->range->selected);
        $regex = '/"selected":3/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }
}
