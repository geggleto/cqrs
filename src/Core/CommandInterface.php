<?php
/**
 * Created by PhpStorm.
 * User: glenneggleton
 * Date: 2016-12-09
 * Time: 2:57 PM
 */

namespace Cqrs\Core;


interface CommandInterface
{
    public function getCommand();
}