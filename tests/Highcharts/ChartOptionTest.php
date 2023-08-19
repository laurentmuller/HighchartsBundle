<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\ChartOption;
use PHPUnit\Framework\TestCase;

class ChartOptionTest extends TestCase
{
    public function testAccessArray(): void
    {
        $name = 'name';
        $option = $this->createOption();
        $option[$name] = $name;
        $this->assertArrayHasKey($name, $option);
        $this->assertSame($name, $option[$name]);
    }

    public function testAccessObject(): void
    {
        $name = 'name';
        $option = $this->createOption();
        $option->{$name} = $name;
        $this->assertSame($name, $option->{$name});
    }

    public function testCount(): void
    {
        $option = $this->createOption();
        $this->assertCount(0, $option);
        $option['name'] = 'value';
        $this->assertCount(1, $option);
    }

    public function testHasData(): void
    {
        $option = $this->createOption();
        $this->assertFalse($option->hasData());
        $option['name'] = 'value';
        $this->assertTrue($option->hasData());
    }

    public function testOffsetExists(): void
    {
        $name = 'name';
        $option = $this->createOption();
        $this->assertFalse($option->offsetExists($name));
        $option->{$name} = $name;
        $this->assertTrue($option->offsetExists($name));
    }

    private function createOption(string $name = 'test'): ChartOption
    {
        return new ChartOption($name);
    }
}
