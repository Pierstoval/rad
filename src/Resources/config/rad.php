<?php


use Rad\Twig\RadExtension;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container) {
    $container->services()->defaults()
        ->autowire(true)
        ->autoconfigure(true)

        ->set(RadExtension::class)
    ;
};
