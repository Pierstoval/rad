<?php

namespace Rad\Twig;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RadExtension extends AbstractExtension
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('entity', $this->getEntity(...)),
        ];
    }

    public function getEntity(string $entityName): ObjectRepository
    {
        if (!class_exists($entityName) && !str_contains($entityName, '\\')) {
            $entityName = 'App\Entity\\'.$entityName;
        }

        return $this->entityManager->getRepository($entityName);
    }
}
