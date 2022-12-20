<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('vendor')
    ->exclude('bootstrap')
    ->exclude('storage')
    ->exclude('public')
    ->notPath('src/Symfony/Component/Translation/Tests/fixtures/resources.php')
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@PSR12' => true,
    'align_multiline_comment' => [
        'comment_type' => 'phpdocs_like',
    ],
    'array_syntax' => [
        'syntax' => 'short',
    ],
    'array_indentation' => true,
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'binary_operator_spaces' => [
        'operators' => [
            '=' => 'single_space',
            '=>' => 'single_space',
        ],
    ],
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement' => true,
    'cast_spaces' => [
        'space' => 'single',
    ],

    'concat_space' => [
        'spacing' => 'one',
    ],
    'no_extra_blank_lines' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'no_unused_imports' => true,
    'no_whitespace_in_blank_line' => true,
    'ordered_imports' => [
        'imports_order' => [
            'class',
            'function',
            'const',
        ],
    ],
    'single_quote' => true,
    'trailing_comma_in_multiline' => true,
    'whitespace_after_comma_in_array' => true,
    'ternary_operator_spaces' => true,
    'ternary_to_null_coalescing' => true,
    ])->setUsingCache(false)
    ->setFinder($finder)
;
