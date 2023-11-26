# Installation

1. Run composer:
 
    ```console
    composer require laurentmuller/highcharts-bundle
    ```

2. Register the bundle in your `config/bundles.php`:

    ```php
    return [
        ...
        HighchartsBundle\HighchartsBundle::class => ['all' => true],
        ...
    ]
    ```

## See also:

- [Usage](usage.md)
- [Cookbook](cookbook.md)
- [Home Page](../../README.md)
