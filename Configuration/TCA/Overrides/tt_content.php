<?php

/*
 * This file is part of the package bk2k/bootstrap-package.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    [
        'Выборка из внешних таблиц',
        'query',
        'content-text',
        'sveden',
        'Выборка из внешних таблиц'
    ],
    'CType',
    'query'
);