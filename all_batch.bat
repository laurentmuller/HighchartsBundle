@ECHO OFF
ECHO -------------------------------------- START BATCH %time% -------------------------------- && ^
ECHO -------------------------------------- PHP-CS-FIXER -------------------------------------- && ^
.\vendor\bin\php-cs-fixer.bat fix --diff --dry-run                                              && ^
ECHO -------------------------------------- PHP-PSALM ----------------------------------------- && ^
.\vendor\bin\psalm.bat --config=psalm.xml --show-info=true                                      && ^
ECHO -------------------------------------- PHP-STAN ------------------------------------------ && ^
.\vendor\bin\phpstan.bat analyse --no-progress --memory-limit=2G                                && ^
ECHO -------------------------------------- PHP-RECTOR ---------------------------------------- && ^
.\vendor\bin\rector.bat process --dry-run                                                       && ^
ECHO -------------------------------------- PHP-UNIT ------------------------------------------ && ^
.\vendor\bin\phpunit.bat                                                                        && ^
ECHO -------------------------------------- END BATCH %time% ----------------------------------
