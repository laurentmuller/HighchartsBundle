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

class RangeSelectorTest extends AbstractChartTestCase
{
    private ?Highstock $chart = null;
    private ?ChartOption $range = null;

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
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->buttons($buttons);
        $this->assertSame($buttons, $this->range->buttons);
        $regex = '/"buttons":\[{"type":"month","count":3,"text":"3m"}\]/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testButtonSpacing(): void
    {
        $spacing = 0;
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->buttonSpacing($spacing);
        $this->assertSame($spacing, $this->range->buttonSpacing);
        $regex = '/"buttonSpacing":0/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testEnabled(): void
    {
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->enabled(true);
        $this->assertTrue($this->range->enabled);
        $regex = '/"enabled":true/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);

        $this->range->enabled(false);
        $this->assertFalse($this->range->enabled);
        $regex = '/"enabled":false/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputBoxBorderColor(): void
    {
        $color = 'silver';
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputBoxBorderColor($color);
        $this->assertSame($color, $this->range->inputBoxBorderColor);
        $regex = '/"inputBoxBorderColor":"silver"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputBoxHeight(): void
    {
        $height = 16;
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputBoxHeight($height);
        $this->assertSame($height, $this->range->inputBoxHeight);
        $regex = '/"inputBoxHeight":16/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputBoxWidth(): void
    {
        $width = 16;
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputBoxWidth($width);
        $this->assertSame($width, $this->range->inputBoxWidth);
        $regex = '/"inputBoxWidth":16/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputDateFormat(): void
    {
        $format = '%b %e, %Y';
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputDateFormat($format);
        $this->assertSame($format, $this->range->inputDateFormat);
        $regex = '/"inputDateFormat":"%b %e, %Y"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputEditDateFormat(): void
    {
        $format = '%b %e, %Y';
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputEditDateFormat($format);
        $this->assertSame($format, $this->range->inputEditDateFormat);
        $regex = '/"inputEditDateFormat":"%b %e, %Y"/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testinputEnabled(): void
    {
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputEnabled(true);
        $this->assertTrue($this->range->inputEnabled);
        $regex = '/"inputEnabled":true/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);

        $this->range->inputEnabled(false);
        $this->assertFalse($this->range->inputEnabled);
        $regex = '/"inputEnabled":false/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testInputPosition(): void
    {
        $position = [
            'align' => 'right',
        ];
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->position($position);
        $this->assertSame($position, $this->range->position);
        $regex = '/"position":{"align":"right"}/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testSelected(): void
    {
        $index = 3;
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->selected($index);
        $this->assertSame($index, $this->range->selected);
        $regex = '/"selected":3/';
        $this->assertChartMatchesRegularExpression($this->chart, $regex);
    }
}
