<?php
namespace Webberdoo\App\Services;

use Webberdoo\AppBundle\Forms\Rules\CreateUserRule;
use Webberdoo\AppBundle\Forms\Rules\RegistrationRules;
use Webberdoo\AppBundle\Forms\Rules\EditUserRule;
use Webberdoo\AppBundle\Forms\Rules\ResetEmailFormRule;
use Webberdoo\AppBundle\Forms\Rules\ResetPwdFormRule;
use Webberdoo\AppBundle\Forms\Rules\SocialAuthRules;
use Silex\Application;
use Pimple\ServiceProviderInterface;

/**
 * Class FormServiceProvider
 * @package ENM\Core\Service\Providers
 */
class ValidationRuleServiceProvider implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        /*
        |--------------------------------------------------------------------------
        |              FRONT END FORMS
        |--------------------------------------------------------------------------
        */

        $app['install_db_rule'] = $app->share(function () use ($app) {

            return new DbRule($app);
        });

        $app['reset_email_rule'] = $app->share(function () use ($app) {

            return new ResetEmailFormRule($app);
        });

        $app['reset_pwd_rule'] = $app->share(function () use ($app) {

            return new ResetPwdFormRule($app);
        });

        $app['create_user_rule'] = $app->share(function () use ($app) {

            return new CreateUserRule($app);
        });

        $app['edit_user_rule'] = $app->share(function () use ($app) {

            return new EditUserRule($app);
        });

        $app['registration-form-rules'] = $app->share(function () use ($app) {

            return new RegistrationRules($app);
        });

        $app['social-auth-rules'] = $app->share(function () use ($app) {

            return new SocialAuthRules($app);
        });

    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {

    }
}
