<?php

namespace Rad\ServiceContainer;

use Psr\Container\ContainerInterface;

class RadContainer implements ContainerInterface
{
    public function __construct(private readonly iterable $services = [])
    {
    }

    public function get(string $id)
    {
        return $this->services[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services);
    }
}
