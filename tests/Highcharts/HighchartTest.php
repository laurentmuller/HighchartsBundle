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
 * This class hold Unit Tests for the Highchart Class.
 */
class HighchartTest extends AbstractChartTestCase
{
    /**
     * Render chart using jQuery.
     */
    public function testJquery(): void
    {
        $chart = new Highchart();
        $regex = '/\$\(function\s?\(\)\s?\{\n?\r?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * Render chart using Mootools.
     */
    public function testMooTools(): void
    {
        $chart = new Highchart();
        $regex = '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/';
        self::assertChartMatchesRegularExpression($chart, $regex, Engine::MOOTOOLS);
    }

    /**
     * Render chart without a library wrapper.
     */
    public function testNoEngine(): void
    {
        $chart = new Highchart();
        $regex = '/const chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);/';
        self::assertChartMatchesRegularExpression($chart, $regex, Engine::NONE);
    }

    /**
     * Magic getters and setters.
     */
    public function testSetGet(): void
    {
        $chart = new Highchart();
        $chart->credits['enabled'] = false;
        self::assertFalse($chart->credits['enabled']);
        $chart->credits['enabled'] = true;
        self::assertTrue($chart->credits['enabled']);
    }
}
