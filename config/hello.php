<?php declare(strict_types = 1);

use Cekurte\Environment\Environment;

return [
    'defaultMessage' => Environment::get('DEFAULT_MESSAGE', 'Hello!'),
];
