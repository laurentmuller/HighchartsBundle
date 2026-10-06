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

/**
 * This class hold Unit Tests for the lang option.
 */
final class LangTest extends AbstractHighchartTestCase
{
    /**
     * Set localized month names.
     */
    public function testMonths(): void
    {
        $this->chart->lang['months'] = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin',  'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];
        $regex = 'lang: {"months":["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"]}';
        self::assertChartMatchesRegularExpression($regex);
    }

    /**
     * Set abbreviated localized month names.
     */
    public function testShortMonths(): void
    {
        $this->chart->lang['shortMonths'] = ['Jan', 'Fev', 'Mars', 'Avril', 'Mai', 'Juin',  'Juil', 'Aout', 'Sept', 'Oct', 'Nov', 'Dec'];
        $regex = 'lang: {"shortMonths":["Jan","Fev","Mars","Avril","Mai","Juin","Juil","Aout","Sept","Oct","Nov","Dec"]}';
        self::assertChartMatchesRegularExpression($regex);
    }

    /**
     * Set localized weekday names.
     */
    public function testWeekDays(): void
    {
        $this->chart->lang['weekdays'] = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        $regex = 'lang: {"weekdays":["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"]}';
        self::assertChartMatchesRegularExpression($regex);
    }
}
