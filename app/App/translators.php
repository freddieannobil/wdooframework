<?php

$app['translator'] = $app->protect($app->extend(
    'translator',
    /**
     * @param \Symfony\Component\Translation\Translator $translator
     * @param                                           $app
     *
     * @return \Symfony\Component\Translation\Translator
     */



    function (\Symfony\Component\Translation\Translator $translator, $app) {

        $translator->addLoader('php', new \Symfony\Component\Translation\Loader\PhpFileLoader());

        if (is_dir(__DIR__ . '/../Translation/' . $app['language'])) {
            $translator->addResource(
                'php',
                __DIR__.'/../Translation/'
                .$app['language'].'/localization.php',
                $app['language']
            );
        } else {
            $translator->addResource(
                'php',
                __DIR__ . '/../Translation/en/localization.php',
                'en'
            );
        }
        return $translator;
    }
));