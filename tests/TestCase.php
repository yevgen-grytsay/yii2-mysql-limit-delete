<?php

/**
 * Created by PhpStorm.
 * User: yevgen
 * Date: 25.08.15
 * Time: 17:08
 */
class TestCase extends PHPUnit_Framework_TestCase
{

    /**
     * @return \yii\db\Connection
     */
    protected function createDummyConnection()
    {
        return $this->getMockBuilder(\yii\db\Connection::class)
                    ->disableOriginalConstructor()
                    ->getMock();
    }

    /**
     * @return \yii\db\mysql\QueryBuilder
     */
    protected function createDummyQueryBuilder()
    {
        return $this->getMockBuilder(\yii\db\mysql\QueryBuilder::class)
                    ->disableOriginalConstructor()
                    ->getMock();
    }
}