# Cookbook

## Pie chart with legend

This is a simple recipe to re-create the pie-chart demo with legend at
[highcharts.com/demo/pie-legend](https://www.highcharts.com/demo/pie-legend)

```php
$chart = new Highchart();
$chart->chart->renderTo('container');
$chart->title->text('Browser market shares at a specific website in 2010');
$chart->plotOptions->pie([
    'allowPointSelect' => true,
    'cursor' => 'pointer',
    'dataLabels' => ['enabled' => false],
    'showInLegend' => true
]);
$data = [
    ['Firefox', 45.0],
    ['IE', 26.8],
    ['Chrome', 12.8],
    ['Safari', 8.5],
    ['Opera', 6.2],
    ['Others', 0.7],
];
$chart->series([
    'type' => 'pie',
    'name' => 'Browser share', 
    'data' => $data
]);
```

## Pie chart with Drilldown

This is a simple recipe to re-create a chart like the drilldown pie-chart demo
at [highcharts.com/demo/pie-drilldown](https://www.highcharts.com/demo/pie-drilldown)

```php
$chart = new Highchart();
$chart->chart->renderTo('container');
$chart->chart->type('pie');
$chart->title->text('Browser market shares. November, 2013.');
$chart->plotOptions->series(
    [
        'dataLabels' => [
            'enabled' => true,
            'format' => '{point.name}: {point.y:.1f}%'
        ]
    ]
);

$chart->tooltip->headerFormat('<span style="font-size:11px">{series.name}</span><br>');
$chart->tooltip->pointFormat('<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>');

$data = [
    [
        'name' => 'Chrome',
        'y' => 18.73,
        'drilldown' => 'Chrome',
        'visible' => true
    ],
    [
        'name' => 'Microsoft Internet Explorer',
        'y' => 53.61,
        'drilldown' => 'Microsoft Internet Explorer',
        'visible' => true
    ],
    ['Firefox', 45.0],
    ['Opera', 1.5]
];
$chart->series(
    [
        [
            'name' => 'Browser share',
            'colorByPoint' => true,
            'data' => $data
        ]
    ]
);

$drilldown = [
    [
        'name' => 'Microsoft Internet Explorer',
        'id' => 'Microsoft Internet Explorer',
        'data' => [
            ["v8.0", 26.61],
            ["v9.0", 16.96],
            ["v6.0", 6.4],
            ["v7.0", 3.55],
            ["v8.0", 0.09]
        ]
    ],
    [
        'name' => 'Chrome',
        'id' => 'Chrome',
        'data' => [
            ["v19.0", 7.73],
            ["v17.0", 1.13],
            ["v16.0", 0.45],
            ["v18.0", 0.26]
        ]
    ],
];
$chart->drilldown->series($drilldown);
```

## Multi-axes plot

This is a simple recipe for creating a plot with multiple y-axes, like the
[highcharts demo](https://www.highcharts.com/demo/combo-multi-axes)

```php
$series = [
    [
        'name' => 'Rainfall',
        'type' => 'column',
        'color' => '#4572A7',
        'yAxis' => 1,
        'data' => [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
    ],
    [
        'name' => 'Temperature',
        'type' => 'spline',
        'color' => '#AA4643',
        'data' => [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
    ],
];
$yData = [
    [
        'labels' => [
            'formatter' => ChartExpression::instance('function () { return this.value + " degrees C" }'),
            'style' => ['color' => '#AA4643')
        ],
        'title' => [
            'text' => 'Temperature',
            'style' => ['color' => '#AA4643']
        ],
        'opposite' => true,
    ],
    [
        'labels' => [
            'formatter' => ChartExpression::instance('function () { return this.value + " mm" }'),
            'style' => ['color' => '#4572A7']
        ],
        'gridLineWidth' => 0,
        'title' => [
            'text' => 'Rainfall',
            'style' => ['color' => '#4572A7']
        ],
    ],
];
$categories = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

$chart = new Highchart();
$chart->chart->renderTo('container'); // The #id of the div where to render the chart
$chart->chart->type('column');
$chart->title->text('Average Monthly Weather Data for Tokyo');
$chart->xAxis->categories($categories);
$chart->yAxis($yData);
$chart->legend->enabled(false);
$formatter = ChartExpression::instance('function () {
                 var unit = {
                     "Rainfall": "mm",
                     "Temperature": "degrees C"
                 }[this.series.name];
                 return this.x + ": <b>" + this.y + "</b> " + unit;
             }');
$chart->tooltip->formatter($formatter);
$chart->series($series);
```

## See also

- [Installation](installation.md)
- [Usage](usage.md)
- [Home Page](../README.md)
