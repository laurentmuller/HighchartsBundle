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

use HighchartsBundle\Highcharts\Highchart;
use HighchartsBundle\Tests\AbstractChartTestCase;

/**
 * This class hold Unit Tests for the exporting option.
 */
final class ExportingTest extends AbstractChartTestCase
{
    /**
     * buttons option.
     */
    public function testButtons(): void
    {
        $chart = new Highchart();
        // align option (string - left/center/right)
        $chart->exporting['buttons'] = ['exportButton' => ['align' => 'center']];
        $regex = '/exporting: \{"buttons":\{"exportButton":\{"align":"center"\}\}\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['buttons'] = ['printButton' => ['align' => 'center']];
        $regex = '/exporting: \{"buttons":\{"printButton":\{"align":"center"\}\}\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        // backgroundColor option
        $chart->exporting['buttons'] = ['exportButton' => ['backgroundColor' => 'blue']];
        $regex = '/exporting: \{"buttons":\{"exportButton":\{"backgroundColor":"blue"\}\}\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['buttons'] = ['printButton' => ['backgroundColor' => 'blue']];
        $regex = '/exporting: \{"buttons":\{"printButton":\{"backgroundColor":"blue"\}\}\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * enabled option (true/false).
     */
    public function testEnabled(): void
    {
        $chart = new Highchart();
        $chart->exporting['enabled'] = true;
        $regex = '/exporting: \{"enabled":true\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['enabled'] = false;
        $regex = '/exporting: \{"enabled":false\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * filename option (string).
     */
    public function testFilename(): void
    {
        $chart = new Highchart();
        $chart->exporting['filename'] = 'graph';
        $regex = '/exporting: \{"filename":"graph"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * type option (string - image/png, image/jpeg, application/pdf or image/svg+xml).
     */
    public function testType(): void
    {
        $chart = new Highchart();
        $chart->exporting['type'] = 'image/png';
        $regex = '/exporting: \{"type":"image\/png"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['type'] = 'image/jpeg';
        $regex = '/exporting: \{"type":"image\/jpeg"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['type'] = 'application/pdf';
        $regex = '/exporting: \{"type":"application\/pdf"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);

        $chart->exporting['type'] = 'image/svg+xml';
        $regex = '/exporting: \{"type":"image\/svg\+xml"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * url option (string).
     */
    public function testUrl(): void
    {
        $chart = new Highchart();
        $chart->exporting['url'] = 'https://www.google.com';
        $regex = '/exporting: \{"url":"https:\/\/www.google.com"\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * width option (integer - width in px).
     */
    public function testWidth(): void
    {
        $chart = new Highchart();
        $chart->exporting['width'] = 300;
        $regex = '/exporting: \{"width":300\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }
}
