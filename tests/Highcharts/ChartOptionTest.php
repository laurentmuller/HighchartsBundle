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

namespace HighchartsBundle\Tests\Highcharts;

use HighchartsBundle\Highcharts\ChartOption;
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

    private function createOption(): ChartOption
    {
        return new ChartOption('test');
    }
}
