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

namespace HighchartsBundle\Tests\Twig;

use HighchartsBundle\Highcharts\Engine;
use HighchartsBundle\Highcharts\Highchart;
use HighchartsBundle\Twig\HighchartsExtension;
use PHPUnit\Framework\TestCase;
use Twig\Error\SyntaxError;

/**
 * This class hold Unit Tests for the Twig extension.
 */
final class HighchartsExtensionTest extends TestCase
{
    /**
     * @throws SyntaxError
     */
    public function testDefaultEngine(): void
    {
        $actual = $this->invokeChart();
        self::assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );
    }

    /**
     * @throws SyntaxError
     */
    public function testInvalidEngine(): void
    {
        $this->expectException(SyntaxError::class);
        $this->expectExceptionMessage('Invalid chart engine: "fake".');
        $this->invokeChart('fake');
    }

    /**
     * @throws SyntaxError
     */
    public function testJQueryEnum(): void
    {
        // render with jquery explicitly
        $actual = $this->invokeChart(Engine::JQUERY);
        self::assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );
    }

    /**
     * @throws SyntaxError
     */
    public function testJQueryString(): void
    {
        $actual = $this->invokeChart('jquery');
        self::assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );
    }

    /**
     * @throws SyntaxError
     */
    public function testMootoolsEnum(): void
    {
        // render with mootools
        $actual = $this->invokeChart(Engine::MOOTOOLS);
        self::assertMatchesRegularExpression(
            '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );
    }

    /**
     * @throws SyntaxError
     */
    public function testMootoolsString(): void
    {
        $actual = $this->invokeChart('mootools');
        self::assertMatchesRegularExpression(
            '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );
    }

    public function testTwigMembers(): void
    {
        $extension = new HighchartsExtension();
        self::assertEmpty($extension->getFilters());
        self::assertEmpty($extension->getNodeVisitors());
        self::assertEmpty($extension->getTests());
        self::assertEmpty($extension->getTokenParsers());

        $functions = $extension->getFunctions();
        self::assertCount(1, $functions);
        $function = $functions[0];
        self::assertSame('chart', $function->getName());
        self::assertFalse($function->needsEnvironment());
        self::assertFalse($function->needsContext());
        self::assertFalse($function->isDeprecated());
        self::assertFalse($function->isVariadic());
        self::assertIsCallable($function->getCallable());
    }

    /**
     * @throws SyntaxError
     */
    private function invokeChart(Engine|string|null $engine = null): string
    {
        $chart = new Highchart();
        $extension = new HighchartsExtension();

        return $extension->chart($chart, $engine ?? Engine::JQUERY);
    }
}
