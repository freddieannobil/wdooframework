<?php
/**
 * Created by Freddie Annobil-Dodoo @ Webberdoo.co.uk.
 */

namespace Webberdoo\App\Templating;

use Cocur\Slugify\Slugify;
use Pimple\ServiceProviderInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Pimple\Container;
use Webberdoo\App\Templating\src\Template;
use Webberdoo\App\Templating\src\WdooCache;


class TemplatingServiceProvider implements ServiceProviderInterface
{

	/**
	 * @param Application $app
	 */
	public function register(Container $app)
	{
		$app['cache'] = function () use ($app){
				return new WdooCache();
		};

        $app['templating'] = function () use ($app){
                return new Template($app);
        };

	}

	/**
	 * Bootstraps the application.
	 *
	 * This method is called after all services are registered
	 * and should be used for "dynamic" configuration (whenever
	 * a service must be requested).
	 */
	public function boot(Application $app)
	{
		// TODO: Implement boot() method.
	}
}