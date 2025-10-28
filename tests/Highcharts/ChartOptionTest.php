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
use HighchartsBundle\Tests\AssertEmptyTrait;
use PHPUnit\Framework\TestCase;

final class ChartOptionTest extends TestCase
{
    use AssertEmptyTrait;

    /**
     * @psalm-suppress InvalidArgument
     */
    public function testAccessArray(): void
    {
        $name = 'name';
        $option = $this->createOption();
        $option[$name] = $name;
        self::assertArrayHasKey($name, $option);
        self::assertSame($name, $option[$name]);
    }

    /**
     * @psalm-suppress InvalidArgument
     */
    public function testAccessObject(): void
    {
        $name = 'name';
        $option = $this->createOption();
        $option->{$name} = $name;
        self::assertArrayHasKey($name, $option);
        self::assertSame($name, $option->{$name});
    }

    public function testCount(): void
    {
        $option = $this->createOption();
        self::assertEmptyCountable($option);
        $option['name'] = 'value';
        self::assertCount(1, $option);
    }

    public function testHasData(): void
    {
        $name = 'name';
        $option = $this->createOption();
        self::assertFalse($option->hasData());
        $option->{$name} = 'value';
        self::assertTrue($option->hasData());
    }

    public function testIsset(): void
    {
        $name = 'name';
        $option = $this->createOption();
        self::assertFalse($option->__isset($name));
        $option->{$name} = $name;
        self::assertTrue($option->__isset($name));
    }

    public function testMerge(): void
    {
        $option = $this->createOption();
        $option['key1'] = 'value1';
        $option->merge(['key2' => 'value2']);
        $expected = ['key1' => 'value1', 'key2' => 'value2'];
        $actual = $option->getData();
        self::assertSame($expected, $actual);
    }

    public function testOffsetExist(): void
    {
        $option = $this->createOption();
        self::assertFalse($option->offsetExists('key'));
        $option['key'] = 'value';
        self::assertTrue($option->offsetExists('key'));
    }

    public function testOffsetExists(): void
    {
        $name = 'name';
        $option = $this->createOption();
        self::assertFalse($option->offsetExists($name));
        $option->{$name} = $name;
        self::assertTrue($option->offsetExists($name));
    }

    public function testOffsetGet(): void
    {
        $option = $this->createOption();
        self::assertNull($option->offsetGet('key'));
        $option['key'] = 'value';
        self::assertSame('value', $option->offsetGet('key'));
    }

    public function testOffsetSet(): void
    {
        $option = $this->createOption();
        $option->offsetSet('key', 'value');
        self::assertSame('value', $option->offsetGet('key'));
    }

    public function testOffsetUnset(): void
    {
        $option = $this->createOption();
        $option['key'] = 'value';
        self::assertSame('value', $option->offsetGet('key'));
        $option->offsetUnset('key');
        self::assertNull($option->offsetGet('key'));
    }

    public function testUnset(): void
    {
        $option = $this->createOption();
        $option->offsetSet('key', 'value');
        self::assertSame('value', $option->offsetGet('key'));
        $option->__unset('key');
        self::assertNull($option->offsetGet('key'));
    }

    private function createOption(): ChartOption
    {
        return ChartOption::instance('test');
    }
}
