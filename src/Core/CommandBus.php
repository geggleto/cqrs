<?php
/**
 * Created by PhpStorm.
 * User: glenneggleton
 * Date: 2016-12-09
 * Time: 2:55 PM
 */

namespace Cqrs\Core;


use Interop\Container\ContainerInterface;

class CommandBus
{
    /** @var array  */
    protected $handlers;

    /** @var ContainerInterface  */
    protected $container;


    /**
     * CommandBus constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->handlers = [];
    }

    /**
     * @param $key
     * @param $handler
     *
     * @throws \Exception
     */
    public function addHandler($key, $handler) {
        if (isset($this->handlers[$key])) {
            throw new \Exception("Handler for `$key` already exists");
        }

        $this->handlers[$key] = $handler;
    }

    /**
     * @param CommandInterface $command
     *
     * @throws \Exception
     */
    public function handle(CommandInterface $command) {
        $key = $command->getCommand();

        if (!isset($this->handlers[$key])) {
            throw new \Exception("No handlers for `$key` found");
        }

        /** @var $handler HandlerInterface */
        $handler = $this->container->get($this->handlers[$key]);

        $handler->handle($command);
    }
}