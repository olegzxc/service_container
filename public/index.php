<?php
declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use App\Format\JSON;
use App\Format\XML;
use App\Format\YAML;
use App\Format\FormatInterface;
use App\Format\XmlFormatInterface;

use App\Container;

print_r("Autowired Service Container\n\n");

$container = new Container();

$container->addService('format.json', function() use ($container) {
    return new JSON();
});

$container->addService('format.xml', function() use ($container) {
    return new XML();
});

$container->addService('format', function() use ($container) {
    return $container->getService('format.json');
}, FormatInterface::class);

$container->addService('xmlformat', function() use ($container) {
    return $container->getService('format.xml');
}, XmlFormatInterface::class);


$container->loadServices('App\\Service');
$container->loadServices('App\\Controller');

var_dump($container->getServices());

var_dump($container->getService('App\\Controller\\IndexController')->index());
var_dump($container->getService('App\\Controller\\PostController')->index());
