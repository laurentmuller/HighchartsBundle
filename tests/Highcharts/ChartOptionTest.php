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

final class ChartOptionTest extends TestCase
{
    private const NAME = 'name';
    private const VALUE = 'value';

    public function testAccessArray(): void
    {
        $option = $this->createOption();
        $option[self::NAME] = self::VALUE;
        self::assertArrayHasKey(self::NAME, $option);
        self::assertSame(self::VALUE, $option[self::NAME]);
    }

    public function testAccessObject(): void
    {
        $option = $this->createOption();
        $option->{self::NAME} = self::VALUE;
        self::assertArrayHasKey(self::NAME, $option);
        self::assertSame(self::VALUE, $option->{self::NAME});
    }

    public function testCall(): void
    {
        $option = $this->createOption();
        $option->__call(self::NAME, [self::VALUE]);
        self::assertSame(self::VALUE, $option[self::NAME]);
    }

    public function testCount(): void
    {
        $option = $this->createOption();
        self::assertCount(0, $option);
        $option[self::NAME] = self::VALUE;
        self::assertCount(1, $option);
    }

    public function testGet(): void
    {
        $option = $this->createOption();
        self::assertNull($option->__get(self::NAME));
        $option[self::NAME] = self::VALUE;
        self::assertSame(self::VALUE, $option->__get(self::NAME));
    }

    public function testGetByReference(): void
    {
        $option = $this->createOption();
        $option[self::NAME] = self::VALUE;
        $value = &$option->__get(self::NAME);
        $value = 'other value';
        $actual = $option->__get(self::NAME);
        self::assertSame('other value', $actual);
    }

    public function testGetData(): void
    {
        $option = $this->createOption();
        $actual = $option->getData();
        self::assertCount(0, $actual);
        $option[self::NAME] = self::VALUE;
        $actual = $option->getData();
        self::assertCount(1, $actual);
        self::assertSame([self::NAME => self::VALUE], $actual);
    }

    public function testGetName(): void
    {
        $option = $this->createOption();
        self::assertSame(self::NAME, $option->getName());
    }

    public function testIsEmpty(): void
    {
        $option = $this->createOption();
        self::assertTrue($option->isEmpty());
        $option[self::NAME] = self::VALUE;
        self::assertFalse($option->isEmpty());
    }

    public function testIsset(): void
    {
        $option = $this->createOption();
        self::assertFalse($option->__isset(self::NAME));
        $option[self::NAME] = self::VALUE;
        self::assertTrue($option->__isset(self::NAME));
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

    public function testOffsetExists(): void
    {
        $option = $this->createOption();
        self::assertFalse($option->offsetExists(self::NAME));
        $option[self::NAME] = self::VALUE;
        self::assertTrue($option->offsetExists(self::NAME));
    }

    public function testOffsetGet(): void
    {
        $option = $this->createOption();
        self::assertNull($option->offsetGet(self::NAME));
        $option[self::NAME] = self::VALUE;
        self::assertSame(self::VALUE, $option->offsetGet(self::NAME));
    }

    public function testOffsetSet(): void
    {
        $option = $this->createOption();
        $option->offsetSet(self::NAME, self::VALUE);
        self::assertSame(self::VALUE, $option[self::NAME]);
    }

    public function testOffsetUnset(): void
    {
        $option = $this->createOption();
        $option[self::NAME] = self::VALUE;
        self::assertSame(self::VALUE, $option[self::NAME]);
        $option->offsetUnset(self::NAME);
        self::assertNull($option->offsetGet(self::NAME));
    }

    public function testSet(): void
    {
        $option = $this->createOption();
        $option->__set(self::NAME, self::VALUE);
        self::assertSame(self::VALUE, $option[self::NAME]);
    }

    public function testUnset(): void
    {
        $option = $this->createOption();
        $option[self::NAME] = self::VALUE;
        self::assertSame(self::VALUE, $option[self::NAME]);
        $option->__unset(self::NAME);
        self::assertNull($option->offsetGet(self::NAME));
    }

    private function createOption(): ChartOption
    {
        return ChartOption::instance(self::NAME);
    }
}
