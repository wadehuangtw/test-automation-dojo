<?php

namespace Tests\Collection;

use PHPUnit\Framework\TestCase;
use Src\Collection\Collection;

/**
 * Class CollectionTest
 *
 * 請完成 Collection 所有方法的測試案例
 *
 * @package Tests\Collection
 */
class CollectionTest extends TestCase
{
    /**
     * 取出 Collection 集合的所有內容物
     *
     * 這是測試案例的範例，在 CollectionTest 的練習中，請一律採用 3A 原則來設計你的測試案例。
     *
     * @see Collection::all()
     *
     * 3A 原則的寫法如下
     */
    public function testAll()
    {
        /** @Arrange 準備測試資料 */
        $employees = [
            [
                'name' => 'wade huang',
                'birth' => '1993',
                'sex' => 'male',
                'location' => 'taiwan',
                'job' => 'web developer'
            ],
            [
                'name' => 'kojima',
                'birth' => '1966',
                'sex' => 'male',
                'location' => 'japan',
                'job' => 'director'
            ],
            [
                'name' => 'john',
                'birth' => '1988',
                'sex' => 'male',
                'location' => 'united states',
                'job' => 'marketing'
            ],
        ];
        $collection = new Collection($employees);

        /** @Act 調用受測物件的方法 */
        // 取出所有集合的內容物
        $allItems = $collection->all();

        /** @Assert 驗證是否符合預期 */
        self::assertEquals($employees, $allItems);
    }
}