<?php
/**
 * Created by Freddie Annobil-Dodoo @ Webberdoo.co.uk.
 */

namespace Webberdoo\App\Services;

use Cocur\Slugify\Slugify;
use Silex\Application;
use Pimple\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Pimple\Container;


class AppServiceProvider implements ServiceProviderInterface
{


	public function register(Container $app)
	{

		$app['request'] = function () {
				return new Request();

			};

		$app['slug'] = function () {

				return new Slugify();
			};

		$app['notify'] = function () {

				//return new Notify();
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