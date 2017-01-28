<?php
namespace Webberdoo\App\Services;

use Silex\Application;
use Webberdoo\AppBundle\Forms\AdBoxesForm;
use Webberdoo\AppBundle\Forms\CategoryForm;
use Webberdoo\AppBundle\Forms\HomeCategoryForm;
use Webberdoo\AppBundle\Forms\HomeSliderForm;
use Webberdoo\AppBundle\Forms\PageForm;
use Webberdoo\AppBundle\Forms\SettingsForm;
use Webberdoo\AppBundle\Forms\SiteMapForm;
use Webberdoo\AppBundle\Forms\SiteMetaForm;
use Webberdoo\AppBundle\Forms\SocialKeysForm;
use Webberdoo\AppBundle\Forms\SocialUsernameForm;
use Webberdoo\AppBundle\Forms\UserCreateForm;
use Webberdoo\AppBundle\Forms\UserEditForm;
use Webberdoo\AppBundle\Forms\UserRegistrationForm;
use Webberdoo\AppBundle\Forms\VideoChannelType;
use Webberdoo\AppBundle\Forms\VideoForm;
use Webberdoo\AppBundle\Forms\WidgetForm;
use Webberdoo\AppBundle\Forms\LoginForm;
use Webberdoo\AppBundle\Forms\ImportForm;
use Pimple\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Pimple\Container;

/**
 * Class FormServiceProvider
 * @package ENM\Core\Service\Providers
 */
class FormServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Application $app
     */
    public function register(Container $app)
    {
        /*
        |--------------------------------------------------------------------------
        |              FRONT END FORMS
        |--------------------------------------------------------------------------
        */
        $app['import.form'] = $app->share(function () use ($app) {

            return new ImportForm($app);
        });

        $app['home.category.form'] = $app->share(function () use ($app) {

            return new HomeCategoryForm($app);
        });

        $app['login.form'] = $app->share(function () use ($app) {

            return new LoginForm($app);
        });

        $app['channel.form'] = $app->share(function () use ($app) {

            return new VideoChannelType($app);
        });

        $app['category.form'] = $app->share(function () use ($app) {

            return new CategoryForm($app);
        });

        $app['video.form'] = $app->share(function () use ($app) {

            return new VideoForm($app);
        });

        $app['form.createUser'] = $app->share(function () use ($app) {

            return new UserCreateForm($app);
        });

        $app['homeSlider.form'] = $app->share(function () use ($app) {

            return new HomeSliderForm($app);
        });

        $app['widget.form'] = $app->share(function () use ($app) {

            return new WidgetForm($app);
        });

        $app['settings.form'] = $app->share(function () use ($app) {

            return new SettingsForm($app);
        });

        $app['site.meta.form'] = $app->share(function () use ($app) {

            return new SiteMetaForm($app);
        });

        $app['user.registration.form'] = $app->share(function () use ($app) {

            return new UserRegistrationForm($app);
        });

        $app['site.map.form'] = $app->share(function () use ($app) {

            return new SiteMapForm($app);
        });

        $app['page.form'] = $app->share(function () use ($app) {

            return new PageForm($app);
        });

        $app['social.key.form'] = $app->share(function () use ($app) {

            return new SocialKeysForm($app);
        });

        $app['social.username.form'] = $app->share(function () use ($app) {

            return new SocialUsernameForm($app);
        });

        $app['create.user.form'] = $app->share(function () use ($app) {

           // return new CreateUserForm($app);
            return new UserCreateForm($app);
        });

        $app['edit.user.form'] = $app->share(function () use ($app) {

            // return new CreateUserForm($app);
            return new UserEditForm($app);
        });

        $app['widget.form'] = $app->share(function () use ($app) {
            return new WidgetForm($app);
        });

    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {

    }
}
