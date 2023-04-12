<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highstock;

use Ob\HighchartsBundle\Highcharts\ChartOption;
use Ob\HighchartsBundle\Highcharts\Highstock;
use PHPUnit\Framework\TestCase;

class CreditsTest extends TestCase
{
    protected ?Highstock $chart = null;
    protected ?ChartOption $credits = null;

    protected function setUp(): void
    {
        $this->chart = new Highstock();
        $this->credits = $this->chart->credits;
    }

    public function testEnabled(): void
    {
        $this->credits->enabled(true);
        $this->assertTrue($this->credits->enabled);
        $this->assertMatchesRegularExpression('/"enabled":true/', $this->chart->render());

        $this->credits->enabled(false);
        $this->assertFalse($this->credits->enabled);
        $this->assertMatchesRegularExpression('/"enabled":false/', $this->chart->render());
    }

    public function testHref(): void
    {
        $link = 'http://www.highcharts.com';
        $this->credits->href($link);
        $this->assertEquals($link, $this->credits->href);
        //        $this->assertMatchesRegularExpression('/"href":"http:\/\/www\.highcharts\.com"/', $this->chart->render());
    }

    public function testPosition(): void
    {
        $position = [
            'align' => 'right',
            'x' => -10,
            'verticalAlign' => 'bottom',
            'y' => -5,
        ];

        $this->credits->position($position);
        $this->assertEquals($this->credits->position, $position);
        $this->assertMatchesRegularExpression('/"position":{"align":"right","x":-10,"verticalAlign":"bottom","y":-5}/', $this->chart->render());
    }

    public function testStyle(): void
    {
        $style = [
            'cursor' => 'pointer',
            'color' => '#909090',
            'fontSize' => '10px',
        ];

        $this->credits->style($style);
        $this->assertEquals($style, $this->credits->style);
        $this->assertMatchesRegularExpression('/"style":{"cursor":"pointer","color":"#909090","fontSize":"10px"}/', $this->chart->render());
    }

    public function testText(): void
    {
        $text = 'Highcharts.com';
        $this->credits->text($text);
        $this->assertEquals($text, $this->credits->text);
        $this->assertMatchesRegularExpression('/"text":"Highcharts.com"/', $this->chart->render());
    }
}
