<?php
namespace Webberdoo\App\Services;

use Webberdoo\AppBundle\Models\Category\CategoryDbRepository;
use Webberdoo\AppBundle\Models\HomeCategory\HomeCategoryDbRepository;
use Webberdoo\AppBundle\Models\Like\LikeDbRepository;
use Webberdoo\AppBundle\Models\Settings\SettingDbRepository;
use Webberdoo\AppBundle\Models\Group\GroupDbRepository;
use Webberdoo\AppBundle\Models\Logo\LogoDbRepository;
use Webberdoo\AppBundle\Models\Pages\PageDbRepository;
use Webberdoo\AppBundle\Models\SiteMap\SiteMapDbRepository;
use Webberdoo\AppBundle\Models\SiteMeta\SiteMetaDbRepository;
use Webberdoo\AppBundle\Models\SocialAuthentication\SocialAuthenticationDbRepository;
use Webberdoo\AppBundle\Models\SocialKey\SocialKeyDbRepository;
use Webberdoo\AppBundle\Models\SocialUsername\SocialUsernameDbRepository;
use Webberdoo\AppBundle\Models\UnLike\UnLikeDbRepository;
use Webberdoo\AppBundle\Models\User\UserDbRepository;
use Webberdoo\AppBundle\Models\UserSession\UserSessionDbRepository;
use Webberdoo\AppBundle\Models\UserStats\UserStatsDbRepository;
use Webberdoo\AppBundle\Models\Video\VideoDbRepository;
use Webberdoo\AppBundle\Models\VideoStats\VideoStatsDbRepository;
use Webberdoo\AppBundle\Models\Widget\WidgetDbRepository;
use Webberdoo\AppBundle\Models\Channel\ChannelDbRepository;
use Silex\Application;
use Pimple\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Pimple\Container;

/**
 * Class DbRepositoryServiceProvider
 * @package Webberdoo\AppBundle\Service\Providers
 */
class DbRepositoryServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Application $app
     */
    public function register(Container $app)
    {
        $app['channelRepository'] = function () {

                return new ChannelDbRepository();
            };

        $app['homeCategoryRepository'] = $app->share(
            function () {

                return new HomeCategoryDbRepository();
            }
        );

        $app['unLikeRepository'] = $app->share(
            function () {

                return new UnLikeDbRepository();
            }
        );

        $app['likeRepository'] = $app->share(
            function () {

                return new LikeDbRepository();
            }
        );

        $app['videoRepository'] = $app->share(
            function () {

                return new VideoDbRepository();
            }
        );

        $app['commentSettingRepository'] = $app->share(
            function () {

                return new CommentDbRepository();
            }
        );

        $app['widgetRepository'] = $app->share(
            function () {

                return new WidgetDbRepository();
            }
        );

        $app['userRepository'] = $app->share(
            function () {

                return new UserDbRepository();
            }
        );

        $app['userStatsRepository'] = $app->share(
            function () {

                return new UserStatsDbRepository();
            }
        );

        $app['videoStatsRepository'] = $app->share(
            function () {

                return new VideoStatsDbRepository();
            }
        );

        $app['settingRepository'] = $app->share(
            function () {

                return new SettingDbRepository();
            }
        );

        $app['siteMetaRepository'] = $app->share(
            function () {

                return new SiteMetaDbRepository();
            }
        );


        $app['socialAuthenticationRepository'] = $app->share(
            function () {

                return new SocialAuthenticationDbRepository();
            }
        );

        $app['groupRepository'] = $app->share(
            function () {

                return new GroupDbRepository();
            }
        );


        $app['logoRepository'] = $app->share(
            function () {

                return new LogoDbRepository();
            }
        );

        $app['pageRepository'] = $app->share(
            function () {

                return new PageDbRepository();
            }
        );

        $app['siteMapRepository'] = $app->share(
            function () {

                return new SiteMapDbRepository();
            }
        );

        $app['socialKeyRepository'] = $app->share(
            function () {

                return new SocialKeyDbRepository();
            }
        );

        $app['socialUsernameRepository'] = $app->share(
            function () {

                return new SocialUsernameDbRepository();
            }
        );

        $app['userSessionRepository'] = $app->share(
            function () {

                return new UserSessionDbRepository();
            }
        );

        $app['categoryRepository'] = $app->share(
            function () {

                return new CategoryDbRepository();
            }
        );
    }

    /**
     * @param Application $app
     */
    public function boot(Application $app)
    {

    }
}
