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
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * Set abbreviated localized month names.
     */
    public function testShortMonths(): void
    {
        $chart = new Highchart();
        $chart->lang['shortMonths'] = ['Jan', 'Fev', 'Mars', 'Avril', 'Mai', 'Juin',  'Juil', 'Aout', 'Sept', 'Oct', 'Nov', 'Dec'];
        $regex = '/lang: \{"shortMonths":\["Jan","Fev","Mars","Avril","Mai","Juin","Juil","Aout","Sept","Oct","Nov","Dec"\]\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }

    /**
     * Set localized weekday names.
     */
    public function testWeekDays(): void
    {
        $chart = new Highchart();
        $chart->lang['weekdays'] = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        $regex = '/lang: \{"weekdays":\["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"\]\}/';
        self::assertChartMatchesRegularExpression($chart, $regex);
    }
}
