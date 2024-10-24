<?php

/**
 * Extension Manager/Repository config file for ext "sveden".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'sveden',
    'description' => '',
    'category' => '',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
            'fluid_styled_content' => '8.7.0-8.7.99',
            'rte_ckeditor' => '8.7.0-8.7.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Vlsu\\Sveden\\' => 'Classes',
        ],
    ],
    'state' => 'alpha',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'vyacheslav antonov',
    'author_email' => 'weeest18@rambler.ru',
    'author_company' => 'Vlsu',
    'version' => '1.0.1',
];
