<?php

/**
 * Created by PhpStorm.
 * User: yevgen
 * Date: 25.08.15
 * Time: 17:06
 */
class RenderBaseDeleteSqlTest extends TestCase
{
    /**
     * @var string
     */
    protected $table = 'mysqlTableName';

    /**
     * @var array
     */
    protected $condition = ['=', 'a', 'b'];

    public function testShouldDelegateRenderToQueryBuilder()
    {
        /** @var \yii\db\mysql\QueryBuilder $mqb */
        $mqb = $this->getMockBuilder(\yii\db\mysql\QueryBuilder::class)
            ->disableOriginalConstructor()
            ->getMock();
        $mqb->expects($this->once())
            ->method('delete')
            ->with($this->table, $this->condition);
        $qb = new \YevgenGrytsay\Yii2DbLimitedDelete\DeleteQuery($this->createDummyConnection(), $mqb);

        $qb->createDeleteSqlAndParams($this->table, $this->condition);
    }
}