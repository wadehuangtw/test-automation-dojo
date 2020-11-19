<?php

namespace Src\Collection;

/**
 * Collection is a container for key/value pairs.
 */
class Collection implements Collectable
{
    /**
     * Parameter storage.
     */
    protected $parameters;

    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * 返回集合所有的資料
     *
     * @return array An array of parameters
     */
    public function all()
    {
        // TODO: Implement all() method.
    }

    /**
     * 返回集合的索引
     *
     * Returns the parameter keys.
     *
     * @return array An array of parameter keys
     */
    public function keys()
    {
        // TODO: Implement keys() method.
    }

    /**
     * 替換整個集合的內容
     *
     * Replaces the current parameters by a new set.
     */
    public function replace(array $parameters = [])
    {
        // TODO: Implement replace() method.
    }

    /**
     * 將陣列附加在集合中
     *
     * （提示：array_replace）
     *
     * Adds parameters.
     */
    public function add(array $parameters = [])
    {
        // TODO: Implement add() method.
    }

    /**
     * 返回指定索引的內容物
     *
     * Returns a parameter by name.
     *
     * @param string $key 要存取集合內容物的索引
     * @param mixed $default 預設值 The default value if the key does not exist
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        // TODO: Implement get() method.
    }

    /**
     * 替指定的索引設值
     *
     * Sets a parameter by name.
     *
     * @param mixed $value The value
     */
    public function set(string $key, $value)
    {
        // TODO: Implement set() method.
    }

    /**
     * 檢查索引內有沒有這個索引
     *
     * Returns true if the parameter is defined.
     *
     * @return bool true if the parameter exists, false otherwise
     */
    public function has(string $key)
    {
        // TODO: Implement has() method.
    }

    /**
     * 移除指定索引的內容物
     *
     * Removes a parameter.
     */
    public function remove(string $key)
    {
        // TODO: Implement remove() method.
    }

    /**
     * 在指定的索引中，找出和查詢條件相符的內容物
     *
     * @param string $key 指定的索引
     * @param string|int $condition 查詢條件
     *
     * @return mixed
     */
    public function where(string $key, $condition)
    {
        // TODO: Implement where() method.
    }

    /**
     * Returns the number of parameters.
     *
     * @return int The number of parameters
     */
    public function count()
    {
        // TODO: Implement count() method.
    }
}