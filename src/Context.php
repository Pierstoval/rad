<?php

namespace Rad;

use Doctrine\Persistence\ObjectRepository;
use Psr\Container\ContainerInterface;

final class Context
{
    private static ?ContainerInterface $container = null;

    public static function setContainer(ContainerInterface $container): void
    {
        self::$container = $container;
    }

    public static function getContainer(): ?ContainerInterface
    {
        return self::$container;
    }

    public static function service(string $id): object
    {
        if (!self::$container) {
            throw new \RuntimeException('Container was not set in "%s" service.');
        }

        return self::$container->get($id);
    }

    public static function entity(string $entityName): ObjectRepository
    {
        if (!class_exists($entityName) && !str_contains($entityName, '\\')) {
            $entityName = 'App\Entity\\'.$entityName;
        }

        return self::service('doctrine')->getRepository($entityName);
    }
}
