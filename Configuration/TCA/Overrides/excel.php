<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
   'tt_content',
   'CType',
   [
      'label' => 'отображает данные из excel',
      'value' => 'exel',
      'icon' => 'content-text',
      'group' => 'sveden',
      'description' => 'Позволяет выводить данные из excel',
   ]
);
 

// $GLOBALS['TCA']['tt_content']['columns'] += [
//    'tbl' => [
//       'label' => 'Название таблицы',
//       'config' => [
//          'type' => 'input',
//       ],
//    ]
//    ];

  $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['excel'] = 'content-text';

   $GLOBALS['TCA']['tt_content']['types']['excel'] = [
      'showitem' => '
     --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
        --palette--;;general,
        --palette--;;headers,
      --div--;Выбор шаблона отображения данных,
        pi_flexform;,, 
     --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
        rowDescription,
     --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended'
   ];

   \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
       '*',
      'FILE:EXT:sveden/Configuration/FlexForms/ExcelForm.xml',
      'excel'
  );
  