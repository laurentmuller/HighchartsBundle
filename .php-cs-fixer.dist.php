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

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$comment = <<<COMMENT
    This file is part of the HighchartsBundle package.

    (c) bibi.nu <bibi@bibi.nu>

    For the full copyright and license information, please view the LICENSE
    file that was distributed with this source code.
    COMMENT;

$rules = [
    // --------------------------------------------------------------
    //  Rule sets
    // --------------------------------------------------------------
    '@auto' => true,
    '@auto:risky' => true,
    '@Symfony' => true,
    '@Symfony:risky' => true,
    '@PHP8x2Migration' => true,
    '@PHP8x2Migration:risky' => true,
    '@PHPUnit10x0Migration:risky' => true,

    // --------------------------------------------------------------
    //  Rules override
    // --------------------------------------------------------------
    'strict_param' => true,
    'no_unused_imports' => true,
    'strict_comparison' => true,
    'ordered_imports' => true,
    'ordered_interfaces' => true,
    'final_internal_class' => true,
    'method_chaining_indentation' => true,
    'concat_space' => ['spacing' => 'one'],
    'list_syntax' => ['syntax' => 'short'],
    'array_syntax' => ['syntax' => 'short'],
    'ordered_class_elements' => ['sort_algorithm' => 'alpha'],
    'doctrine_annotation_array_assignment' => ['operator' => '='],
    'phpdoc_to_comment' => ['allow_before_return_statement' => true],
    'native_function_invocation' => ['include' => ['@internal', 'all']],
    'header_comment' => ['header' => $comment, 'location' => 'after_open'],
    'blank_line_before_statement' => ['statements' => ['declare', 'try', 'return']],
];

$finder = Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])->append([
        __FILE__,
        __DIR__ . '/rector.php',
        __DIR__ . '/.twig-cs-fixer.php',
    ]);

$config = new Config();

return $config
    ->setParallelConfig(ParallelConfigFactory::detect())
    ->setCacheFile(__DIR__ . '/cache/php-cs-fixer/.php-cs-fixer.cache')
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setRules($rules);
