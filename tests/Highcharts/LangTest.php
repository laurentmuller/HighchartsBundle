<?php

declare(strict_types=1);

namespace HighchartsBundle\Tests\Highcharts;

use HighchartsBundle\Highcharts\Highchart;
use HighchartsBundle\Tests\AbstractChartTestCase;

/**
 * This class hold Unit Tests for the lang option.
 */
class LangTest extends AbstractChartTestCase
{
    /**
     * Set localized month names.
     */
    public function testMonths(): void
    {
        $chart = new Highchart();
        $chart->lang['months'] = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin',  'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];
        $regex = '/lang: \{"months":\["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"\]\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * Set abbreviated localized month names.
     */
    public function testShortMonths(): void
    {
        $chart = new Highchart();
        $chart->lang['shortMonths'] = ['Jan', 'Fev', 'Mars', 'Avril', 'Mai', 'Juin',  'Juil', 'Aout', 'Sept', 'Oct', 'Nov', 'Dec'];
        $regex = '/lang: \{"shortMonths":\["Jan","Fev","Mars","Avril","Mai","Juin","Juil","Aout","Sept","Oct","Nov","Dec"\]\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * Set localized weekday names.
     */
    public function testWeekDays(): void
    {
        $chart = new Highchart();
        $chart->lang['weekdays'] = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        $regex = '/lang: \{"weekdays":\["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"\]\}/';
        $this->assertChartMatchesRegularExpression($chart, $regex);
    }
}
