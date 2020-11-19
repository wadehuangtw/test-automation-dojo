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
    protected $employees;

    protected function setUp(): void
    {
        parent::setUp();

        $this->employees = [
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
    }

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
        $collection = new Collection($this->employees);

        /** @Act 調用受測物件的方法 */
        // 取出所有集合的內容物
        $allItems = $collection->all();

        /** @Assert 驗證是否符合預期 */
        self::assertEquals($this->employees, $allItems);
    }

    /**
     * 返回集合的索引
     *
     * @see Collection::keys()
     */
    public function testKeys()
    {
        /** @Arrange */
        $collection = new Collection([
            'name' => 'wade huang',
            'birth' => '1993',
            'sex' => 'male',
            'location' => 'taiwan',
            'job' => 'web developer'
        ]);
        $expected = ['name', 'birth', 'sex', 'location', 'job'];

        /** @Act */
        $actual = $collection->keys();

        /** @Assert */
        $this->assertSame($expected, $actual);
    }

    /**
     * 替換整個集合的內容
     *
     * @see Collection::replace()
     */
    public function testReplace()
    {
        /** @Arrange */
        $collection = new Collection([
            'name' => 'wade huang',
            'birth' => '1993',
            'sex' => 'male',
            'location' => 'taiwan',
            'job' => 'web developer',
            'interest' => 'coding',
        ]);
        $replacer = [
            'location' => 'Kaohsiung',
            'interest' => 'TDD'
        ];
        $expected = [
            'name' => 'wade huang',
            'birth' => '1993',
            'sex' => 'male',
            'location' => 'Kaohsiung',
            'job' => 'web developer',
            'interest' => 'TDD',
        ];

        /** @Act */
        $actual = $collection->replace($replacer);

        /** @Assert */
        $this->assertSame($expected, $actual);
    }

    /**
     * 將陣列附加在集合中
     *
     * @see Collection::add()
     */
    public function testAdd()
    {
        /** @Arrange */
        $collection = new Collection([
            'name' => 'wade huang',
            'birth' => '1993',
            'sex' => 'male',
            'location' => 'taiwan',
            'job' => 'web developer',
            'interest' => 'coding',
        ]);
        $replacer = [
            'location' => 'Kaohsiung',
            'interest' => 'TDD'
        ];
        $expected = [
            'name' => 'wade huang',
            'birth' => '1993',
            'sex' => 'male',
            'location' => 'Kaohsiung',
            'job' => 'web developer',
            'interest' => 'TDD',
        ];

        /** @Act */
        $actual = $collection->add($replacer);

        /** @Assert */
        $this->assertSame($expected, $actual);
    }

    /**
     * @see Collection::get()
     */
    public function testGet()
    {
        /** @Arrange */
        $expectedPrice = 100;
        $expectedName = 'apple';
        $expectedDue = '2020-12-31';
        $collection = new Collection([
            'name' => $expectedName,
            'price' => $expectedPrice
        ]);

        /** @Act */
        $price = $collection->get('price');
        $name = $collection->get('name');
        $due = $collection->get('due', $expectedDue);

        /** @Assert */
        $this->assertEquals($expectedName, $name);
        $this->assertEquals($expectedPrice, $price);
        $this->assertEquals($expectedDue, $due);
    }

    /**
     * @see Collection::set()
     */
    public function testSet()
    {
        /** @Arrange */
        $expectedAge = 18;
        $expectedRole = 'student';
        $user = new Collection([
            'name' => 'zang',
            'age' => 17,
        ]);

        /** @Act */
        $user->set('age', $expectedAge);
        $user->set('role', $expectedRole);

        /** @Assert */
        $this->assertEquals($expectedAge, $user->get('age'));
        $this->assertEquals($expectedRole, $user->get('role'));
    }

    /**
     * @see Collection::has()
     */
    public function testHas()
    {
        /** @Arrange */
        $user = new Collection([
            'name' => 'zang',
            'age' => 17,
        ]);

        /** @Act */
        $hasRole = $user->has('role');
        $hasName = $user->has('name');

        /** @Assert */
        $this->assertEquals(false, $hasRole);
        $this->assertEquals(true, $hasName);
    }

    /**
     * @see Collection::remove()
     */
    public function testRemove()
    {
        /** @Arrange */
        $user = new Collection([
            'name' => 'zang',
            'age' => 17,
            'role' => 'student',
        ]);

        /** @Act */
        $user->remove('role');

        /** @Assert */
        $this->assertEquals(false, $user->has('role'));
    }

    /**
     * @see Collection::where()
     */
    public function testWhere()
    {
        /** @Arrange */
        $employees = new Collection($this->employees);

        /** @Act */
        $developer = $employees->where('job', 'web developer')->all();
        $john = $employees->where('name', 'john')->all();

        /** @Assert */
        $this->assertEquals('wade huang', array_shift($developer)['name']);
        $this->assertEquals('1988', array_shift($john)['birth']);
    }

    /**
     * @see Collection::count()
     */
    public function testCount()
    {
        /** @Arrange */
        $employees = new Collection($this->employees);

        /** @Act */
        $count = $employees->count();

        /** @Assert */
        $this->assertSame(3, $count);
    }
}