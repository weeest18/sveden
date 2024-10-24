<?php
namespace Vlsu\Sveden\Controller;

use PhpOffice\PhpSpreadsheet\IOFactory;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ExcelController extends ActionController
{
    public function listAction()
    {
        // Укажите путь к вашему файлу Excel
        $filePath = '/var/www/vlsu_bootstrap/typo3conf/ext/sveden/Resources/Private/Excel/example.xlsx';

        // Загрузка файла Excel
        $spreadsheet = IOFactory::load($filePath);

        // Получение данных из активного листа
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        // Передаем данные в шаблон
        //$this->view->assign('sheetData', $sheetData);
        $result = $sheetData;
        return $result;
    }
}