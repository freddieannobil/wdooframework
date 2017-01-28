<?php
namespace Webberdoo\AppBundle\Controllers;



use Silex\Application;

class AppController
{

    public function index(Application $app)
    {
        //$this->data['latestVideos'] = $app['videoRepository']->takeWhere('status', 1, 12);
      //  $this->data['mostViewedVideos'] = $app['videoRepository']->mostViewedGreaterThanLimitWhere('status', 1, 6, 1);

        return $app['templating']->render('homeTag','/index.twig',[]);



    }

    public function search(Application $app)
    {
        $query = $app['request']->query->get('query');

        $searchedVideos = $app['videoRepository']->search($query);

        $searched = $app['twig']->render(
            'Themes/' . $app['theme'] . '/App/search.twig',
            compact('searchedVideos', 'query')
        );

        return $this->cache('searched', $searched);
    }

    public function singleVideo(Application $app, $slug)
    {
        $latestVideos = $app['videoRepository']->takeWhere('status', 1, 20);

        $disqusShortname = (
        isset($app['settingRepository']->first()->disqus_shortname)) ?
            $app['settingRepository']->first()->disqus_shortname : null;

        $video = $app['videoRepository']->video('slug', $slug);
        $visitorCounter = $video->count_visitor;
        $counter = $visitorCounter + 1;
        $app['videoRepository']->update('slug', $slug, [
            'count_visitor' => $counter
        ]);

        $singleVideo = $app['twig']->render(
            'Themes/' . $app['theme'] . '/App/single.twig',
            compact('latestVideos', 'disqusShortname', 'video', 'counter')
        );

        return $this->cache('singleVideo', $singleVideo);
    }

    public function latest(Application $app)
    {
        $total = $app['videoRepository']->getAllWhere('status', 1)->count();

        $app['paginate']->setPagination($total, 12);
        $paginateLatestVideos = $app['videoRepository']
            ->paginateWhere('status', 1, $app['paginate']->offset(), 12);

        $paginationLinks = $app['paginate']->allLinks(
            $app['url_generator']->generate('home') . 'latest-videos?para={nr}'
        );

        $latestVideoCache = $app['twig']->render(
            'Themes/' . $app['theme'] . '/App/latest.twig',
            compact('paginateLatestVideos', 'paginationLinks', 'total')
        );

        return $this->cache('latestVideoCache', $latestVideoCache);
    }

    public function mostViewed(Application $app)
    {
        $total = $app['videoRepository']->mostViewedGreaterThanCount(1);

        $app['paginate']->setPagination($total, 12);
        $paginateMostVideos = $app['videoRepository']
            ->mostViewedGreaterThanPagi(1, 12, $app['paginate']->offset());

        $paginationLinks = $app['paginate']->allLinks(
            $app['url_generator']->generate('home') . 'most-view-videos?para={nr}'
        );

        $mostVideoCache = $app['twig']->render(
            'Themes/' . $app['theme'] . '/App/most.twig',
            compact('paginateMostVideos', 'paginationLinks', 'total')
        );

        return $this->cache('mostVideoCache', $mostVideoCache);
    }

    public function channels(Application $app)
    {
        $total = $app['channelRepository']->getAll()->count();

        $app['paginate']->setPagination($total, 12);
        $paginateChannels = $app['channelRepository']
            ->paginate($app['paginate']->offset(), 12);

        $paginationLinks = $app['paginate']->allLinks(
            $app['url_generator']->generate('home') . 'channels?para={nr}'
        );

        $channelsCache = $app['twig']->render(
            'Themes/' . $app['theme'] . '/App/channels.twig',
            compact('paginateChannels', 'paginationLinks')
        );

        return $this->cache('channelsCache', $channelsCache);
    }

    public function channel($channelId, Application $app)
    {
        $channel = $app['channelRepository']->whereFirst('channelId', $channelId);
        $total = $channel->videos()->count();

        $app['paginate']->setPagination($total, 12);
        $paginateChannelVideos = $channel->videos()
            ->where('status', 1)
            ->skip($app['paginate']->offset())
            ->take(12)
            ->orderBy('created_at', 'desc')
            ->get();

        $paginationLinks = $app['paginate']->allLinks(
            $app['url_generator']->generate('home') . 'latest-videos?para={nr}'
        );

        $latestVideoCache = $app['twig']->render(
            'Themes/' . $app['theme'] . '/App/channel.twig',
            compact('paginateChannelVideos', 'paginationLinks', 'total', 'channel')
        );

        return $this->cache('latestVideoCache', $latestVideoCache);
    }

    public function category($slug, Application $app)
    {
        $category = $app['categoryRepository']->whereFirst('slug', $slug);
        $total = $category->videos()->count();

        $app['paginate']->setPagination($total, 12);
        $paginateVideos = $category->videos()
            ->where('status', 1)
            ->skip($app['paginate']->offset())
            ->take(12)
            ->orderBy('created_at', 'desc')
            ->get();

        $paginationLinks = $app['paginate']->allLinks(
            $app['url_generator']->generate('home') . 'category/' . $slug . '?para={nr}'
        );

        $categoryVideo = $app['twig']->render(
            'Themes/' . $app['theme'] . '/App/category.twig',
            compact('category', 'paginateVideos', 'paginationLinks', 'total')
        );

        return $this->cache('categoryVideo', $categoryVideo);
    }

    public function categories(Application $app)
    {
        $total = $app['categoryRepository']->getAll()->count();

        $app['paginate']->setPagination($total, 12);
        $paginateCategories = $app['categoryRepository']
            ->paginate($app['paginate']->offset(), 12);

        $paginationLinks = $app['paginate']->allLinks(
            $app['url_generator']->generate('home') . 'categories?para={nr}'
        );

        $categoryVideo = $app['twig']->render(
            'Themes/' . $app['theme'] . '/App/categories.twig',
            compact('paginateCategories', 'paginationLinks')
        );

        return $this->cache('categoryVideo', $categoryVideo);
    }

    public function page($slug, Application $app)
    {
        $page = $app['pageRepository']->whereFirst('slug', $slug);

        $pageCaching = $app['twig']->render(
            'Themes/' . $app['theme'] . '/App/page.twig',
            compact('page')
        );

        return $this->cache('pageCaching ', $pageCaching);
    }
}
