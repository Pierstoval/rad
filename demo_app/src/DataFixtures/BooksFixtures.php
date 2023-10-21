<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;
use Orbitale\Component\ArrayFixture\ArrayFixture;
use Symfony\Component\Uid\Uuid;

class BooksFixtures extends ArrayFixture implements ORMFixtureInterface, DependentFixtureInterface
{
    protected function getEntityClass(): string
    {
        return Book::class;
    }

    public function getDependencies(): array
    {
        return [
            AuthorsFixtures::class,
        ];
    }

    protected function getObjects(): iterable
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 10; $i++) {
            yield [
                'id' => (string) Uuid::v6(),
                'title' => $faker->text(20),
                'description' => $faker->text(255),
                'author' => $this->getReference('author-'.AuthorsFixtures::getRandomExistingId()),
            ];
        }
    }
}
