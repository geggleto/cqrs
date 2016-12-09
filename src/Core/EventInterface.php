<?php
/**
 * Created by PhpStorm.
 * User: glenneggleton
 * Date: 2016-12-09
 * Time: 3:09 PM
 */

namespace Cqrs\Core;


interface EventInterface
{
    public function getEventName();
}