<?php

namespace Rad\Tests;

use Rad\Context;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContextTest extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel();
    }

    public function testGlobalContextHasContainer(): void
    {
        self::assertNotEmpty(Context::getContainer());
    }
}
