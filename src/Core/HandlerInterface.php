<?php
/**
 * Created by PhpStorm.
 * User: glenneggleton
 * Date: 2016-12-09
 * Time: 2:58 PM
 */

namespace Cqrs\Core;


interface HandlerInterface
{
    public function handle(CommandInterface $command);
}