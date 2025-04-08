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

use HighchartsBundle\Highcharts\Engine;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class EngineTest extends TestCase
{
    /**
     * @psalm-return \Generator<int, array{string}>
     */
    public static function getInvalidValues(): \Generator
    {
        yield ['fake'];
    }

    /**
     * @psalm-return \Generator<int, array{Engine, string}>
     */
    public static function getValues(): \Generator
    {
        yield [Engine::JQUERY, 'jquery'];
        yield [Engine::MOOTOOLS, 'mootools'];
        yield [Engine::NONE, ''];
    }

    public function testCount(): void
    {
        $values = Engine::cases();
        self::assertCount(3, $values);
    }

    #[DataProvider('getValues')]
    public function testFrom(Engine $engine, string $value): void
    {
        $actual = Engine::from($value);
        self::assertSame($actual, $engine);
    }

    #[DataProvider('getInvalidValues')]
    public function testInvalidValue(string $value): void
    {
        self::expectException(\ValueError::class);
        Engine::from($value);
    }

    #[DataProvider('getValues')]
    public function testValue(Engine $engine, string $expected): void
    {
        $actual = $engine->value;
        self::assertSame($expected, $actual);
    }
}
