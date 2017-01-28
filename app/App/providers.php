<?php

/**
 * Created by Freddie Annobil-Dodoo @ Webberdoo.co.uk.
 */

/*
|--------------------------------------------------------------------------
|             REGISTER SILEX SERVICE PROVIDERS
|--------------------------------------------------------------------------
|
*/

$app->register(new \Silex\Provider\FormServiceProvider());

$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), [
    'twig.path' => __DIR__ . '/../../src/AppBundle/Views',
]);

$app->register(new Silex\Provider\TranslationServiceProvider($app), [
    'locale'           => $app['language'],
    'locale_fallbacks' => ['en']

]);

$app->register(new Silex\Provider\HttpCacheServiceProvider(), array(
    'http_cache.cache_dir' => __DIR__.'/../Templating/HttpCache/Cache',
));

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

//$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->register(new \Silex\Provider\HttpFragmentServiceProvider());


/*
|--------------------------------------------------------------------------
|             REGISTER APP AND BUNDLE SERVICE PROVIDERS
|--------------------------------------------------------------------------
|
*/

//Register the App Service provider into the silex container
$app->register(new \Webberdoo\App\Services\AppServiceProvider());

$app->register(new \Webberdoo\App\Templating\TemplatingServiceProvider());

//$app->register(new \Cocur\Slugify\Bridge\Silex\SlugifyServiceProvider());

/*$app->register(new \Webberdoo\App\Services\EloquentServiceProvider());

$app->register(new \Webberdoo\App\Services\DbRepositoryServiceProvider());

$app->register(new \Webberdoo\App\Services\UploadServiceProvider());

$app->register(new \Webberdoo\App\Services\ValidationRuleServiceProvider());

$app->register(new \Webberdoo\App\Services\FormServiceProvider());*/



//Bundles

/*$app->register(new \Webberdoo\Bundles\AuthBundle\AuthServiceProvider());


$app->register(new \Webberdoo\Bundles\AdminStatsBundle\AdminStatsServiceProvider());

$app->register(new \Webberdoo\Bundles\PaginateBundle\PaginationServiceProvider());

$app->register(new \Webberdoo\Bundles\MailerBundle\MailerServiceProvider());

$app->register(new Webberdoo\Bundles\GravatarBundle\GravatarServiceProvider());

$app->register(new Webberdoo\Bundles\OauthBundle\OauthServiceProvider());

$app->register(new \Webberdoo\Bundles\SocialShareBundle\SocialShareServiceProvider());

$app->register(new \Webberdoo\Bundles\VideoBundle\VideoServiceProvider());*/

//auth
//$app->register(new \Webberdoo\App\Services\SentinelServiceProvider());