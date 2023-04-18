<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highstock;

use Ob\HighchartsBundle\Highcharts\ChartOption;
use Ob\HighchartsBundle\Highcharts\Highstock;
use PHPUnit\Framework\TestCase;

class RangeSelectorTest extends TestCase
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
        $this->assertMatchesRegularExpression('/"buttons":\[{"type":"month","count":3,"text":"3m"}\]/', $this->chart->render());
    }

    public function testButtonSpacing(): void
    {
        $spacing = 0;
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->buttonSpacing($spacing);
        $this->assertSame($spacing, $this->range->buttonSpacing);
        $this->assertMatchesRegularExpression('/"buttonSpacing":0/', $this->chart->render());
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
        $this->assertMatchesRegularExpression('/"enabled":true/', $this->chart->render());
        $this->range->enabled(false);
        $this->assertFalse($this->range->enabled);
        $this->assertMatchesRegularExpression('/"enabled":false/', $this->chart->render());
    }

    public function testInputBoxBorderColor(): void
    {
        $color = 'silver';
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputBoxBorderColor($color);
        $this->assertSame($color, $this->range->inputBoxBorderColor);
        $this->assertMatchesRegularExpression('/"inputBoxBorderColor":"silver"/', $this->chart->render());
    }

    public function testInputBoxHeight(): void
    {
        $height = 16;
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputBoxHeight($height);
        $this->assertSame($height, $this->range->inputBoxHeight);
        $this->assertMatchesRegularExpression('/"inputBoxHeight":16/', $this->chart->render());
    }

    public function testInputBoxWidth(): void
    {
        $width = 16;
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputBoxWidth($width);
        $this->assertSame($width, $this->range->inputBoxWidth);
        $this->assertMatchesRegularExpression('/"inputBoxWidth":16/', $this->chart->render());
    }

    public function testInputDateFormat(): void
    {
        $format = '%b %e, %Y';
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputDateFormat($format);
        $this->assertSame($format, $this->range->inputDateFormat);
        $this->assertMatchesRegularExpression('/"inputDateFormat":"%b %e, %Y"/', $this->chart->render());
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
        $this->assertMatchesRegularExpression('/"inputEditDateFormat":"%b %e, %Y"/', $this->chart->render());
    }

    public function testinputEnabled(): void
    {
        $this->assertNotNull($this->chart);
        $this->assertNotNull($this->range);
        $this->range->inputEnabled(true);
        $this->assertTrue($this->range->inputEnabled);
        $this->assertMatchesRegularExpression('/"inputEnabled":true/', $this->chart->render());
        $this->range->inputEnabled(false);
        $this->assertFalse($this->range->inputEnabled);
        $this->assertMatchesRegularExpression('/"inputEnabled":false/', $this->chart->render());
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
        $this->assertMatchesRegularExpression('/"position":{"align":"right"}/', $this->chart->render());
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
        $this->assertMatchesRegularExpression('/"selected":3/', $this->chart->render());
    }
}
