<?php declare(strict_types=1);

namespace Vlsu\Sveden\DataProcessing;

use TYPO3\CMS\Core\Service\FlexFormService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;


class ExcelProcessor implements DataProcessorInterface
{
    protected $flexFormService;

    public function __construct()
    {
        $this->flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
    }

    /**
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */

    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
    {
        // Получаем значение названия таблицы и полей выборки из конфигурации
       // $tableName = $processorConfiguration['tableName'];
        // $tableName = (string) $cObj->stdWrapValue('fieldName', $processorConfiguration);
        // if ($tableName === '') {
        //     $tableName = 'pi_flexform';
        // }
        // if (!isset($processedData['data'][$tableName])) {
        //     return $processedData;
        // }

        // $originalValue = $processedData['data'][$tableName];
        // if (!is_string($originalValue)) {
        //     return $processedData;
        // }
        // $flexformData = $this->flexFormService->convertFlexFormContentToArray($originalValue);

        // $targetVariableName = (string) $cObj->stdWrapValue('as', $processorConfiguration);
        // if ($targetVariableName !== '') {
        //     $processedData[$targetVariableName] = $flexformData;
        // } else {
        //     $processedData['data'][$tableName] = $flexformData;
        // }

        // $fieldName = $cObj->stdWrapValue('fieldName', $processorConfiguration);
        // if (empty($fieldName)) {
        //     return $processedData;
        // }

        // $tableName = (string)$cObj->data[$fieldName];

       //$tableName = (string) $GLOBALS['TSFE']->$cObj->$processorConfiguration['tableName'];
        // $fields = $processorConfiguration['fields'];

        // Вызываем контроллер для выборки данных из таблицы
        $controller = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Vlsu\\Sveden\\Controller\\ExcelController');
        $result = $controller->listAction();

        // Передаем результат выборки обработчику Fluid

        //$processedData['tableName'] = $tableName;
        $processedData['result_excel'] = $result;

        return $processedData;
    }
}