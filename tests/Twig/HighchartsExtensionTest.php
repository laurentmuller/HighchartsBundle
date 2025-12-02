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
    public function testEngineDefault(): void
    {
        $this->assertChartMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/'
        );
    }

    /**
     * @throws SyntaxError
     */
    public function testEngineInvalid(): void
    {
        $this->expectException(SyntaxError::class);
        $this->expectExceptionMessage('Invalid chart engine: "fake".');
        $this->assertChartMatchesRegularExpression('', 'fake');
    }

    /**
     * @throws SyntaxError
     */
    public function testJQueryEnum(): void
    {
        // render with jquery explicitly
        $this->assertChartMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            Engine::JQUERY
        );
    }

    /**
     * @throws SyntaxError
     */
    public function testJQueryString(): void
    {
        $this->assertChartMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            'jquery'
        );
    }

    /**
     * @throws SyntaxError
     */
    public function testMootoolsEnum(): void
    {
        // render with mootools
        $this->assertChartMatchesRegularExpression(
            '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            Engine::MOOTOOLS
        );
    }

    /**
     * @throws SyntaxError
     */
    public function testMootoolsString(): void
    {
        $this->assertChartMatchesRegularExpression(
            '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            'mootools'
        );
    }

    /**
     * @throws SyntaxError
     */
    private function assertChartMatchesRegularExpression(
        string $pattern,
        Engine|string|null $engine = null
    ): void {
        $chart = new Highchart();
        $extension = new HighchartsExtension();
        $actual = $extension->chart($chart, $engine ?? Engine::JQUERY);
        self::assertMatchesRegularExpression($pattern, $actual);
    }
}
