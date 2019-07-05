<?php

namespace HughCube\Arrayable\Tests;

use ArrayAccess;
use HughCube\Arrayable;
use IteratorAggregate;
use PHPUnit\Framework\TestCase;

class ArrayableTest extends TestCase
{
    /**
     * @return Arrayable
     */
    public function testInstance()
    {
        $arrayable = new Arrayable([]);

        $this->assertInstanceOf(ArrayAccess::class, $arrayable);
        $this->assertInstanceOf(IteratorAggregate::class, $arrayable);

        return $arrayable;
    }

    /**
     * @param Arrayable $arrayable
     * @depends testInstance
     */
    public function testArrayAccess($arrayable)
    {
        $name = 'test';
        $value = 1;

        $arrayable[$name] = $value;

        $this->assertSame($arrayable[$name], $value);
        $this->assertArrayHasKey($name, $arrayable);

        unset($arrayable[$name]);
        $this->assertArrayNotHasKey($name, $arrayable);
    }

    /**
     * @depends testArrayAccess
     */
    public function testIterator()
    {
        $items = [
            'test' => 1,
            1,
            'test1' => 1,
            2
        ];

        $arrayable = new Arrayable($items);
        $this->assertSame($arrayable->toArray(), $items);

        $_ = [];
        foreach($arrayable as $key => $item){
            $_[$key] = $item;
        }
        $this->assertSame($_, $items);
    }
}
