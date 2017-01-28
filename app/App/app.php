<?php
require __DIR__ . '/../../vendor/autoload.php';
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RouteCollection;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app['debug'] = true;

$app['routes'] = $app->extend('routes', function (RouteCollection $routes, Application $app) {
    $loader     = new YamlFileLoader(new FileLocator(__DIR__ . '/../../src/AppBundle/Config/'));
    //  $loader     = new YamlFileLoader(new FileLocator(__DIR__ ));
    $collection = $loader->load('routes.yml');
    $routes->addCollection($collection);

    return $routes;
});
return $app;