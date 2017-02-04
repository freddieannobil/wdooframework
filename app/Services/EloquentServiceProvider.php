<?php
namespace Webberdoo\App\Services;

use Silex\Application;
use Pimple\ServiceProviderInterface;
use Illuminate\Database\Capsule\Manager as Capsule;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Pimple\Container;

/**
 * Class EloquentServiceProvider
 * @package ENM\Core\Service\Providers
 */
class EloquentServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Application $app
     */
    public function register(Container $app)
    {
        $app['capsule'] = function () {
            return new Capsule();
        };

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
