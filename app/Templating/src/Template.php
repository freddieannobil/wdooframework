<?php
/**
 * Created by Freddie Annobil-Dodoo @ Webberdoo.co.uk
 */

namespace Webberdoo\App\Templating\src;


use Silex\Application;

class Template
{
    public $data;
    private $app;


    public function __construct(Application $application)
    {
        $this->app = $application;
    }

    public function render($tag, $view, $param)
    {
        $view = $this->app['twig']->render(
            'Themes/' . $this->app['theme'] . '/'.$view, $param
        );

        return $this->app['cache']->render($tag, $view);
    }

}