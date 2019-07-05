<?php
/**
 * Created by IntelliJ IDEA.
 * User: hugh.li
 * Date: 2019-07-05
 * Time: 15:00
 */

namespace HughCube;

use ArrayIterator;

/**
 * Trait ArrayableTrait
 * @package HughCube
 */
trait ArrayableTrait
{
    /**
     * @var array 容器数组
     */
    private $__container = [];

    /**
     * NodeIndex constructor.
     * @param array $container
     */
    public function __construct(array $container)
    {
        $this->__container = $container;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->offsetGet($name);
    }

    /**
     * @param $name
     * @param $value
     * @return mixed|null
     */
    public function __set($name, $value)
    {
        $this->offsetSet($name, $value);
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new ArrayIterator($this->__container);
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        if (null === $offset){
            $this->__container[] = $value;
        }

        $this->__container[$offset] = $value;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return isset($this->__container[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->__container[$offset]);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        return isset($this->__container[$offset]) ? $this->__container[$offset] : null;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->__container;
    }
}
