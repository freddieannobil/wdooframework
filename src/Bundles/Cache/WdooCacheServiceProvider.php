<?php
/**
 * Created by Freddie Annobil-Dodoo @ Webberdoo.co.uk.
 */

namespace Webberdoo\Bundles\Cache;

use Cocur\Slugify\Slugify;
use Pimple\ServiceProviderInterface;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Pimple\Container;


class WdooCacheServiceProvider implements ServiceProviderInterface
{

	/**
	 * @param Application $app
	 */
	public function register(Container $app)
	{
		$app['cache'] = $app->protect(
			function () use ($app){

			//	return new Admin($app);

			}
		);




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