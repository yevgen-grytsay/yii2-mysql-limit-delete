<?php

/**
 * Created by PhpStorm.
 * User: yevgen
 * Date: 25.08.15
 * Time: 17:14
 */
class CreateCommandTest extends TestCase
{
    /**
     * @var string
     */
    protected $deleteSqlStatement = 'DELETE FROM mysql_table_name';

    /**
     * @var string
     */
    protected $limitedDeleteSqlStatement = 'DELETE FROM mysql_table_name LIMIT 0';

    public function testShouldCreateCommand()
    {
        $builder = new \YevgenGrytsay\Yii2DbLimitedDelete\DeleteQuery($this->createConnectionMock(), $this->createFakeDeleteQueryBuilder());

        $builder->delete('', '', '');
    }

    /**
     * @return \yii\db\mysql\QueryBuilder
     */
    protected function createFakeDeleteQueryBuilder()
    {
        $qb = $this->getMockBuilder(\yii\db\mysql\QueryBuilder::class)
                   ->disableOriginalConstructor()
                   ->getMock();
        $qb->expects($this->any())
            ->method('delete')
            ->willReturn($this->deleteSqlStatement);

        return $qb;
    }

    /**
     * @return \yii\db\Connection
     */
    protected function createConnectionMock()
    {
        $conn = $this->getMockBuilder(\yii\db\Connection::class)
                     ->disableOriginalConstructor()
                     ->getMock();
        $conn->expects($this->any())
            ->method('createCommand')
            ->with($this->limitedDeleteSqlStatement);

        return $conn;
    }
}