# Change log

## Unreleased

- Updated chart option annotations.
- Updated Psalm configuration. Reworked `HighchartsExtension` tests.
- Updated tests.
- Updated rector configuration.
- Updated Symfony to version 7.2.3.
- Updated Rector to version 2.0.
- Updated cache configurations.
- Updated psalm to version 6.0.

## 2.20.22 - 2025-01-15

- Removed `composer.lock` from export.
- Updated Symfony to version 7.2.2.
- Updated Symfony to version 7.2.1.
- Updated Symfony to version 7.2.0.
- Updated Symfony to version 7.1.9.

## 2.20.21 - 2024-11-25

- Updated `php-cs-fixer` to version 3.65.0.
- Updated `PHPunit` continuous integration action.
- Added static `instance()` function to `ChartOption` class.
- Added test for the `renderTo` property.
- Updated `PHPStan` to version 2.0 and level to 10.
- Removed separate `PHPUnit` tool.
- Updated CI.
- Split dependencies in dedicated folders using `bamarni/composer-bin-plugin`.
- Added bleeding edge before update `phpstan` to version 2.0.
- Added badges to `README.md`.
- Updated Symfony to version 7.1.7.
- Create `.symfony.insight.yaml` file.
- Updated Symfony to version 7.1.6.
- Updated `CHANGELOG.md`.

## 2.20.20 - 2024-10-14

- Updated `markdownlint-cli2-action` and `codecov-action` versions.
- Replaced `hash()` function by `md5()` function.
- Inject expressions only if necessary.

## 2.20.19 - 2024-10-14

- Replaced `SplQueue` structure by an array for expressions.
- Updated documentation.
- Added `getQuotedKey()` function to the `ChartExpression` class.

## 2.20.18 - 2024-09-16

- Added `enqueue()` function and renamed `inject()` function
  of `ChartExpression` class.
- Simplified `enqueueExpressions()` function of `AbstractChart` class.

## 2.20.17 - 2024-09-14

- **BC**: Moved `createExpression()` function of `AbstractChart` to `instance()`
  function of `ChartExpression` class.
- Added `injectExpression()` function to the `ChartExpression` class.
- Updated to Twig v3.14.0 due to a possible sandbox bypass.

## 2.20.16 - 2024-09-09

- Renamed `Expr` class to `ChartExpression`.

## 2.20.15 - 2024-09-09

- Removed the `laminas-json` dependency and use internal code for expressions.
- Removed the `scrollbar` chart options.
- Updated to Symfony v7.1.4 and Twig v3.13.0.
- Added the rector fix script to `composer.json`.
- Updated `phpunit.xml.dist` file.
- Added `SymfonyInsight` quality check tool and badge.
- Update PHP version in `composer.json`.
- Updated `twig` version to 3.11.0.
- Renamed Twig extension service name.
- Updated `CHANGELOG.MD` file.
- Updated `codecov-action` version to 4.5.0.

## 2.20.14 - 2024-08-04

- Simplified configuration.
- Updated to Symfony v7.1.2 and Rector v1.2.0.
- Updated to Symfony v7.1.1.
- Updated `.styleci.yml` configuration.
- Updated `.markdownlint-cli2.yaml` configuration.
- Updated to Symfony v7.1.0.
- Updated `phpunit/phpunit` to version `^11.0`.
- Updated `vimeo/psalm` to `dev-master` branch.
- Updated `spaze/phpstan-disallowed-calls` to version `^3.0`.

## 2.20.13 - 2024-06-16

- Added the markdown configuration file.
- Changed the `chart` function visibility of the `HighchartsExtension` class.
- Updated `TwigTest` class.
- Updated rector configuration.
- Move documentation to the root folder.
- Updated `phpstan` configuration.
- Updated `psalm/plugin-phpunit` plugin version.
- Updated `PhpCsFixer` configuration.
- Updated `.gitattributes` to exclude non-essential files from distribution.

## 2.20.12 - 2024-04-22

- Removed `orklah/psalm-*` plugins.
- Replaced engine string values by `Engine` enumeration.

## 2.20.11 - 2024-04-18

- Modified the constructor.
- Removed `initArrayOption()` and `initChartOption()` functions.

## 2.20.10 - 2024-03-21

- Updated psalm annotation.
- Updated change log.
- Updated render functions.

## 2.20.9 - 2024-03-20

- Updated CI actions.
- Completed tests.
- Added new tests.
- Updated psalm configuration and annotations.
- Removed `$trim` parameter for `createExpression` function.

## 2.20.8 - 2024-01-09

- Set function `createExpression` as static.

## 2.20.7 - 2024-01-08

- Symfony 7 support for required development.

## 2.20.6 - 2023-12-20

- Symfony 7 support.

## 2.20.5 - 2023-12-09

- Update named service.

## 2.20.4 - 2023-12-08

- Moved is expression from chart option to abstract chart.

## 2.20.3 - 2023-11-28

- Replaced the comma by new line when rendered chart class

## 2.20.2 - 2023-11-28

- Simplified encoding options

## 2.20.1 - 2023-11-28

- Added chart class property
- Added lint markdown action

## 2.20.0 - 2023-11-28

- Removed the pretty print option

## 2.19.19 - 2023-11-28

- Updated tests
- Reworked script output.

## 2.19.18 - 2023-11-26

- Updated documentation
- Added Engine constants
- Removed skipped tests

## 2.0.0 - 2022-03-21

- Added PHP version 8.2.
- Update composer.json

## 1.7.0 - 2020-01-12

- Add support for Symfony 5
- Add support for Twig 3
- Drop support for PHP < 7.2

## 1.6.0 - 2017-12-27

- Add support for Symfony 4

## 1.5.0 - 2016-07-26

- Improve Travis configuration, tests on PHP 7
- Add support for zend-json ~3.0
- Fix Symfony 3.1 deprecation notice for YAML scalars starting with `%`

## 1.4.0 - 2016-01-10

- Update version constraint to support Symfony 3

## 1.3.0 - 2015-10-10

- Update to PSR-4 auto-loading
- Add support for colorAxis
- Add support for noData

## 1.2.0 - 2014-08-04

- Refactor deprecated Twig_Function_Method to Twig_SimpleFunction
- Add support for lang
- Test on more PHP versions and HHVM
- Add support for drilldown
- Add support for setOptions
- Drop support for deprecated versions of Symfony
- Add support for scrollbar

## 1.1.0 - 2014-06-26

This release fixes a security issue. You are encouraged to update to it as soon
as possible. See [Security Advisory: ZF2014-01](https://framework.zend.com/security/advisory/ZF2014-01)

- Add support for the pane option
- Add support for Highstock
- Extract a common interface from Highchart and Highstock
- Add support for rangeSelector
- Add a branch alias to composer.json
- Update to Highcharts v4
- Update Zend\Json for a security issue
- Remove bundled assets in favor of Highcharts' CDN ([https://code.highcharts.com](https://code.highcharts.com))

## 1.0.1 - 2013-11-08

- Make the JS wrapper optional
- Add support for multiple x-axis
- Update to Highcharts v3.0.6
- Add license to composer.json
- Add doc blocks for IDE type hinting
- Configure Travis to test on Symfony 2.1, 2.2 and 2.3

## 1.0.0 - 2013-08-06

- Initial release
