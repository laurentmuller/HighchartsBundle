# Installation

1. Run composer:
 
    ```console
    composer require laurentmuller/highcharts-bundle
    ```

2. Register the bundle in your `config/bundles.php`:
    
    ```php
    return [
        ...
        Ob\HighchartsBundle\ObHighchartsBundle::class => ['all' => true],
        ...
    ]
    ```
