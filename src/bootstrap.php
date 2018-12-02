<?php declare(strict_types = 1);

use DI\ContainerBuilder;
use Noodlehaus\Config;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    Config::class => function ($c) {
        return new Config(__DIR__ . '/../config');
    },
]);

return $containerBuilder->build();
