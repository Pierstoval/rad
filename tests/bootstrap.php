<?php

use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../demo_app/vendor/autoload.php';

$env = new Dotenv();
$env->load(__DIR__.'/../demo_app/.env');
$env->load(__DIR__.'/../.env.test');

$kernel = new Kernel('test', false);
$kernel->boot();
$app = new Application($kernel);
$output = new ConsoleOutput();
$input = new ArrayInput([]);
$input->setInteractive(false);
$app->get('doctrine:database:drop')->run($input, $output);
$app->get('doctrine:database:create')->run($input, $output);
$app->get('doctrine:schema:create')->run($input, $output);
$app->get('doctrine:fixtures:load')->run($input, $output);

$app->reset();
unset($app);
$kernel->shutdown();
unset($kernel);
