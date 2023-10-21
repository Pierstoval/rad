<?php

namespace Rad\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ContextPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
//        dd($container);
    }
}
