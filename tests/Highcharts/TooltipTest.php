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

use HighchartsBundle\Highcharts\ChartExpression;

/**
 * This class hold Unit Tests for the tooltip option.
 */
final class TooltipTest extends AbstractHighchartTestCase
{
    /**
     * Animation option (true/false).
     */
    public function testAnimation(): void
    {
        $this->chart->tooltip['animation'] = 'true';
        $regex = 'tooltip: {"animation":"true"}';
        self::assertChartMatchesRegularExpression($regex);

        $this->chart->tooltip['animation'] = 'false';
        $regex = 'tooltip: {"animation":"false"}';
        self::assertChartMatchesRegularExpression($regex);
    }

    /**
     * BackgroundColor option (rgba).
     */
    public function testBackgroundColor(): void
    {
        $this->chart->tooltip['backgroundColor'] = 'rgba(255, 255, 255, .85)';
        $regex = 'tooltip: {"backgroundColor":"rgba(255, 255, 255, .85)"}';
        self::assertChartMatchesRegularExpression($regex);
    }

    /**
     * BorderColor option (null/auto/rgba).
     */
    public function testBorderColor(): void
    {
        $this->chart->tooltip['borderColor'] = 'null';
        $regex = 'tooltip: {"borderColor":"null"}';
        self::assertChartMatchesRegularExpression($regex);

        $this->chart->tooltip['borderColor'] = 'auto';
        $regex = 'tooltip: {"borderColor":"auto"}';
        self::assertChartMatchesRegularExpression($regex);

        $this->chart->tooltip['borderColor'] = 'rgba(255, 255, 255, .85)';
        $regex = 'tooltip: {"borderColor":"rgba(255, 255, 255, .85)"}';
        self::assertChartMatchesRegularExpression($regex);
    }

    /**
     * BorderRadius option (integer - radius in px).
     */
    public function testBorderRadius(): void
    {
        $this->chart->tooltip['borderRadius'] = 5;
        $regex = 'tooltip: {"borderRadius":5}';
        self::assertChartMatchesRegularExpression($regex);

        $this->chart->tooltip['borderRadius'] = '5';
        $regex = 'tooltip: {"borderRadius":"5"}';
        self::assertChartMatchesRegularExpression($regex);
    }

    /**
     * BorderWidth option (integer - width in px).
     */
    public function testBorderWidth(): void
    {
        $this->chart->tooltip['borderWidth'] = 5;
        $regex = 'tooltip: {"borderWidth":5}';
        self::assertChartMatchesRegularExpression($regex);

        $this->chart->tooltip['borderWidth'] = '5';
        $regex = 'tooltip: {"borderWidth":"5"}';
        self::assertChartMatchesRegularExpression($regex);
    }

    /**
     * Enabled option (true/false).
     */
    public function testEnabled(): void
    {
        $this->chart->tooltip['enabled'] = 'true';
        $regex = 'tooltip: {"enabled":"true"}';
        self::assertChartMatchesRegularExpression($regex);

        $this->chart->tooltip['enabled'] = 'false';
        $regex = 'tooltip: {"enabled":"false"}';
        self::assertChartMatchesRegularExpression($regex);
    }

    /**
     * Formatter option (Zend Json Expr).
     */
    public function testFormatter(): void
    {
        $func = new ChartExpression('function() {return 1;}');
        $this->chart->tooltip['formatter'] = $func;
        $regex = 'tooltip: {"formatter":function() {return 1;}}';
        self::assertChartMatchesRegularExpression($regex);
    }

    /**
     * Shadow option (true/false).
     */
    public function testShadow(): void
    {
        $this->chart->tooltip['shadow'] = 'true';
        $regex = 'tooltip: {"shadow":"true"}';
        self::assertChartMatchesRegularExpression($regex);

        $this->chart->tooltip['shadow'] = 'false';
        $regex = 'tooltip: {"shadow":"false"}';
        self::assertChartMatchesRegularExpression($regex);
    }
}
