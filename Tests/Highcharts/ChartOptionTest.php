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
        $options = new ChartOption('test');
        $options[$name] = $name;
        $this->assertArrayHasKey($name, $options);
        $this->assertSame($name, $options[$name]);
    }

    public function testAccessObject(): void
    {
        $name = 'myOption';
        $options = new ChartOption('test');
        $options->{$name} = $name;
        $this->assertSame($name, $options->{$name});
    }

    public function testCount(): void
    {
        $options = new ChartOption('test');
        $this->assertCount(0, $options);
        $options['name'] = 'value';
        $this->assertCount(1, $options);
    }

    public function testEmpty(): void
    {
        $options = new ChartOption('test');
        $this->assertTrue($options->isEmpty());
    }

    public function testOffsetExists(): void
    {
        $name = 'name';
        $options = new ChartOption('test');
        $this->assertFalse($options->offsetExists($name));
        $options->{$name} = $name;
        $this->assertTrue($options->offsetExists($name));
    }
}
