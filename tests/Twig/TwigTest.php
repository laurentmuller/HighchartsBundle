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
class TwigTest extends TestCase
{
    /**
     * @throws \ReflectionException
     */
    public function testInvalidEngine(): void
    {
        $this->expectException(SyntaxError::class);
        $this->invokeChart('fake');
    }

    /**
     * Chart rendering using the twig extension.
     *
     * @throws \ReflectionException
     */
    public function testTwigExtension(): void
    {
        // render with jquery (default)
        $actual = $this->invokeChart();
        self::assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );

        // render with jquery explicitly
        $actual = $this->invokeChart(Engine::JQUERY);
        self::assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );
        $actual = $this->invokeChart('jquery');
        self::assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );

        // render with mootools
        $actual = $this->invokeChart(Engine::MOOTOOLS);
        self::assertMatchesRegularExpression(
            '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );
        $actual = $this->invokeChart('mootools');
        self::assertMatchesRegularExpression(
            '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $actual
        );
    }

    public function testTwigMembers(): void
    {
        $extension = new HighchartsExtension();
        self::assertCount(0, $extension->getFilters());
        self::assertCount(0, $extension->getNodeVisitors());
        self::assertCount(0, $extension->getOperators());
        self::assertCount(0, $extension->getTests());
        self::assertCount(0, $extension->getTokenParsers());

        $functions = $extension->getFunctions();
        self::assertCount(1, $functions);
        self::assertArrayHasKey(0, $functions);
        $function = $functions[0];
        self::assertSame('chart', $function->getName());
        self::assertFalse($function->needsEnvironment());
        self::assertFalse($function->needsContext());
        self::assertFalse($function->isDeprecated());
        self::assertFalse($function->isVariadic());
        self::assertIsCallable($function->getCallable());
    }

    /**
     * @throws \ReflectionException
     */
    private function invokeChart(Engine|string $engine = Engine::JQUERY): string
    {
        $chart = new Highchart();
        $extension = new HighchartsExtension();
        $class = new \ReflectionClass($extension);
        if (!$class->hasMethod('chart')) {
            throw new \ReflectionException('Unable to find the "chart" function.');
        }
        $method = $class->getMethod('chart');
        $method->setAccessible(true);

        return (string) $method->invokeArgs($extension, [$chart, $engine]);
    }
}
