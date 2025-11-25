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
use HighchartsBundle\Highcharts\Highchart;
use HighchartsBundle\Tests\AbstractChartTestCase;

/**
 * This class hold Unit Tests for the Highchart class.
 *
 * @extends AbstractChartTestCase<Highchart>
 */
final class HighchartTest extends AbstractChartTestCase
{
    /**
     * Render chart using jQuery.
     */
    public function testJquery(): void
    {
        $regex = '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * Render chart using Mootools.
     */
    public function testMooTools(): void
    {
        $regex = '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/';
        self::assertChartMatchesRegularExpression($this->chart, $regex, Engine::MOOTOOLS);
    }

    /**
     * Render chart without a library wrapper.
     */
    public function testNoEngine(): void
    {
        $regex = '/const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);/';
        self::assertChartMatchesRegularExpression($this->chart, $regex, Engine::NONE);
    }

    /**
     * Magic getters and setters.
     */
    public function testSetGet(): void
    {
        $this->chart->credits['enabled'] = false;
        self::assertFalse($this->chart->credits['enabled']);
        $this->chart->credits['enabled'] = true;
        self::assertTrue($this->chart->credits['enabled']);
    }

    #[\Override]
    protected function createChart(): Highchart
    {
        return new Highchart();
    }
}
