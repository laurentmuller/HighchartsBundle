<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\Highchart;
use PHPUnit\Framework\TestCase;

/**
 * This class hold Unit Tests for the Highchart Class.
 */
class HighchartTest extends TestCase
{
    /**
     * Render chart using jQuery.
     */
    public function testJquery(): void
    {
        $chart = new Highchart();
        $result = $chart->render();
        $this->assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*var chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $result
        );
    }

    /**
     * Render chart using Mootools.
     */
    public function testMooTools(): void
    {
        $chart = new Highchart();
        $result = $chart->render('mootools');
        $this->assertMatchesRegularExpression(
            '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*var chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $result
        );
    }

    /**
     * Render chart without library wrapper.
     */
    public function testNoEngine(): void
    {
        $chart = new Highchart();
        $result = $chart->render('');
        $this->assertMatchesRegularExpression(
            '/var chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);/',
            $result
        );
    }

    /**
     * Magic getters and setters.
     */
    public function testSetGet(): void
    {
        $chart = new Highchart();
        $chart->credits->enabled(false);
        $this->assertFalse($chart->credits->enabled);
        $chart->credits->enabled(true);
        $this->assertTrue($chart->credits->enabled);
    }
}
