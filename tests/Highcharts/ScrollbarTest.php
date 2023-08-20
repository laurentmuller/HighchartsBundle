<?php

declare(strict_types=1);

namespace Ob\HighchartsBundle\Tests\Highcharts;

use Ob\HighchartsBundle\Highcharts\Highchart;
use PHPUnit\Framework\TestCase;

/**
 * This class hold Unit Tests for the series option.
 */
class ScrollbarTest extends TestCase
{
    private array $scrollbar = [];

    /*
     * @var array
     */
    private array $usedOptions = [];

    /**
     * Initialises the data.
     */
    protected function setUp(): void
    {
        $this->scrollbar = [
            'enabled' => true,
            'barBackgroundColor' => 'gray',
            'barBorderRadius' => 7,
            'barBorderWidth' => 0,
            'buttonBackgroundColor' => 'gray',
            'buttonBorderWidth' => 0,
            'buttonArrowColor' => 'yellow',
            'buttonBorderRadius' => 7,
            'rifleColor' => 'yellow',
            'trackBackgroundColor' => 'white',
            'trackBorderWidth' => 1,
            'trackBorderColor' => 'silver',
            'trackBorderRadius' => 7,
        ];
    }

    /**
     * Scrollbar config output.
     */
    public function testConfig(): void
    {
        $chart = new Highchart();
        foreach ($this->scrollbar as $key => $value) {
            // Config randomization
            if (0 === \random_int(0, 5)) {
                continue;
            }
            $this->usedOptions[$key] = $value;
            $chart->scrollbar[$key] = $value;
        }
        $result = $chart->render();
        \preg_match('|scrollbar: (\{[^\}]+\})+|', $result, $matches);
        $options = \json_decode($matches[1], true);
        $this->assertCount(\count($this->usedOptions), \array_intersect($this->usedOptions, $options));
    }
}
