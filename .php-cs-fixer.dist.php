<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->exclude('vendor');

return (new PhpCsFixer\Config())
    ->setRules([
        '@PER-CS2.0' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
        'single_quote' => true,
        'no_empty_statement' => true,
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => false,
            'import_functions' => false,
        ],
        'no_useless_else' => true,
        'no_useless_return' => true,
        'no_empty_phpdoc' => true,
        'no_empty_comment' => true,
        'phpdoc_trim' => true,
        'phpdoc_scalar' => true,
        'phpdoc_order' => true,
        'no_blank_lines_after_phpdoc' => true,
        'trim_array_spaces' => true,
        'lambda_not_used_import' => true,
        'no_useless_concat_operator' => true,
    ])
    ->setFinder($finder)
    ->setRiskyAllowed(false);
