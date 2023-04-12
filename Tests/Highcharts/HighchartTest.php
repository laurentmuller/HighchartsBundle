<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\Highchart;
use PHPUnit\Framework\TestCase;

/**
 * This class hold Unit tests for the Highchart Class.
 */
class HighchartTest extends TestCase
{
    /**
     * Look for that mean trailing comma.
     */
    public function testIeFriendliness(): void
    {
        $chart = new Highchart();

        $chart->chart->setTitle('Am I IE friendly yet?');
        $this->assertMatchesRegularExpression(
            '/\}(?<!,)\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $chart->render()
        );
    }

    /**
     * Render chart using jQuery.
     */
    public function testJquery(): void
    {
        $chart = new Highchart();
        $this->assertMatchesRegularExpression(
            '/\$\(function\s?\(\)\s?\{\n?\r?\s*var chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $chart->render()
        );
    }

    /**
     * Render chart using Mootools.
     */
    public function testMooTools(): void
    {
        $chart = new Highchart();
        $this->assertMatchesRegularExpression(
            '/window.addEvent\(\'domready\', function\s?\(\)\s?\{\r?\n?\s*var chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);\n?\r?\s*\}\);/',
            $chart->render('mootools')
        );
    }

    /**
     * Render chart without library wrapper.
     */
    public function testNoEngine(): void
    {
        $chart = new Highchart();
        $this->assertMatchesRegularExpression(
            '/var chart = new Highcharts.Chart\(\{\n?\r?\s*\}\);/',
            $chart->render('')
        );
    }

    /**
     * Magic getters and setters.
     */
    public function testSetGet(): void
    {
        $chart = new Highchart();

        $chart->credits->enabled(false);
        $this->assertTrue(false === $chart->credits->enabled);

        $chart->credits->enabled(true);
        $this->assertTrue(true === $chart->credits->enabled);
    }
}
