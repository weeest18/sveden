<?php
namespace Vlsu\Sveden\Controller;

use TYPO3\CMS\Core\Messaging\AbstractMessage;
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use mysqli;
use TYPO3\CMS\Core\DataHandling\DataHandler;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use Doctrine\DBAL\Configuration;

class TableController extends ActionController
{
    
    public function getDataFromTable($tableName)
    {
        $sql = trim($tableName);
    
        // Извлекаем основные компоненты запроса
        preg_match('/^SELECT (.+) FROM (\w+) WHERE (.+) ORDER BY (.+)$/i', $sql, $matches);
        
        if (count($matches) !== 5) {
            return "Неверный SQL-запрос.";
        }
    
        $selectFields = $matches[1];
        $tableName = $matches[2];
        $whereCondition = $matches[3];
        $orderBy = $matches[4];
    

        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $databaseConnection = $connectionPool->getConnectionForTable($tableName);
        $queryBuilder = $databaseConnection->createQueryBuilder();        
        $queryBuilder->select( $selectFields)
            ->from($tableName)
            ->where($whereCondition)
            ->orderBy($orderBy);

        $results = $queryBuilder->execute()->fetchAll();
        $result = $results;

        return $result;

    }
}