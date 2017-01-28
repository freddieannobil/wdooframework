<?php
namespace Webberdoo\App\Services;


use Webberdoo\App\Upload\Upload;
use Silex\Application;
use Pimple\ServiceProviderInterface;

/**
 * Class UploadServiceProvider
 * @package ENM\Core\Service\Providers
 */
class UploadServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['doo.upload'] = $app->share(function () use ($app) {
            $app['max.upload.size']   = 5000 * 1024;
            $upload = new Upload(__DIR__ . '/../../src/Storage/Uploads/' . $app['upload.folder'] . '/');
            $upload->setMaxSize($app['max.upload.size']);
            $upload->allowAllTypes();

            return $upload;
        });
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {

    }
}
