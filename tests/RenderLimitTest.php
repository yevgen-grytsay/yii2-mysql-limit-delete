<?php
use YevgenGrytsay\Yii2DbLimitedDelete\DeleteQuery;

/**
 * Created by PhpStorm.
 * User: yevgen
 * Date: 25.08.15
 * Time: 16:53
 */
class RenderLimitTest extends TestCase
{
    /**
     * @dataProvider sqlProvider
     *
     * @param $sql
     * @param $limit
     * @param $expected
     */
    public function testShouldRenderNumber($sql, $limit, $expected)
    {
        $builder = new DeleteQuery($this->createDummyConnection(), $this->createDummyQueryBuilder());

        $actual = $builder->renderLimit($sql, $limit);

        $this->assertEquals($actual, $actual);
    }

    public function sqlProvider()
    {
        return [
            ['', 0, ' LIMIT 0'],
            ['', 1, ' LIMIT 1'],
            ['', '1', ' LIMIT 1'],
            ['', 's', ' LIMIT 0']
        ];
    }
}