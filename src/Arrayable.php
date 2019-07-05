<?php
/**
 * Created by IntelliJ IDEA.
 * User: hugh.li
 * Date: 2019-07-05
 * Time: 15:00
 */

namespace HughCube;

use ArrayAccess;
use IteratorAggregate;

class Arrayable implements ArrayAccess, IteratorAggregate
{
    use ArrayableTrait;
}
