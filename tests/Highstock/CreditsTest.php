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

namespace HighchartsBundle\Tests\Highstock;

use HighchartsBundle\Highcharts\ChartOption;
use HighchartsBundle\Highcharts\Highstock;
use HighchartsBundle\Tests\AbstractChartTestCase;

class CreditsTest extends AbstractChartTestCase
{
    protected ?Highstock $chart = null;
    protected ?ChartOption $credits = null;

    #[\Override]
    protected function setUp(): void
    {
        $this->chart = new Highstock();
        $this->credits = $this->chart->credits;
    }

    public function testEnabled(): void
    {
        self::assertNotNull($this->chart);
        self::assertNotNull($this->credits);
        $this->credits['enabled'] = true;
        self::assertTrue($this->credits['enabled']);
        $regex = '/"enabled":true/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);

        $this->credits['enabled'] = false;
        self::assertFalse($this->credits['enabled']);
        $regex = '/"enabled":false/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testHref(): void
    {
        self::assertNotNull($this->chart);
        self::assertNotNull($this->credits);
        $link = 'https://www.highcharts.com';
        $this->credits->href($link);
        self::assertSame($link, $this->credits->href);
    }

    public function testPosition(): void
    {
        $position = [
            'align' => 'right',
            'x' => -10,
            'verticalAlign' => 'bottom',
            'y' => -5,
        ];
        self::assertNotNull($this->chart);
        self::assertNotNull($this->credits);
        $this->credits->position($position);
        self::assertSame($this->credits->position, $position);
        $regex = '/"position":{"align":"right","x":-10,"verticalAlign":"bottom","y":-5}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testStyle(): void
    {
        $style = [
            'cursor' => 'pointer',
            'color' => '#909090',
            'fontSize' => '10px',
        ];
        self::assertNotNull($this->chart);
        self::assertNotNull($this->credits);
        $this->credits->style($style);
        self::assertSame($style, $this->credits->style);
        $regex = '/"style":{"cursor":"pointer","color":"#909090","fontSize":"10px"}/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }

    public function testText(): void
    {
        self::assertNotNull($this->chart);
        self::assertNotNull($this->credits);
        $text = 'Highcharts.com';
        $this->credits->text($text);
        self::assertSame($text, $this->credits->text);
        $regex = '/"text":"Highcharts.com"/';
        self::assertChartMatchesRegularExpression($this->chart, $regex);
    }
}
