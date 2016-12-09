<?php
/**
 * Created by PhpStorm.
 * User: glenneggleton
 * Date: 2016-12-09
 * Time: 3:06 PM
 */

namespace Cqrs\Core;


class EventBus
{
    protected $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }

    public function addListener($eventName, callable $listener) {
        if (!isset($this->listeners[$eventName])) {
            $this->listeners[$eventName] = [];
        }
        $this->listeners[$eventName][] = $listener;
    }

    public function notify(EventInterface $event) {
        if (isset($this->listeners[$event->getEventName()])) {
            foreach ($this->listeners[$event->getEventName()] as $listener) {
                call_user_func($listener, $event);
            }
        }
    }
}