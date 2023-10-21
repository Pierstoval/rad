<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Faker\Factory;
use Orbitale\Component\ArrayFixture\ArrayFixture;
use Symfony\Component\Uid\Uuid;

class AuthorsFixtures extends ArrayFixture implements ORMFixtureInterface
{
    public static array $authorsIds = [];

    public static function getRandomExistingId()
    {
        return self::$authorsIds[array_rand(self::$authorsIds)];
    }

    protected function getEntityClass(): string
    {
        return Author::class;
    }

    protected function getReferencePrefix(): ?string
    {
        return 'author-';
    }

    protected function getObjects(): iterable
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            self::$authorsIds[] = $id = (string) Uuid::v6();
            yield [
                'id' => $id,
                'firstName' => $faker->firstName(),
                'lastName' => $faker->lastName(),
            ];
        }
    }
}
