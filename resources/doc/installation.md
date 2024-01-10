# Installation

1. Run composer:

    ```console
    composer require laurentmuller/highcharts-bundle
    ```

   [Install Composer](https://getcomposer.org/download/) if you don't have it already present on your system. Depending
   on how you install, you may end up with a `composer.phar` file in your directory. In that case, no worries! Your
   command line in that case is:

   ```console
   php composer.phar require laurentmuller/highcharts-bundle
   ```

2. Register the bundle in your `config/bundles.php`:

    ```php
    return [
        ...
        HighchartsBundle\HighchartsBundle::class => ['all' => true],
        ...
    ]
    ```

## See also

- [Usage](usage.md)
- [Cookbook](cookbook.md)
- [Home Page](../../README.md)
