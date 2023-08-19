<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highstock;

use Ob\HighchartsBundle\Highcharts\ChartOption;
use Ob\HighchartsBundle\Highcharts\Highstock;
use Ob\HighchartsBundle\Tests\AbstractChartTestCase;

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
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"buttons":\[{"type":"month","count":3,"text":"3m"}\]/'
        );
    }

    public function testButtonSpacing(): void
    {
        $spacing = 0;
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->buttonSpacing($spacing);
        $this->assertSame($spacing, $this->range->buttonSpacing);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"buttonSpacing":0/'
        );
    }

    public function testButtonTheme(): void
    {
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->markTestIncomplete();
    }

    public function testEnabled(): void
    {
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->enabled(true);
        $this->assertTrue($this->range->enabled);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"enabled":true/'
        );

        $this->range->enabled(false);
        $this->assertFalse($this->range->enabled);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"enabled":false/'
        );
    }

    public function testInputBoxBorderColor(): void
    {
        $color = 'silver';
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputBoxBorderColor($color);
        $this->assertSame($color, $this->range->inputBoxBorderColor);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"inputBoxBorderColor":"silver"/'
        );
    }

    public function testInputBoxHeight(): void
    {
        $height = 16;
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputBoxHeight($height);
        $this->assertSame($height, $this->range->inputBoxHeight);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"inputBoxHeight":16/'
        );
    }

    public function testInputBoxWidth(): void
    {
        $width = 16;
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputBoxWidth($width);
        $this->assertSame($width, $this->range->inputBoxWidth);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"inputBoxWidth":16/'
        );
    }

    public function testInputDateFormat(): void
    {
        $format = '%b %e, %Y';
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputDateFormat($format);
        $this->assertSame($format, $this->range->inputDateFormat);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"inputDateFormat":"%b %e, %Y"/'
        );
    }

    public function testInputDateParser(): void
    {
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->markTestIncomplete();
    }

    public function testInputEditDateFormat(): void
    {
        $format = '%b %e, %Y';
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputEditDateFormat($format);
        $this->assertSame($format, $this->range->inputEditDateFormat);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"inputEditDateFormat":"%b %e, %Y"/'
        );
    }

    public function testinputEnabled(): void
    {
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputEnabled(true);
        $this->assertTrue($this->range->inputEnabled);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"inputEnabled":true/'
        );

        $this->range->inputEnabled(false);
        $this->assertFalse($this->range->inputEnabled);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"inputEnabled":false/'
        );
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
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"position":{"align":"right"}/'
        );
    }

    public function testInputStyle(): void
    {
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->markTestIncomplete();
    }

    public function testLabelStyle(): void
    {
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->markTestIncomplete();
    }

    public function testSelected(): void
    {
        $index = 3;
        $this->assertNotNull($this->range);
        $this->range->selected($index);
        $this->assertSame($index, $this->range->selected);
        $this->assertNotNull($this->chart);
        $this->assertChartMatchesRegularExpression(
            $this->chart,
            '/"selected":3/'
        );
    }
}
