<?php

namespace Src\Collection;

/**
 * Collectable is a container for key/value pairs.
 *
 * 用來處理 key/value pairs 的集合
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface Collectable
{
    /**
     * 返回集合所有的資料
     *
     * @return array An array of parameters
     */
    public function all();

    /**
     * 返回集合的索引
     *
     * Returns the parameter keys.
     *
     * @return array An array of parameter keys
     */
    public function keys();

    /**
     * 替換整個集合的內容
     *
     * Replaces the current parameters by a new set.
     */
    public function replace(array $parameters = []);

    /**
     * 將陣列附加在集合中
     *
     * （提示：array_replace）
     *
     * Adds parameters.
     */
    public function add(array $parameters = []);

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
    public function get(string $key, $default = null);

    /**
     * 替指定的索引配置內容物
     *
     * Sets a parameter by name.
     *
     * @param mixed $value The value
     */
    public function set(string $key, $value);

    /**
     * 檢查索引內有沒有這個索引
     *
     * Returns true if the parameter is defined.
     *
     * @return bool true if the parameter exists, false otherwise
     */
    public function has(string $key);

    /**
     * 移除指定索引的內容物
     * 
     * Removes a parameter.
     */
    public function remove(string $key);

    /**
     * Returns the number of parameters.
     *
     * @return int The number of parameters
     */
    public function count();
}