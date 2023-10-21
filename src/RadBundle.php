<?php

namespace Rad;

use Rad\DependencyInjection\Compiler\ContextPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RadBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new ContextPass());
    }

    public function boot(): void
    {
        require_once __DIR__.'/functions.php';

        Context::setContainer($this->container);
    }
}
