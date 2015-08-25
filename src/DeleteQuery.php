<?php

/**
 * Created by PhpStorm.
 * User: yevgen
 * Date: 25.08.15
 * Time: 16:37
 */
namespace YevgenGrytsay\Yii2DbLimitedDelete;

use yii\db\Connection;
use yii\db\mysql\QueryBuilder;

class DeleteQuery
{
    /**
     * @var Connection
     */
    protected $connection;
    /**
     * @var QueryBuilder
     */
    protected $queryBuilder;

    /**
     * DeleteQuery constructor.
     *
     * @param \yii\db\Connection $connection
     * @param \yii\db\mysql\QueryBuilder $queryBuilder
     */
    public function __construct(Connection $connection, QueryBuilder $queryBuilder)
    {
        $this->connection = $connection;
        $this->queryBuilder = $queryBuilder;
    }


    /**
     * Creates a DELETE SQL command (@see yii\db\Command).
     *
     * @param string $table @see \yii\db\QueryBuilder::delete()
     * @param $condition @see \yii\db\QueryBuilder::delete()
     * @param $limit
     *
     * @return \yii\db\Command
     * @throws \yii\db\Exception
     */
    public function delete($table, $condition, $limit)
    {
        list($sql, $params) = $this->createDeleteSqlAndParams($table, $condition);
        $sql = $this->renderLimit($sql, $limit);

        return $this->_createCommand($sql, $params);
    }

    /**
     * @param $table
     * @param $condition
     *
     * @return array
     */
    public function createDeleteSqlAndParams($table, $condition)
    {
        $sql = $this->queryBuilder->delete($table, $condition, $params);

        return [$sql, $params];
    }

    /**
     * @param $sql
     * @param $limit
     *
     * @return string
     */
    public function renderLimit($sql, $limit)
    {
        return sprintf('%s LIMIT %d', $sql, $limit);
    }

    /**
     * @param $sql
     * @param $params
     *
     * @return \yii\db\Command
     */
    protected function _createCommand($sql, $params)
    {
        return $this->connection->createCommand($sql, $params);
    }
}