<?php
namespace Webberdoo\AppBundle\Controllers;



use Silex\Application;

class AppController
{

    public function index(Application $app)
    {
        return $app['templating']->render('homeTag','/index.html.twig',[]);

    }

}
