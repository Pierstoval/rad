<?php

namespace Rad\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FunctionTest extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel();
    }

    public function test_global_entity_function_exists(): void
    {
        self::assertTrue(function_exists('entity'));
    }

    public function test_global_service_function_exists(): void
    {
        self::assertTrue(function_exists('service'));
    }

    public function test_entity_repository_works_with_short_name(): void
    {
        $repo = entity('Book');

        self::assertNotEmpty($repo);

        $entities = $repo->findAll();

        self::assertCount(10, $entities);
    }

}
