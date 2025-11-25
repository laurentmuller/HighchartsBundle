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
 *
 * @extends AbstractChartTestCase<Highchart>
 */
final class ExportingTest extends AbstractChartTestCase
{
    /**
     * Buttons option.
     */
    public function testButtons(): void
    {
        // align option (string - left/center/right)
        $this->chart->exporting['buttons'] = ['exportButton' => ['align' => 'center']];
        $regex = '/exporting: \{"buttons":\{"exportButton":\{"align":"center"\}\}\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->exporting['buttons'] = ['printButton' => ['align' => 'center']];
        $regex = '/exporting: \{"buttons":\{"printButton":\{"align":"center"\}\}\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        // backgroundColor option
        $this->chart->exporting['buttons'] = ['exportButton' => ['backgroundColor' => 'blue']];
        $regex = '/exporting: \{"buttons":\{"exportButton":\{"backgroundColor":"blue"\}\}\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->exporting['buttons'] = ['printButton' => ['backgroundColor' => 'blue']];
        $regex = '/exporting: \{"buttons":\{"printButton":\{"backgroundColor":"blue"\}\}\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * enabled option (true/false).
     */
    public function testEnabled(): void
    {
        $this->chart->exporting['enabled'] = true;
        $regex = '/exporting: \{"enabled":true\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->exporting['enabled'] = false;
        $regex = '/exporting: \{"enabled":false\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * Filename option (string).
     */
    public function testFilename(): void
    {
        $this->chart->exporting['filename'] = 'graph';
        $regex = '/exporting: \{"filename":"graph"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * Type option (string - image/png, image/jpeg, application/pdf or image/svg+xml).
     */
    public function testType(): void
    {
        $this->chart->exporting['type'] = 'image/png';
        $regex = '/exporting: \{"type":"image\/png"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->exporting['type'] = 'image/jpeg';
        $regex = '/exporting: \{"type":"image\/jpeg"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->exporting['type'] = 'application/pdf';
        $regex = '/exporting: \{"type":"application\/pdf"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->chart->exporting['type'] = 'image/svg+xml';
        $regex = '/exporting: \{"type":"image\/svg\+xml"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * Url option (string).
     */
    public function testUrl(): void
    {
        $this->chart->exporting['url'] = 'https://www.google.com';
        $regex = '/exporting: \{"url":"https:\/\/www.google.com"\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    /**
     * Width option (integer - width in px).
     */
    public function testWidth(): void
    {
        $this->chart->exporting['width'] = 300;
        $regex = '/exporting: \{"width":300\}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    #[\Override]
    protected function createChart(): Highchart
    {
        return new Highchart();
    }
}
