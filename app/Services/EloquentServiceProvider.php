<?php
namespace Webberdoo\App\Services;

use Silex\Application;
use Pimple\ServiceProviderInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

/**
 * Class EloquentServiceProvider
 * @package ENM\Core\Service\Providers
 */
class EloquentServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['capsule'] = $app->share(function () {
            return new Capsule();
        });

        $capsule = $app['capsule'];

        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => $app['database_host'],
            'database'  => $app['database_name'],
            'username'  => $app['database_user'],
            'password'  => $app['database_password'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        /*$app['doo.container'] = $app->share(function () {
            return new Container;
        });

        $app['doo.dispatcher'] = $app->share(function () use ($app) {
            return new Dispatcher($app['doo.container']);
        });

        $capsule->setEventDispatcher($app['doo.dispatcher']);*/

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {

    }
}
